<?php
  require_once("../php/Administrador.class.php");
  $adm = new Administrador();
?>

<div class="but">
        <button id="bTopo" class="btn btn-black btn-radius"><i class="bi bi-arrow-up-circle-fill"></i> Subir</button>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 box-social">
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light">

  <div class="container">
  <a class="navbar-brand" href="index.php" style="font-family: 'Cinzel'"><img src="../img/xoxoadm.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-plus-circle-fill"></i>  Cadastros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cad_departamento.php"><i class="bi bi-boxes"></i> Departamentos</a></li>
            <li><a class="dropdown-item" href="cad_produto.php"><i class="bi bi-box2-heart-fill"></i> Produtos</a></li>
            <li><a class="dropdown-item" href="cad_cupom.php"><i class="bi bi-star-fill"></i> Cupons</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-search"></i> Consultar
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="con_departamento.php"><i class="bi bi-boxes"></i> Departamentos</a></li>
            <li><a class="dropdown-item" href="con_produto.php"><i class="bi bi-box2-heart-fill"></i> Produtos</a></li>
            <li><a class="dropdown-item" href="pedidos.php"><i class="bi bi-cash-coin"></i> Pedidos</a></li>
            <li><a class="dropdown-item" href="con_cupom.php"><i class="bi bi-star-fill"></i> Cupons</a></li>
            <li><a class="dropdown-item" href="con_usuario.php"><i class="bi bi-person-fill"></i> Usuário</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
    </nav>