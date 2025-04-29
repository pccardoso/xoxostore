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
            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-box2-heart"></i> Meus Pedidos</li>
          </ol>
        </nav>

        <form method="post">
          <div class="row">

            <h1 style="font-family:'Cinzel'">Meus Pedidos</h1>

            <div class="col-lg-12">

              <?php

                if (isset($_POST['bSalvar'])) {
                
                  #variáveis de armazenamento

                  #guarda a posição da entrega
                  $entrega = 0;

                  #guarda o valor da entrga (caso haja)
                  $taxa = 0;

                  #guarda a posição do pagamento
                  $pag = false;

                  #guarda o endereço de entrega (sessão ou formulário)
                  $end_entrega = 0;

                  #caso haja entrega
                  if (!isset($_POST['rRet'])) {
                  
                    #guarda posição de entrega/taxa
                    $entrega = 1;
                    $taxa = 2;

                    #se a entrega for para o endereço do usuário logado
                    if(isset($_POST['rEnd'])){
                      
                      if ($_SESSION['usuario'][0]['rua_tb_endereco']!= "") {

                          $rua = $_SESSION['usuario'][0]['rua_tb_endereco'];
                          $num = $_SESSION['usuario'][0]['num_tb_endereco'];
                          $bai = $_SESSION['usuario'][0]['bai_tb_endereco'];
                          $cid = $_SESSION['usuario'][0]['cid_tb_endereco'];
                          $est = $_SESSION['usuario'][0]['est_tb_endereco'];
                          
                          $end_entrega = "Rua $rua, Nº $num, $bai, $cid - $est";

                      }else{

                          $end_entrega = "Não há endereço cadastrado";

                      }

                    #se a entrega for para o endereço do formulário preenchido
                    }else{

                      $rua = $_SESSION['usuario'][0]['rua_tb_endereco'];
                        $num = $_POST['eNumero'];
                        $rua = $_POST['eRua'];
                        $bai = $_POST['eBairro'];
                        $com = $_POST['eComplemento'];
                        
                        $end_entrega = "Rua $rua, Nº $num, $bai, ($com) - Canindé - CE";

                    }

                  }

                  #registra posição de pagamento
                  if (isset($_POST['ePagVen'])) {
                    $pag = $_POST['ePagVen'];
                  }

                  #método para cadastro
                  $res = $adm->ven->cadastrar(array(
                      "entrega" => $entrega,
                      "taxa" => $taxa,
                      "pagamento" => $pag,
                      "endereco" => $end_entrega,
                      "pedidos" => $_SESSION['itens'],
                      "id_usuario" => $_SESSION['usuario'][0]['id_tb_usuario']
                  ));

                }

              ?>

              <?php
                if(isset($_POST['bProCan'])){
                  $re = $adm->ven->cancelar(array("eIdVen"=>$_GET['id'], "eMotCan" => $_POST['eMotCan'], "eCod" => 5));
                  if($re[0]){
                    echo "<p>".$re[1]."</p>";
                  }
                }
              ?>
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Cód.</th>
                      <th>Entrega</th>
                      <th>Pagamento</th>
                      <th>Status</th>
                      <th>Data do Pedido</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $adm->ven->listarTable01("WHERE tb_venda.id_usuario_tb_venda=".$_SESSION['usuario'][0]['id_tb_usuario']);?>
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