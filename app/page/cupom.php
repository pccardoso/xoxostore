<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" type="image/jpg" href="../img/icone.png"/>

    <link rel="stylesheet" href="../framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/pagina.css">

    <title>XOXO Store - Meus Pedidos</title>
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
            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-star-fill"></i> Meus Cupons</li>
          </ol>
        </nav>

        <form method="post">
          <div class="row">

            <h1 style="font-family:'Cinzel'">Meus Cupons</h1>

            <div class="col-lg-12">

              <div class="table-responsive">

                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Nome do Cupom</th>
                      <th>Status</th>
                      <th>Desconto</th>
                      <th>Data do Cupom</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $adm->cup->listarTable01($_SESSION['usuario'][0]['id_tb_usuario']);?>
                  </tbody>
                </table>

              </div>

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
    <script src="../js/script.js"></script>

</body>
</html>