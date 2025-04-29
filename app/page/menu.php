<?php
  require_once("../php/Administrador.class.php");
  $adm = new Administrador();

  session_start();

  if (!isset($_SESSION['itens'])) {
    $_SESSION["itens"] = array();
  }

?>

<div class="but">
        <button id="bTopo" class="btn btn-black btn-radius btn-lg"><i class="bi bi-arrow-up-circle-fill"></i> Subir</button>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 box-social">
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light">

  <div class="container">
    <a class="navbar-brand" href="index.php" style="font-family: 'Cinzel'"><img src="../img/xoxo.png" alt="" style="width: 180px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house-heart-fill"></i> Início</a>
        </li>
        <li class="nav-item" id="li_item1">
          <a class="nav-link" href="#"><i class="bi bi-bag-fill"></i> Sessões</a>
        </li>
        <!--
        <li class="nav-item" id="li_item2">
          <a class="nav-link" href="#"><i class="bi bi-bag-heart-fill"></i> Acessórios</a>
        </li>
        -->
        <li class="nav-item">

          <?php

            if (isset($_SESSION['usuario'])) {
              
          ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill"></i> Perfil
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="pedidos.php"><i class="bi bi-box2-heart"></i> Meus Pedidos</a></li>
                <li><a class="dropdown-item" href="cupom.php"><i class="bi bi-star-fill"></i> Meu Cupons</a></li>
                <li><a class="dropdown-item" href="usuario.php?id=<?php echo $_SESSION['usuario'][0]['id_tb_usuario'];?>"><i class="bi bi-pencil-square"></i> Editar</a></li>
                <li><a class="dropdown-item" href="logoff.php"><i class="bi bi-box-arrow-left"></i> Sair</a></li>
              </ul>
            </li>

          <?php

            }else{

          ?>

            <a class="nav-link" id="li_item4" href="#"><i class="bi bi-person-fill"></i> Login</a>
          
          <?php

            }

          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="li_item3" href="#"><i class="bi bi-cart-check-fill"></i> (<?php echo count($_SESSION['itens']);?>) Carrinho</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>