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

    <title>Adm - Cad Departamento</title>
</head>
<body>

  <?php
    require_once("menu.php");
  ?>

    <div class="container">

      <div class="page">

        <div class="row">

            <div class="col-lg-6">

                <h1>Cadastrar Departamento</h1>

                <div class="form-group">
                    <label for="nomeDepartamento">Nome do Departamento:</label>
                    <input type="text" name="eNomeDepartamento" id="eNomDep" class="form-control">
                </div>

                <br>

                <div class="form-group">
                    <label for="descricaoDepartamento">Descrição do Departamento:</label>
                    <textarea name="eDescricaoDepartamento" id="eDesDep" class="form-control"></textarea>
                </div>

                

                <br>

                <div id="p_login"></div>

                <br>

                <button class="btn btn-black btn-lg btn-radius" id="bCadDep">Cadastrar</button>
                <button class="btn btn-black btn-lg btn-radius" id="bLimDep">Limpar</button>

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
    <script src="../js/ajax.js"></script>

</body>
</html>