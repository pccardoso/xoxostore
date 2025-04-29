<?php

    require_once("BancoDeDados.class.php");

    class Usuario extends BancoDeDados{

        public function __construct(){
            date_default_timezone_set('America/Fortaleza');
        }

        public function cadastrar(array $user){

            $result = false;

            parent::conectar();

            parent::result("SELECT * FROM tb_usuario WHERE tb_usuario.email_tb_usuario='".$user['eEmail']."'");

            $linhas = parent::__get("mysqli")->affected_rows;

            if($linhas){
                $result = array(0, "E-mail já cadastrado!");
            }else{
                if(parent::query("INSERT INTO tb_usuario (nome_tb_usuario, email_tb_usuario, contato_tb_usuario, senha_tb_usuario) VALUES ('".$user['eNome']."', '".$user['eEmail']."', '".$user['eContato']."', '".$user['eSenha']."')")){
                    $result = array(1, "Cadastrado com sucesso!");
                }else{
                    $result = array(0, parent::__get("result")->error);
                }
            }

            parent::desconectar();

            $result[2] = $user;

            return $result;

        }

        public function login(array $user){

            $result = false;

            parent::conectar();

            parent::result("SELECT * FROM tb_usuario LEFT JOIN tb_endereco ON tb_usuario.id_tb_usuario=tb_endereco.id_usuario_tb_endereco WHERE tb_usuario.email_tb_usuario='".$user['eEmail']."' AND tb_usuario.senha_tb_usuario='".$user['eSenha']."'");

            if($dados = parent::__get("result")->fetch_assoc()){
                $result = array(1, "Login realizado com sucesso!", array($dados));
            }else{
                $result = array(0, "Usuário/senha incorretos!");
            }
            
            parent::desconectar();

            return $result;
        
        }

        public function consultar ($sql=null){

            parent::conectar();

            parent::result("SELECT * FROM tb_usuario LEFT JOIN tb_endereco ON tb_usuario.id_tb_usuario=tb_endereco.id_usuario_tb_endereco $sql");

            $result = array();

            while ($dados = parent::__get("result")->fetch_assoc()) {
            
                $result[] = $dados;

            }

            parent::desconectar();

            return $result;

        }

        public function atualizar (array $user){

            parent::conectar();

            $id = $user['eIdUsu'];
            $cpf = $user['eCpfUsu'];
            $nom = $user['eNomUsu'];
            $ema = $user['eEmaUsu'];
            $tel = $user['eTelUsu'];
            $rua = $user['eRuaUsu'];
            $num = $user['eNumUsu'];
            $bai = $user['eBaiUsu'];
            $cid = $user['eCidUsu'];
            $est = $user['eEstUsu'];
            $dat = $user['eDatUsu'];

            $dat = explode("/", $dat);
            #24/06/2024

            $dat = $dat[2]."-".$dat[1]."-".$dat[0];
            
            $result = array();

            if (parent::query("UPDATE tb_usuario SET cpf_tb_usuario='$cpf', nome_tb_usuario='$nom', email_tb_usuario='$ema', contato_tb_usuario='$tel', data_nascimento_tb_usuario='$dat' WHERE tb_usuario.id_tb_usuario=$id")) {
                
                parent::result("SELECT * FROM tb_endereco WHERE tb_endereco.id_usuario_tb_endereco=$id");

                if (parent::__get("result")->fetch_assoc()) {
                    
                    if(parent::query("UPDATE tb_endereco SET rua_tb_endereco='$rua', num_tb_endereco='$num', bai_tb_endereco='$bai', cid_tb_endereco='$cid', est_tb_endereco='$est' WHERE tb_endereco.id_usuario_tb_endereco=$id")){
                        $result = array(1, "<p>Atualizado com sucesso!</p>");
                    }

                }else{

                    if(parent::query("INSERT INTO tb_endereco (num_tb_endereco, rua_tb_endereco, bai_tb_endereco, cid_tb_endereco, est_tb_endereco, id_usuario_tb_endereco) VALUES ('$num', '$rua', '$bai', '$cid', '$est', $id)")){
                        $result = array(1, "<p>Atualizado com sucesso!</p>");
                    }

                }

            }

            parent::desconectar();

            $result[2] = $this->consultar("WHERE tb_usuario.id_tb_usuario=$id");

            return $result;

        }

        public function listarTable01(){
            $result = $this->consultar();

            foreach ($result as $key => $value) {
                $id = $value['id_tb_usuario'];
                $nome = $value['nome_tb_usuario'];
                $wpp = $value['contato_tb_usuario'];
                $endereco = "Nº ".$value['num_tb_endereco'].", ".$value['rua_tb_endereco'].", ".$value['bai_tb_endereco'];

                echo "  <tr>
                            <td>$id</td>
                            <td>$nome</td>
                            <td>$wpp</td>
                            <td>$endereco</td>
                        </tr>";
            }
        }

    }

?>