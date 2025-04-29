<?php

    require_once("BancoDeDados.class.php");

    class Cupom extends BancoDeDados{

        public function __construct(){
            date_default_timezone_set('America/Fortaleza');
        }

        public function cadastrar($cupom){

            parent::conectar();
            $resul = array();
            $pre = $cupom['ePreCup'];
            $des = $cupom['eDesCup'];
            if(parent::query("INSERT INTO tb_cupom (prefixo_tb_cupom, desconto_tb_cupom) VALUES ('$pre', $des)")){
                $resul = array(1, "Cadastrado com sucesso!");
            }else{
                $resul = array(0, "Erro ao cadastrar, consulte administrador!");
            }

            parent::desconectar();
            return $resul;

        }

        public function cadastrarCupom($cup){
            $usuario = $cup['eIdUsu'];
            $cupom  =$cup['eIdCup'];

            parent::conectar();
            $result = array(0, "<p>Sem direito a cupom</p>");

            parent::result("SELECT * FROM tb_item_cupom INNER JOIN tb_cupom ON tb_cupom.id_tb_cupom=tb_item_cupom.id_cupom_tb_item_cupom WHERE id_cupom_tb_item_cupom = $cupom AND id_usuario_tb_item_cupom=$usuario");

            $linhas = parent::__get("mysqli")->affected_rows;

            if($linhas == 0){

                if(parent::query("INSERT INTO tb_item_cupom (id_cupom_tb_item_cupom, id_usuario_tb_item_cupom) VALUES ($cupom, $usuario)")){

                    $cod = mysqli_insert_id(parent::__get("mysqli"));

                    parent::result("SELECT * FROM tb_item_cupom INNER JOIN tb_cupom ON tb_cupom.id_tb_cupom=tb_item_cupom.id_cupom_tb_item_cupom WHERE tb_item_cupom.id_tb_item_cupom=$cod");

                    $dados = parent::__get("result")->fetch_assoc();

                    $cup = $dados["prefixo_tb_cupom"].$cod;

                    $result = array(1, "<p>Cupom registrado com sucesso: <strong>$cup</strong></p>", $cup);
                }else{
                    $result = array(0, "</p>Erro ao registrar cupom!</p>");
                }

            }

            parent::desconectar();

            return $result;

        }

        public function listarCupom($id_user){

            parent::conectar();
            
            if($id_user){
                $sql = "SELECT * FROM tb_item_cupom INNER JOIN tb_cupom ON tb_cupom.id_tb_cupom=tb_item_cupom.id_cupom_tb_item_cupom WHERE tb_item_cupom.id_usuario_tb_item_cupom=$id_user";
            }else{
                $sql = "SELECT * FROM tb_item_cupom INNER JOIN tb_cupom ON tb_cupom.id_tb_cupom=tb_item_cupom.id_cupom_tb_item_cupom";
            }

            $result = array();

            parent::result($sql);

            while ($dados = parent::__get("result")->fetch_assoc()) {
                $result[] = $dados;
            }

            parent::desconectar();
            return $result;
        }

        public function listarTable01($id_user){

            $result = $this->listarCupom($id_user);
            
            foreach ($result as $key => $value) {
                $cup = $value['prefixo_tb_cupom'].$value['id_tb_item_cupom'];
                $sta = $value['status_tb_item_cupom'];

                switch ($sta) {
                    case '0': $sta = "Inválido"; break;
                    case '1': $sta = "Válido"; break;
                }

                $des = $value['desconto_tb_cupom'];
                $dat = $value['data_cadastro_tb_item_cupom'];

                echo "  <tr>
                            <td>$cup</td>
                            <td>$sta</td>
                            <td>$des%</td>
                            <td>$dat</td>
                        </tr>";

            }
        }

        public function validarCupom($cup){

            $usua = $cup['eIdUsuario'];
            $cupo = $cup['eCupDes'];

            $pref = substr($cupo, 0, 4);
            $id_i = substr($cupo, 4, 5);

            $result = array();

            parent::conectar();

            parent::result("SELECT * FROM tb_item_cupom INNER JOIN tb_cupom ON tb_cupom.id_tb_cupom=tb_item_cupom.id_cupom_tb_item_cupom WHERE tb_cupom.prefixo_tb_cupom='$pref' AND tb_item_cupom.id_tb_item_cupom=$id_i AND tb_item_cupom.status_tb_item_cupom='1' AND tb_item_cupom.id_usuario_tb_item_cupom=$usua");


            if($dados = parent::__get("result")->fetch_assoc()){

                if(parent::query("UPDATE tb_item_cupom SET status_tb_item_cupom='0' WHERE tb_item_cupom.id_tb_item_cupom=".$dados['id_tb_item_cupom'])){
                    $result = array(1, "<p>Cupom utilizado!</p>", $dados);
                }else{
                    $result = array(0, "<p>Erro ao validar cupom</p>");
                }
                
            }else{
                $result = array(0, "<p>Cupom $cupo inválido!</p>");
            }

            parent::desconectar();

            return $result;

        }

        public function consultar(){

            parent::conectar();

            $result = array();

            parent::result("SELECT * FROM tb_item_cupom INNER JOIN tb_usuario ON tb_usuario.id_tb_usuario=tb_item_cupom.id_usuario_tb_item_cupom INNER JOIN tb_cupom ON tb_cupom.id_tb_cupom=tb_item_cupom.id_cupom_tb_item_cupom");

            while ($dados = parent::__get("result")->fetch_assoc()) {
                $result[] = $dados;
            }

            parent::desconectar();

            return $result;

        }

        public function listarTable02(){
            $result = $this->consultar();
            foreach ($result as $key => $value) {
                $cod = $value['id_tb_item_cupom'];
                $cup = $value['prefixo_tb_cupom'].$value["id_tb_item_cupom"];
                $nom = $value['nome_tb_usuario'];
                $sta = $value['status_tb_item_cupom'];

                switch ($sta) {
                    case '0': $sta = "<span style='color:red'>Inválido</span>"; break;
                    case '1': $sta = "<span style='color:green'>Válido</span>"; break;
                }

                echo "  <tr>
                            <td>$cod</td>
                            <td>$cup</td>
                            <td>$nom</td>
                            <td>$sta</td>
                        </tr>";
            }
        }

    }

?>