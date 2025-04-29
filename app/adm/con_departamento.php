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

    <link rel="stylesheet" href="../framework/sweet/dist/sweetalert2.min.css">

    <title>Adm - Con Departamento</title>
</head>
<body>

  <?php
    require_once("menu.php");
  ?>

    <div class="container">

      <div class="page">

        <div class="row">

            <div class="col-lg-12">

                <h1>Consultar Departamento</h1>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Cód.</th>
                              <th>Título</th>
                              <th>Descrição</th>
                              <th>Ações</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                              $adm->dep->listarTable01();
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
    <script src="../framework/sweet/dist/sweetalert2.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/ajax.js"></script>

    <script>

      function alerta(titulo, texto, icone){
        Swal.fire({
          title: titulo,
          text: texto,
          icon: icone
        });
      }

      function input(titulo, texto){

        Swal.fire({
          title: "Do you want to save the changes?",
          text: texto,
          showDenyButton: true,
          confirmButtonText: "Confirmar",
          denyButtonText: "Cancelar"
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            return true;
          } else if (result.isDenied) {
           return false;
          }
        });

      }

    </script>

</body>
</html>