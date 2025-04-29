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

    <title>Adm - Consultar Usuário</title>
</head>
<body>

  <?php
    require_once("menu.php");
  ?>

    <div class="page">

      <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1>Consultar Usuário</h1>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Cód.</th>
                                <th>Nome</th>
                                <th>Whatsapp</th>
                                <th>Endereço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $adm->usu->listarTable01();
                            ?>
                        </tbody>
                    </table>
                </div>

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