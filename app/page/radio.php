<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../css/pagina.css">

    <title>XOXO Store - Checkout</title>
</head>
<body>

<div class="progresso"></div>

    <?php session_start(); 
    
    if (!isset($_SESSION['usuario'])) {
        header("location: index.php?msg=1");
    }
    
    ?>

    <div class="container">

      <div class="page">

        <div class="row">

            <div class="col-lg-12">

                <form method="post">

                    <div class="box-sel-grade">

                        <input type="radio" class="btn-check" name="ePagVen" id="option8" autocomplete="off" value="0">
                        <label class="btn btn-secondary btn-lg" for="option8">Pix</label>

                        <input type="radio" class="btn-check" name="ePagVen" id="option9" autocomplete="off" value="1">
                        <label class="btn btn-secondary btn-lg" for="option9">Espécie</label>

                        <input type="radio" class="btn-check" name="ePagVen" id="option10" autocomplete="off" value="2">
                        <label class="btn btn-secondary btn-lg" for="option10">Crédito/Débito</label>

                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="rRet" value='1'/>
                        <label class="form-check-label" for="">Retirar na Unidade (<i class="bi bi-geo-alt"></i> Rua José Karam, Nº 1109, Santa Luzia, Canindé - CE)</label>
                    </div>

                    <?php

                        if (isset($_POST['b'])) {
                            echo $_POST['ePagVen'];
                            echo $_POST['rRet'];
                        }

                    ?>

                    <button name="b">teste</button>

                </form>

            </div>
        </div>

      </div>

    </div>

    <div class="footer">

      <div class="container">

        <div class="row">

          <div class="col-lg-4">

            <div class="box-phone">

              <h4>Nossos Contatos</h4>
              
              <p><a href=""><i class="bi bi-facebook"></i> Facebook</a></p>
              <p><a href=""><i class="bi bi-whatsapp"></i> Whatsapp</a></p>
              <p><a href=""><i class="bi bi-instagram"></i> Instagram</a></p>
              <p><i class="bi bi-phone-vibrate"></i> +55 (85) 98997-6085</p>
              <p><a href=""><i class="bi bi-envelope-at-fill"></i> xoxo.sto2024@gmail.com</a></p>

            </div>

          </div>

          <div class="col-lg-4">

            <div class="box-listener">

              <h4>Newsletter</h4>

              <p>Cadastre aqui seu melhor e-mail e fique por dentro de todas nossas novidades, além de outrs temas relevantes...</p>

              <input type="email" class="form-control" placeholder="Seu melhor e-mail...">
              <br>
              <button class="btn btn-white"><i class="bi bi-send-check-fill"></i> Enviar</button>

            </div>

          </div>

          <div class="col-lg-4">

            <div class="box-infor">

              <h4>Um pouco mais</h4>

              <ul>
                <li><a href="">Perguntas Frequentes</a></li>
                <li><a href="">Sobre Privacidade</a></li>
                <li><a href="">Troca e Devoluções</a></li>
                <li><a href="">Parceria de Sucesso</a></li>
                <li><a href="">Sobre a XOXO</a></li>
                <li><a href="">Proprietário</a></li>
              </ul>

            </div>

          </div>

        </div>

      </div>

    </div>

    <script src="../framework/bootstrap/js/bootstrap.min.js"></script>
    <script src="../framework/jquery/jquery.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>