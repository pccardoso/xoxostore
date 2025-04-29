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

    <title>XOXO Store - Home</title>
</head>
<body>

  <?php
    require_once("menu.php");
    require_once("card_menu.php");
  ?>

    <div id="carouselNote" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselNote" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselNote" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselNote" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../img/banner2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="../img/banner1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="../img/banner3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNote" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselNote" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div id="carouselMobile" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../img/frame1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="../img/frame2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="../img/frame3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="page">

      <div class="container">

        <div class="row">

          <div class="col-lg-12">

            <div class="row">
              
              <div class="col-lg-4 box-collection">
                <div style="background-image:linear-gradient(to bottom, transparent 0%, rgb(73, 73, 73) 80%), url('../img/box-col1.jpeg')">
                  <div class="collection-act">
                    <a href="https://www.usexoxo.com.br/app/page/listar.php?ePal=Black&sSes=0&sTam=0&ePre=100&bPes=" class="btn btn-white btn-lg btn-radius">Conferir Coleção</a>
                  </div>

                </div>
                
              </div>

              <div class="col-lg-4 box-collection">
                <div style="background-image:linear-gradient(to bottom, transparent 0%, rgb(73, 73, 73) 80%), url('../img/box-col2.jpeg')">
                <div class="collection-act">
                  <a href="https://www.usexoxo.com.br/app/page/listar.php?ePal=Black&sSes=0&sTam=0&ePre=100&bPes=" class="btn btn-white btn-lg btn-radius">Conferir Coleção</a>
                </div>
                </div>
              </div>

              <div class="col-lg-4 box-collection">
                <div style="background-image:linear-gradient(to bottom, transparent 0%, rgb(73, 73, 73) 80%), url('../img/box-col3.jpeg')">
                <div class="collection-act">
                  <a href="https://www.usexoxo.com.br/app/page/listar.php?ePal=Black&sSes=0&sTam=0&ePre=100&bPes=" class="btn btn-white btn-lg btn-radius">Conferir Coleção</a>
                </div>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="box-info">
                  <h1><i class="bi bi-cash-coin"></i></h1>
                  <h4>Preço de Atacado</h4>
                  <p>Aproveite nossa oportunidade de comprar a preço de Atacado, temos peças selecionadas a partir de R$19,99.</p>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="box-info">
                  <h1><i class="bi bi-box-fill"></i></h1>
                  <h4>Entregas Locais</h4>
                  <p>Realizamos entregas por toda região urbana de Canindé - CE, consulte regulamento.</p>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="box-info">
                  <h1><i class="bi bi-bag-heart-fill"></i></h1>
                  <h4>Pagamento</h4>
                  <p>Faça agora seu carrinho e pague com pix, cŕedito e débito (diversas bandeiras) sem burocrácia.</p>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="box-info">
                  <h1><i class="bi bi-shield-fill-check"></i></h1>
                  <h4>Ambiente Seguro</h4>
                  <p>Navegue tranquilamente, não armazenamos informações de cartões, apenas informações básicas.</p>
                </div>
              </div>

            </div>

          </div>

        </div>

      <div class="row">

        <h3 style="font-family:'Cinzel'">Últimas Novidades</h3>

        <?php
                        $pro = $adm->pro->consultar("WHERE tb_produto.visualizar_tb_produto='1' LIMIT 4");

                        foreach ($pro as $key => $value) {

                          $gra = $value['tipo_tb_grade'];

                          $gr01 = array("pp", "p", "m", "g", "gg");
                          $gr02 = array("34", "36", "38", "40", "42", "44", "46");

                          $pre = $value['premium_tb_produto'];

                          $tex = "";
                          $estoque = false;

                          if($gra == "1"){

                              foreach ($gr01 as $key2 => $value2) {
                                  if($value[$value2."_tb_grade"] != 0){
                                      $tex .= strtoupper($value2)." ";
                                      $estoque = true;
                                  }
                              }

                          }else{

                              foreach ($gr02 as $key2 => $value2) {
                                  if($value[$value2."_tb_grade"] != 0){
                                      $tex .= strtoupper($value2)." ";
                                      $estoque = true;
                                  }
                              }

                          }

                          if(!$estoque){
                            $tex = "ESGOTADO";
                        }
                    ?>

                        <div class="col-lg-3 ">
                        
                            <div class="box-item">

                                <div class="row">

                                    <div class="col-lg-12">

                                      <?php
                                        if($pre == 1){
                                      ?>

                                      <div class="premium-box"><i class="bi bi-bookmark-star-fill"></i></div>
                                    
                                      <?php 
                                        }
                                      ?>

                                        <div class="item-img">
                                            <a href="visualizar.php?id=<?php echo $value['id_tb_produto'];?>"><img src="../img/upload/<?php echo $value['img1_tb_produto'];?>" alt=""></a>
                                        </div>

                                      </div>

                                    <div class="col-lg-12">

                                        <div class="item-desc <?php if($pre == 1){echo 'premium-box-back';}?>">
                                            <p><a href="visualizar.php?id=<?php echo $value['id_tb_produto'];?>"><?php echo $value['nome_tb_produto'];?></a></p>
                                            <p><i class="bi bi-bookmark-heart"></i> Ref: <?php echo $value['id_tb_produto'];?> <i class="bi bi-coin"></i> R$ <?php echo number_format($value['varejo_tb_produto'], 2, ",", ".");?></p>
                                            <p><i class="bi bi-aspect-ratio"></i> Tam: <?php echo $tex;?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            
                        </div>

                    <?php

                        }

                    ?>

        <div class="col-lg-12" style="text-align:center">
          <a href="https://www.usexoxo.com.br/app/page/listar.php?ePal=&sSes=0&sTam=0&ePre=100&bPes=" class="btn btn-black btn-radius btn-lg"><i class="bi bi-eye-fill"></i> Ver mais</a>
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