<?php

    require_once("BancoDeDados.class.php");

    class Produto extends BancoDeDados{

        public function __construct(){
            date_default_timezone_set('America/Fortaleza');
        }

        public function cadastrar(array $pro){

            parent::conectar();

            $result = null;

            $sql = "";

            $eNomPro = $pro['eNomPro'];
            $eDesPro = $pro['eDesPro'];
            $eValCus = $pro['eValCus'];
            $eValVar = $pro['eValVar'];
            $eValAta = $pro['eValAta'];
            $sDepPro = $pro['sDepPro'];
            $img1 = $pro['fUplPro'][0];
            $img2 = $pro['fUplPro'][1];
            $img3 = $pro['fUplPro'][2];
            $pre = $pro['sPrePro'];
            $com = $pro['sComPro'];

            if($pro['sGraPro'] == 1){

                $pp = $pro['ePp'];
                $p = $pro['eP'];
                $m = $pro['eM'];
                $g = $pro['eG'];
                $gg = $pro['eGg'];

                $sql = "INSERT INTO tb_grade (tipo_tb_grade, pp_tb_grade, p_tb_grade, m_tb_grade, g_tb_grade, gg_tb_grade) VALUES ('1', $pp, $p, $m, $g, $gg)";

            }else{

                $t34 = $pro['e34'];
                $t36 = $pro['e36'];
                $t38 = $pro['e38'];
                $t40 = $pro['e40'];
                $t42 = $pro['e42'];
                $t46 = $pro['e46'];
                $t44 = $pro['e44'];

                $sql = "INSERT INTO tb_grade (tipo_tb_grade, 34_tb_grade, 36_tb_grade, 38_tb_grade, 40_tb_grade, 42_tb_grade, 44_tb_grade, 46_tb_grade) VALUES ('2', $t34, $t36, $t38, $t40, $t42, $t44, $t46)";

            }

            if(parent::query($sql)){
                $id = mysqli_insert_id(parent::__get("mysqli"));

                if(parent::query("INSERT INTO tb_produto (nome_tb_produto, descricao_tb_produto, custo_tb_produto, varejo_tb_produto, atacado_tb_produto, id_departamento_tb_produto, tb_grade_id_tb_grade, img1_tb_produto, img2_tb_produto, img3_tb_produto, premium_tb_produto, visualizar_tb_produto) VALUES ('$eNomPro', '$eDesPro', $eValCus, $eValVar, $eValAta, $sDepPro, $id, '$img1', '$img2', '$img3', '$pre', '$com')")){
                    $result = array(1, "$eNomPro cadastrado com sucesso!");
                }else{
                    $result = array(0, "error");
                }

            }else{
                $result = array(1, "deu erro");
            }

            parent::desconectar();

            return $result;

        }

        public function consultar($sql=null){
            parent::conectar();
            $result = array();
            
            parent::result("SELECT * FROM tb_produto INNER JOIN tb_departamento ON tb_departamento.id_tb_departamento=tb_produto.id_departamento_tb_produto INNER JOIN tb_grade ON tb_produto.tb_grade_id_tb_grade=tb_grade.id_tb_grade $sql");

            while($dados = parent::__get("result")->fetch_assoc()){
                $result[] = $dados;
            }
            parent::desconectar();
            return $result;
        }

        public function listarTable01(){
            $result = $this->consultar();
            
            foreach ($result as $key => $value) {

                $estoque = 0;

                if($value['tipo_tb_grade'] == 1){
                    $estoque += $value['pp_tb_grade'];
                    $estoque += $value['p_tb_grade'];
                    $estoque += $value['m_tb_grade'];
                    $estoque += $value['g_tb_grade'];
                    $estoque += $value['gg_tb_grade'];
                }else{
                    $estoque += $value['34_tb_grade'];
                    $estoque += $value['36_tb_grade'];
                    $estoque += $value['38_tb_grade'];
                    $estoque += $value['40_tb_grade'];
                    $estoque += $value['42_tb_grade'];
                    $estoque += $value['44_tb_grade'];
                    $estoque += $value['46_tb_grade'];
                }
                
                echo    "<tr>
                            <td>".$value['id_tb_produto']."</td>
                            <td>".$value['nome_tb_produto']."</td>
                            <td>".$value['nome_tb_departamento']."</td>
                            <td>R$".$value['custo_tb_produto']."</td>
                            <td>R$".$value['varejo_tb_produto']."</td>
                            <td>R$".$value['atacado_tb_produto']."</td>
                            <td>$estoque</td>
                            <td>
                                <button class='btn btn-black' title='Ver Detalhes'><i class='bi bi-eye-fill'></i></button>
                                <button class='btn btn-black' title='Editar Produto'><i class='bi bi-pencil-fill'></i></button>
                                <button class='btn btn-black' title='Visualizar Grade'><i class='bi bi-boxes'></i></button>
                            </td>
                        </tr>";
            }
        }

    }

?>