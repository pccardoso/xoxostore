<?php

    require_once("BancoDeDados.class.php");

    class Departamento extends BancoDeDados{

        public function __construct(){
            date_default_timezone_set('America/Fortaleza');
        }

        public function cadastrar(array $departamento){

            $result = false;

            parent::conectar();

            if(parent::query("INSERT INTO tb_departamento (nome_tb_departamento, descricao_tb_departamento) VALUES ('".$departamento['eNomDep']."', '".$departamento['eDesDep']."')")){
                $result = array(1, $departamento['eNomDep']." cadastrado com sucesso!");
            }else{
                $result = array(0, parent::__get("result")->error);
            }

            parent::desconectar();

            $result[2] = $departamento;

            return $result;

        }

        public function consultar($id=null){

            parent::conectar();

            $lista = array();
            $sql = "SELECT * FROM tb_departamento";

            if($id){
                $sql .= "WHERE tb_departamento.id_tb_departamento=$id";
            }

            parent::result($sql);

            while($dado = parent::__get("result")->fetch_assoc()){
                $lista[] = $dado;
            }

            parent::desconectar();

            return $lista;
        }

        public function listarTable01(){

            $lista = $this->consultar();

            foreach ($lista as $key => $value) {
                echo    "<tr>
                            <td>".$value['id_tb_departamento']."</td>
                            <td>".$value['nome_tb_departamento']."</td>
                            <td>".$value['descricao_tb_departamento']."</td>
                            <td>
                                <button value='".$value['id_tb_departamento']."' class='btn btn-black' title='Deletar departamento?' name='bDelDep'><i class='bi bi-trash-fill'></i></button>

                                <button value='".$value['id_tb_departamento']."' class='btn btn-black' title='Editar departamento?' name='bEdiDep'><i class='bi bi-pencil-square'></i></button>
                            </td>
                        </tr>";
            }
        }

        public function listarSelect01($id=null){
            $lista = $this->consultar();
            foreach ($lista as $key => $value) {

                $act = "";
                if($id == $value['id_tb_departamento']){
                    $act = "selected";
                }

                echo "  <option value='".$value['id_tb_departamento']."' $act> Cód.: ".$value['id_tb_departamento']." ".$value['nome_tb_departamento']."</option>";
            }

        }

    }

?>