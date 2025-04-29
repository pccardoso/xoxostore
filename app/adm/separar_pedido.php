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

    <title>Adm - Separar Pedido</title>
</head>
<body>

  <?php
    require_once("menu.php");
  ?>

    <div class="page">

      <div class="container">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="bi bi-house-heart"></i> Início</a></li>
            <li class="breadcrumb-item"><a href="pedidos.php"><i class="bi bi-box2-heart"></i> Pedidos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-eye"></i> Visualizar</li>
          </ol>
        </nav>

        <form method="post">

          <div class="row">

            <h1 style="font-family:'Cinzel'">Separar Pedidos</h1>

            <br>

            <?php

                $itens = $adm->ven->consultarItens($_GET['id']);

                if(isset($_POST['bBaiEst'])){
                  $adm->ven->baixaEstoque($_GET['id']);
                }

            ?>

            <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Ref:</th>
                          <th>Descrição</th>
                          <th>Valor</th>
                          <th colspan='12'>Solicitado</th>
                          <th colspan='12'>Liberado</th>
                          <th>Sub-Total</th>
                      </tr>
                      <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>PP</th>
                          <th>P</th>
                          <th>M</th>
                          <th>G</th>
                          <th>GG</th>
                          <th>34</th>
                          <th>36</th>
                          <th>38</th>
                          <th>40</th>
                          <th>42</th>
                          <th>44</th>
                          <th>46</th>
                          <th>PP</th>
                          <th>P</th>
                          <th>M</th>
                          <th>G</th>
                          <th>GG</th>
                          <th>34</th>
                          <th>36</th>
                          <th>38</th>
                          <th>40</th>
                          <th>42</th>
                          <th>44</th>
                          <th>46</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          echo $adm->ven->teste($_GET['id']);
                      ?>
                  </tbody>
              </table>
            </div>

            <br>

            <div class="col-lg-4">
              <form method="post">
                <button type="submit" name="bBaiEst" class="btn btn-black btn-lg btn-radius">Baixar Estoque</button>
              </form>
            </div>
            
          </div>
        </form>

      </div>

    </div>

    <?php

      require_once("footer.php");

    ?>

    <script src="../framework/bootstrap/js/bootstrap.min.js"></script>
    <script src="../framework/jquery/jquery.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>