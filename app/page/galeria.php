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

    <title>XOXO Store - Galeria</title>
</head>
<body>

  <?php
    require_once("menu.php");
    require_once("card_menu.php");
  ?>

    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../img/modelo.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/modelo.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../img/modelo.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="page">

      <div class="container">

        <div class="row">

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit cilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet conse aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet conslit. Facilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet consectetur.</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet c Facilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

            </div>

          </div>

          <div class="col-lg-2">

            <div class="card-gal" style="background-image: url('../img/modelo2.jpg')">

              <div>
                <h5>Título</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aut...</p>

                <h5><i class="bi bi-search-heart-fill"></i></h5>
              </div>

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