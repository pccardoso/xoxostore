<?php

    require_once("BancoDeDados.class.php");

    class Venda extends BancoDeDados{

        public function __construct(){
            date_default_timezone_set('America/Fortaleza');
        }

        public function cadastrar(array $venda){

            parent::conectar();

            $entrega = $venda['entrega'];
            $taxa = $venda['taxa'];
            $pagamento = $venda['pagamento'];
            $endereco = $venda['endereco'];
            $itens = $venda['pedidos'];
            $id_usuario = $venda['id_usuario'];

            $result = array(0, "");

            $sql = null;

            if(isset($_SESSION['usuario'][1])){
                $taxa_des = $_SESSION['usuario'][1]["desconto_tb_cupom"];
                $sql = "INSERT INTO tb_venda (entrega_tb_venda, taxa_desconto_tb_venda, tx_entrega_tb_venda, pagamento_entrega_tb_venda, status_tb_venda, endereco_entrega_tb_venda, id_usuario_tb_venda) VALUE ('$entrega', $taxa_des, $taxa, '$pagamento', '0', '$endereco', $id_usuario)";
            }else{
                $sql = "INSERT INTO tb_venda (entrega_tb_venda, tx_entrega_tb_venda, pagamento_entrega_tb_venda, status_tb_venda, endereco_entrega_tb_venda, id_usuario_tb_venda) VALUE ('$entrega', $taxa, '$pagamento', '0', '$endereco', $id_usuario)";
            }

            if (parent::query($sql)) {
                $id = mysqli_insert_id(parent::__get("mysqli"));

                $sql = "INSERT INTO tb_produto_venda (id_venda_tb_produto_venda, id_produto_tb_produto_venda, quantidade_tb_produto_venda, grade_tb_produto_venda) VALUES ";

                foreach ($itens as $key => $value) {

                    $id_produto = $value['eIdPro'];
                    $quant = $value['eQuaPro'];
                    $grade = serialize($value['eGraPro']);
                    
                    $sql .= "($id, $id_produto, $quant, '$grade'),";

                }

                $sql = substr($sql,0,-1);

                if (parent::query($sql)) {

                    $result = array(1, "Pré-venda registrada com sucesso.");

                    unset($_SESSION['itens']);
                    unset($_SESSION['usuario'][1]);

                }else{
                    $result = array(0, "Erro ao registrar pré-venda.");
                }

            }else{
                $result = array(0, "Erro ao registrar pré-venda");
            }

            parent::desconectar();

            return $result;

        }

        public function consultar($sql=null){

            $lista = array();

            parent::conectar();
            parent::result("SELECT * FROM tb_venda INNER JOIN tb_usuario ON tb_usuario.id_tb_usuario=tb_venda.id_usuario_tb_venda $sql");
            while($dados = parent::__get("result")->fetch_assoc()){
                $lista[] = $dados;
            }

            parent::desconectar();
            return $lista;
        }

        public function listarTable01($sql = null){
            $lista = $this->consultar($sql);
            foreach ($lista as $key => $value) {

                $entrega = "Não";

                if ($value['entrega_tb_venda']) {
                    $entrega = "Sim";
                }

                $pagamento = false;

                switch ($value['pagamento_entrega_tb_venda']) {
                    case '0': $pagamento="Pix"; break;
                    case '1': $pagamento="Espécie"; break;
                    case '2': $pagamento="Crédito/Débito"; break;
                }

                $status = false;

                switch ($value['status_tb_venda']) {
                    case '0':$status = "<span style='color:yellow'>Aberto</span>"; break;
                    case '1':$status = "<span style='color:green'>Separado</span>"; break;
                    case '4':$status = "<span style='color:red'>Can. Vendedor</span>"; break;
                    case '5':$status = "<span style='color:red'>Can. Comprador</span>"; break;
                }

                $data = $value["data_cadastro_tb_venda"];

                echo "<tr>
                            <td>".$value['id_tb_venda']."</td>
                            <td>$entrega</td>
                            <td>$pagamento</td>
                            <td>$status</td>
                            <td>$data</td>
                            <td>
                                <a href='visualizar_pedido.php?id=".$value['id_tb_venda']."' class='btn btn-black btn-lg'><i class='sbi bi-eye-fill'></i></a>
                            </td>
                    </tr>";
            }
        }

        public function listarTable02($sql = null){
            $lista = $this->consultar($sql);
            foreach ($lista as $key => $value) {

                $entrega = "Não";
                $usuario = $value['nome_tb_usuario'];

                if ($value['entrega_tb_venda']) {
                    $entrega = "Sim (R$".number_format($value['tx_entrega_tb_venda'], 2, ",", ".)").")";
                }

                $pagamento = false;

                switch ($value['pagamento_entrega_tb_venda']) {
                    case '0': $pagamento="Pix"; break;
                    case '1': $pagamento="Espécie"; break;
                    case '2': $pagamento="Crédito/Débito"; break;
                }

                $status = false;

                switch ($value['status_tb_venda']) {
                    case '0':$status = "<span style='color:yellow'>Aberto</span>"; break;
                    case '1':$status = "<span style='color:green'>Separado</span>"; break;
                    case '4':$status = "<span style='color:red'>Can. Vendedor</span>"; break;
                    case '5':$status = "<span style='color:red'>Can. Comprador</span>"; break;
                }

                echo "<tr>
                            <td>".$value['id_tb_venda']."</td>
                            <td>$entrega</td>
                            <td>$pagamento</td>
                            <td>$status</td>
                            <td>$usuario</td>
                            <td>";

                if($value['status_tb_venda'] == 0){
                        echo "<a title='Separar Pedido' href='separar_pedido.php?id=".$value['id_tb_venda']."' class='btn btn-black'><i class='bi bi-check-circle-fill'></i></a>";
                }

                        echo "<a title='Visualizar Pedido' href='visualizar_pedido.php?id=".$value['id_tb_venda']."' class='btn btn-black'><i class='sbi bi-eye-fill'></i></a>
                                
                            </td>
                    </tr>";
            }
        }

        public function consultarItens($id_venda){

            parent::conectar();

            $result = array();

            parent::result("SELECT * FROM tb_produto_venda INNER JOIN tb_produto ON tb_produto.id_tb_produto=tb_produto_venda.id_produto_tb_produto_venda INNER JOIN tb_grade ON tb_grade.id_tb_grade=tb_produto.tb_grade_id_tb_grade WHERE tb_produto_venda.id_venda_tb_produto_venda=$id_venda");
            
            while ($dados = parent::__get("result")->fetch_assoc()) {
                $result[] = $dados;
            }

            parent::desconectar();

            return $result;

        }

        public function validarEstoque($id_venda){

            $result = $this->consultarItens($id_venda);

            $grade = array("pp", "p", "m", "g", "gg", 34, 36, 38, 40, 42, 44, 46);

            $valor_compra = 0;

            $novo_result = array();

            foreach ($result as $key => $value) {

                $dis = array();

                foreach ($grade as $key2 => $value2) {
                    if($value[$value2."_tb_grade"] != 0){
                        $dis[$value2] = $value[$value2."_tb_grade"];
                    }
                }

                $tex_grade = "";

                foreach ($dis as $key2 => $value2) {
                    $tex_grade.= " ".$key2.":".$value2;
                }

                $sol = unserialize($value['grade_tb_produto_venda']);
                //strtolower

                $tex_sol = "";

                $liberado = array();

                foreach ($grade as $key2 => $value2) {

                    foreach ($sol as $key3 => $value3) {

                        if($value2 == strtolower($key3)){
                            $tex_sol.= "<td>".$value3."</td>";

                            $quan_soli = $value3;
                            $quan_disp = 0;
                            if (isset($dis[$value2])) {
                                $quan_disp = $dis[$value2];    
                            }

                            if($quan_disp == 0){
                                $liberado[$value2] = 0;
                            }else if($quan_disp >= $quan_soli){
                                $liberado[$value2] = $quan_soli;
                            }else{
                                $liberado[$value2] = $quan_disp;
                            }
                            
                        }

                    }
                }
                $text_liberado = "";
                $total_itens = 0;
                foreach ($liberado as $key2 => $value2) {
                    $text_liberado.="<td>$value2</td>";
                    $total_itens+= $value2;
                }

                $total_itens = $total_itens * $value['varejo_tb_produto'];
                $valor_compra+= $total_itens;
                $value['html_sol'] = $tex_sol;
                $value['html_lib'] = $text_liberado;
                $value['total_itens'] = number_format($total_itens, 2, ",", ".");
                $value['text_grade'] = $tex_grade;
                $value['nova_quant_itens'] = array_sum($liberado);

                $value['liberado'] = $liberado;

                $novo_result[] = $value;

            }

            return $novo_result;
        }

        public function baixaEstoque($id_venda){

            $res = $this->validarEstoque($id_venda);

            parent::conectar();
            
            foreach ($res as $key => $value) {

                $liberado = array();

                foreach ($value['liberado'] as $key2 => $value2) {
                    $liberado[strtoupper($key2)] = $value2;
                }

                if(parent::query("UPDATE tb_produto_venda SET quantidade_tb_produto_venda=".$value['nova_quant_itens'].", grade_tb_produto_venda='".serialize($liberado)."'WHERE tb_produto_venda.id_tb_produto_venda=".$value['id_tb_produto_venda'])){
                    
                    $sql = "UPDATE tb_grade SET ";

                    $atua = false;

                    foreach($value['liberado'] as $key2 => $value2){
                        if($value2 != 0){

                            $cal = $value[$key2."_tb_grade"] - $value2;

                            $sql.= $key2."_tb_grade=".$cal.",";
                            $atua = true;

                        }
                    }

                    if($atua){
                        $sql = substr($sql,0,-1)." WHERE tb_grade.id_tb_grade=".$value['id_tb_grade'];

                        if (parent::query($sql) && parent::query("UPDATE tb_venda SET tb_venda.status_tb_venda='1' WHERE tb_venda.id_tb_venda=$id_venda")) {
                            echo "<p>Pedido <strong>separado</strong>!</p>";
                        }

                    }else{
                        if(parent::query("UPDATE tb_venda SET tb_venda.status_tb_venda='1' WHERE tb_venda.id_tb_venda=$id_venda")){
                            echo "<p>Pedido <strong>separado</strong>!</p>";
                        }
                    }

                    
                    

                }
            }

            parent::desconectar();
        }

        public function teste($id_venda){
            $res = $this->validarEstoque($id_venda);
            foreach ($res as $key => $value) {
                echo    "<tr>
                            <td>".$value['id_tb_produto']."</td>
                            <td>".$value['nome_tb_produto']." (".$value['text_grade'].")</td>
                            <td>R$".number_format($value['varejo_tb_produto'], 2, ",", ".")."</td>
                            ".$value['html_sol']."
                            ".$value['html_lib']."
                            <td>R$ ".$value['total_itens']."</td>
                        </tr>";
            }
        }

        public function listarItensTable01($id_venda){

            $result = $this->consultarItens($id_venda);

            $valor_total = 0;

            foreach ($result as $key => $value) {

                $grade = unserialize($value['grade_tb_produto_venda']);
                $tex_grade = "";
                foreach ($grade as $key2 => $value2) {
                    if($value2){
                        $tex_grade .= " <strong>$key2:</strong> $value2";
                    }
                }

                echo    "<tr>
                            <td>".$value['id_tb_produto']."</td>
                            <td><a href='visualizar.php?id=".$value['id_tb_produto']."'>".$value['nome_tb_produto']."</a></td>
                            <td>R$".number_format($value['varejo_tb_produto'], 2, ",", ".")."</td>
                            <td>".$value['quantidade_tb_produto_venda']." ($tex_grade)</td>
                            <td>R$".number_format($value['varejo_tb_produto'] * $value['quantidade_tb_produto_venda'], 2, ",", ".")."</td>
                        </tr>";

                $valor_total+= $value['varejo_tb_produto']*$value['quantidade_tb_produto_venda'];
            }

            return $valor_total;

        }

        public function cancelar($infor){
            parent::conectar();

            $id_venda = $infor['eIdVen'];
            $motivo = $infor['eMotCan'];
            $cod = $infor['eCod'];

            $result = array();

            if(parent::query("UPDATE tb_venda SET tb_venda.status_tb_venda='$cod', tb_venda.cancelamento_tb_venda='$motivo' WHERE tb_venda.id_tb_venda=$id_venda")){
                $result = array(1, "Cancelado com sucesso!");
            }else{
                $result = array(0, "Erro ao cancelar!");
            }

            parent::desconectar();
            return $result;
        }
        

    }

?>