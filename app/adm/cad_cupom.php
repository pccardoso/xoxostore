<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" type="image/jpg" href="../img/icone.png"/>

    <link rel="stylesheet" href="../css/pagina.css">
    <link rel="stylesheet" href="../css/pagina_adm.css">

    <title>Adm - Cadastrar Cupom</title>
</head>
<body>

  <?php
    require_once("menu.php");
  ?>

    <div class="page">

      <div class="container">

        <div class="row">

            <div class="col-lg-6">

                <h1>Cadastrar Cupom</h1>

                <form method="POST" action="">

                <?php
                    if(isset($_POST['bCadCup'])){
                        $re = $adm->cup->cadastrar(array("ePreCup"=>$_POST['ePreCup'], "eDesCup"=>$_POST['eDesCup']));
                        if($re[0]){
                            echo $re[1];
                        }else{
                            echo $re[1];
                        }
                    }
                ?>

                

                    <div class="form-group">
                        <label for="">Prefixo do Cupom:</label>
                        <input type="text" name="ePreCup" class="form-control form-control-lg">
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="">Desconto do Cupom (%):</label>
                        <input type="number" name="eDesCup" class="form-control form-control-lg">
                    </div>

                    <br>

                    <button name="bCadCup" type="submit" class="btn btn-black btn-lg btn-radius">Cadastrar</button>
                    <button type="reset" class="btn btn-black btn-lg btn-radius">Limpar</button>

                </form>

            </div>

        </div>

      </div>

    </div>

    <?php

      require_once("footer.php");
      require_once("modal.php");

    ?>

    <script src="../framework/bootstrap/js/bootstrap.min.js"></script>
    <script src="../framework/jquery/jquery.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>