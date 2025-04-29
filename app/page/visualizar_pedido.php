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
            <li class="breadcrumb-item"><a href="pedidos.php"><i class="bi bi-box2-heart"></i> Pedidos</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-eye"></i> Visualizar</li>
          </ol>
        </nav>

        <form method="post">

          <div class="row">

            <h1 style="font-family:'Cinzel'">Visualizar Pedidos</h1>

            <div class="col-lg-6">

                <?php 
                
                    $pedido = $adm->ven->consultar("WHERE tb_venda.id_tb_venda=".$_GET['id']);
                    $entrega = 0;
                    $taxa = $pedido[0]['tx_entrega_tb_venda'];
                    $endereco = $pedido[0]['endereco_entrega_tb_venda'];
                    $pagamento = null;
                    $taxa_desc = $pedido[0]['taxa_desconto_tb_venda'];
                    $status = null;

                    if($pedido[0]['entrega_tb_venda']){
                        $entrega = "Sim (R$".number_format($taxa, 2, ",", ".").", End: ".$endereco;
                    }else{
                        $entrega = "Não";
                    }

                    switch ($pedido[0]['pagamento_entrega_tb_venda']) {
                        case '0': $pagamento = "Pix"; break;
                        case '1': $pagamento = "Espécie"; break;
                        case '2': $pagamento = "Crédito/Débito"; break;
                    }

                    switch ($pedido[0]['status_tb_venda']) {
                        case '0':$status = "Aberto"; break;
                        case '1':$status = "Separado"; break;
                        case '4':$status = "Cancelado pelo Vendedor"; break;
                        case '5':$status = "Cancelado pelo Comprador"; break;
                    }

                    if($pedido[0]['cancelamento_tb_venda']){
                      $status.=" (<strong>Motivo: </strong>".$pedido[0]['cancelamento_tb_venda'].")";
                    }

                    $data = $pedido[0]['data_cadastro_tb_venda'];
                
                ?>

                <br>

                <h4><i class="bi bi-bag-fill"></i> Informações Básicas</h4>

                <p><strong><i class="bi bi-bag-check-fill"></i> Entrega:</strong> <?php echo $entrega; ?></p>
                <p><strong><i class="bi bi-wallet-fill"></i> Forma de Pagamento:</strong> <?php echo $pagamento; ?></p>
                <p><strong><i class="bi bi-clock-history"></i> Situação:</strong> <?php echo $status; ?></p>
                <p><strong><i class="bi bi-calendar-heart-fill"></i> Data do Pedido: </strong> <?php echo $adm->dataHora($data)[0]." às ".$adm->dataHora($data)[1]; ?></p>

                <br>

                <h4><i class="bi bi-list-check"></i> Lista de Produtos</h4>

                <div class="table-responsive">

                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Ref.</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Quant.</th>
                        <th>Sub-Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $total = $adm->ven->listarItensTable01($_GET['id']);?>
                      <tr>
                        <td colspan="4">Valor em Itens:</td>
                        <td><?php echo "R$".number_format($total, 2, ",", ".");?></td>
                      </tr>
                      <tr>
                        <td colspan="4">Taxa entrega:</td>
                        <td><?php echo "R$".number_format($taxa, 2, ",", ".");?></td>
                      </tr>
                      <tr>
                        <td colspan="4">Taxa Desconto:</td>
                        <td><?php echo "R$".number_format($total * ($taxa_desc/100), 2, ",", ".");?></td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Total da Compra:</strong></td>
                        <td><?php echo "R$".number_format($taxa + ($total - ($total * ($taxa_desc/100))), 2, ",", ".");?></td>
                      </tr>
                    </tbody>
                  </table>

                </div>
            </div>

            <div class="col-lg-12">

              <?php if($pedido[0]['status_tb_venda'] == '0'){?><a href="#" class="btn btn-black btn-lg btn-radius" id="bCanPed"><i class="bi bi-x-circle-fill"></i> Cancelar</a> <?php } ?>

              <a href="https://wa.me/5585989976085?text=Ol%C3%A1,%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es%20do%20pedido%20de%20N%C2%BA%20<?php echo $_GET['id'];?>" class="btn btn-black btn-lg btn-radius" target="_blank"><i class="bi bi-whatsapp"></i> Whatsapp</a>

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