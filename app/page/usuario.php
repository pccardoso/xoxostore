<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/pagina.css">

    <title>XOXO Store - Editar Usuário</title>
</head>
<body>

  <?php
    require_once("menu.php");
    require_once("card_menu.php");
  ?>

    <div class="page">

      <div class="container">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="bi bi-house-heart"></i> Início</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person-fill"></i> Editar Usuário</li>
          </ol>
        </nav>

        <form method="post">
          <div class="row">

            <h1 style="font-family:'Cinzel'">Edital Informações</h1>

            <?php

              if (isset($_POST['bAtualizar'])) {

                $dados = array(
                  "eIdUsu" => $_GET['id'],
                  "eCpfUsu" => $_POST['eCpfUsu'],
                  "eNomUsu" => $_POST['eNomUsu'],
                  "eEmaUsu" => $_POST['eEmaUsu'],
                  "eTelUsu" => $_POST['eTelUsu'],
                  "eRuaUsu" => $_POST['eRuaUsu'],
                  "eNumUsu" => $_POST['eNumUsu'],
                  "eBaiUsu" => $_POST['eBaiUsu'],
                  "eCidUsu" => $_POST['eCidUsu'],
                  "eEstUsu" => $_POST['eEstUsu'],
                  "eDatUsu" => $_POST['eDatUsu']
                );
              
                $res = $adm->usu->atualizar($dados);

                if($res[0]){

                  echo $res[1];

                  $_SESSION['usuario'] = $res[2];

                }else{

                  echo $res[1];

                }

                $cont = 0;
                $cupom = array(0, "");
                foreach ($dados as $key => $value) {
                  if($value == "" || $value == " "){
                    $cont +=1;
                  }
                }

                if(!$cont){
                  $re =  $adm->cup->cadastrarCupom(array("eIdUsu"=> $_GET['id'], "eIdCup"=>1));

                  if($re[0]){
                    echo "<p>Você acaba de liberar seu primeiro CUPOM, válido ainda por tempo indeterminado: <strong>".$re[2]."</strong>";
                  }
                }

              }

            ?>

            <br>

            <?php

              $usu = $adm->usu->consultar("WHERE tb_usuario.id_tb_usuario=".$_GET['id']);

              $nome = $usu[0]['nome_tb_usuario'];
              $emai = $usu[0]['email_tb_usuario'];
              $cont = $usu[0]['contato_tb_usuario'];
              $cpf = $usu[0]['cpf_tb_usuario'];

              $dat = "";

              if($usu[0]['data_nascimento_tb_usuario'] != ""){
                #data 2024-06-24

                $dat = explode("-", $usu[0]['data_nascimento_tb_usuario']);
                $dat = $dat[2]."/".$dat[1]."/".$dat[0];
              }

            ?>

            <div class="col-lg-6">

              <div class="row">

                <div class="col-lg-4">

                  <div class="form-group">
                    <label for="cpfUsuario"><i class="bi bi-person-vcard-fill"></i> CPF do Usuário:</label>
                    <input required type="text" name="eCpfUsu" id="eCpfUsu" class="form-control form-control-lg" value="<?php echo $cpf;?>">
                  </div>

                </div>

                <div class="col-lg-8">

                  <div class="form-group">
                    <label for="nomeUsuario"><i class="bi bi-person-fill"></i> Nome do Usuário:</label>
                    <input required type="text" name="eNomUsu" class="form-control form-control-lg" value="<?php echo $nome;?>">
                  </div>

                </div>

              </div>

            <br>

              <div class="row">

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for=""><i class="bi bi-calendar-heart"></i> Nascimento:</label>
                    <input required type="text" class="form-control form-control-lg" name="eDatUsu" id="eDatUsu" value="<?php echo $dat;?>">
                  </div>
                </div>

                <div class="col-lg-8">

                <div class="form-group">
                  <label for="emailUsuario"><i class="bi bi-envelope-heart-fill"></i> E-mail do Usuário:</label>
                  <input required type="email" name="eEmaUsu" class="form-control form-control-lg" value="<?php echo $emai;?>">
                </div>

                </div>

              </div>

            <br>

            <div class="form-group">
              <label for="emailUsuario"><i class="bi bi-phone-vibrate-fill"></i> Contato do Usuário:</label>
              <input required type="text" name="eTelUsu" id="eTelUsu" class="form-control form-control-lg" value="<?php echo $cont;?>">
            </div>

            </div>

            <div class="col-lg-6">

              <div class="row">

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="numeroEndereco">Número:</label>
                    <input required type="number" name="eNumUsu" value="<?php echo $usu[0]['num_tb_endereco'];?>" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="numeroEndereco">Logradouro:</label>
                    <input required type="text" name="eRuaUsu" value="<?php echo $usu[0]['rua_tb_endereco'];?>" class="form-control form-control-lg">
                  </div>
                </div>

              </div>

              <br>

              <div class="row">

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="numeroEndereco">Bairro:</label>
                    <input required type="text" name="eBaiUsu" value="<?php echo $usu[0]['bai_tb_endereco'];?>" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="numeroEndereco">Cidade:</label>
                    <input required type="text" name="eCidUsu" value="<?php echo $usu[0]['cid_tb_endereco'];?>" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="numeroEndereco">Estado:</label>
                    <input required type="text" name="eEstUsu" value="<?php echo $usu[0]['est_tb_endereco'];?>" class="form-control form-control-lg">
                  </div>
                </div>

              </div>

            </div>

            <div class="col-lg-12">
              <br>
              <button class="btn btn-black btn-lg btn-radius" name="bAtualizar"><i class="bi bi-check-circle-fill"></i> Atualizar</button>
              <a href="index.php" class="btn btn-black btn-lg btn-radius"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
            </div>
            
          </div>
        </form>

      </div>

    </div>

    <?php

      require_once("footer.php");
      require_once("modal.php");

    ?>

    

    <script src="../framework/bootstrap/js/bootstrap.min.js"></script>
    <script src="../framework/jquery/jquery.min.js"></script>
    <script src="../framework/jquery-mask/dist/jquery.mask.js"></script>
    <script src="../js/script.js"></script>

    <script>

      $('#eCpfUsu').mask('000.000.000-00');
      $('#eTelUsu').mask('(00) 9 0000-0000');
      $('#eDatUsu').mask("00/00/0000");

    </script>

</body>
</html>