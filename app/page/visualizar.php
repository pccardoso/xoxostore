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
    	
    <link href="../framework/lightzoom/glassstyle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/pagina.css">

    <title>XOXO Store - Visualizar</title>
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
          <li class="breadcrumb-item"><a href="listar.php"><i class="bi bi-bag-fill"></i> Sessões</a></li>
          <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-eye"></i> Visualizar</li>
        </ol>
      </nav>

      <?php

        if(isset($_GET['id'])){

          $pro = $adm->pro->consultar("WHERE tb_produto.id_tb_produto=".$_GET['id']);
          $titulo =  $pro[0]['nome_tb_produto'];
          $varejo = $pro[0]['varejo_tb_produto'];
          $descricao = $pro[0]['descricao_tb_produto'];
          $img1 = $pro[0]['img1_tb_produto'];
          $img2 = $pro[0]['img2_tb_produto'];
          $img3 = $pro[0]['img3_tb_produto'];
          $pre = $pro[0]['premium_tb_produto'];

          $gra = array( "pp" => $pro[0]['pp_tb_grade'],
                        "p" => $pro[0]['p_tb_grade'],
                        "m" => $pro[0]['m_tb_grade'],
                        "g" => $pro[0]['g_tb_grade'],
                        "gg" => $pro[0]['gg_tb_grade'],
                        "34" => $pro[0]['34_tb_grade'],
                        "36" => $pro[0]['36_tb_grade'],
                        "38" => $pro[0]['38_tb_grade'],
                        "40" => $pro[0]['40_tb_grade'],
                        "42" => $pro[0]['42_tb_grade'],
                        "44" => $pro[0]['44_tb_grade'],
                        "46" => $pro[0]['46_tb_grade']
                      );

        }

      ?>

    

        <div class="row">

          <div class="col-lg-4 img-vis-box">

          <?php
              if($pre == 1){
          ?>

            <div class="premium-box"><i class="bi bi-bookmark-star-fill"></i></div>

          <?php
              }
          ?>

            <img id="view-pro" src="../img/upload/<?php echo $img1;?>" alt="" class="img-view">

            <div class="col-lg-12">
                <?php if($img1){ ?>
                  <div class="img-view-small">
                    <img src="../img/upload/<?php echo $img1;?>" alt="" class="img-view">
                  </div>

                <?php } if($img2){ ?>
                <div class="img-view-small">
                  <img src="../img/upload/<?php echo $img2;?>" alt="" class="img-view">
                </div>

                <?php } if($img3){ ?>
                <div class="img-view-small">
                  <img src="../img/upload/<?php echo $img3;?>" alt="" class="img-view">
                </div>
                <?php }?>

            </div>

          </div>

          <div class="col-lg-8">

            <h1 id="title"><?php echo $titulo;?></h1>

            <p>Código do Produto: <span id="eIdPro"><?php echo $_GET['id']; ?></span></p>

            <h4><i class="bi bi-coin"></i> <?php echo "R$ <span id='ePrePro'>".$varejo."</span>";?></h4>

            <p><?php echo $descricao;?></p>

            <div class="row" >
              
              <div class="col-lg-12">

              <?php if(array_sum($gra)){ ?>

                <label for=""><i class="bi bi-aspect-ratio"></i> Selecione o tamanho:</label> <br>

              <?php } ?>

                <?php

                  if($pro[0]['tipo_tb_grade'] == 1){

                ?>

                <div class="box-sel-grade">

                  <?php if($gra["pp"]){ ?>
                    <input type="radio" class="btn-check" name="options" id="option8" autocomplete="off" value="PP">
                    <label class="btn btn-secondary btn-lg" for="option8">PP</label>
                  <?php } if($gra['p']){?>

                    <input type="radio" class="btn-check" name="options" id="option9" autocomplete="off" value="P">
                    <label class="btn btn-secondary btn-lg" for="option9">P</label>

                  <?php } if($gra['m']){ ?>

                    <input type="radio" class="btn-check" name="options" id="option10" autocomplete="off" value="M">
                    <label class="btn btn-secondary btn-lg" for="option10">M</label>

                  <?php } if($gra['g']){ ?>

                    <input type="radio" class="btn-check" name="options" id="option11" autocomplete="off" value="G">
                    <label class="btn btn-secondary btn-lg" for="option11">G</label>

                  <?php } if($gra['gg']){ ?>

                    <input type="radio" class="btn-check" name="options" id="option12" autocomplete="off" value="GG">
                    <label class="btn btn-secondary btn-lg" for="option12">GG</label>
                  
                  <?php } ?>
                  

                </div>

                <?php
                  }else{
                ?>

                <div class="box-sel-grade">

                <?php if($gra["34"]){ ?>
                  <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" value="34">
                  <label class="btn btn-secondary btn-lg" for="option1">34</label>

                <?php } if($gra['36']){?>
                  <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" value="36">
                  <label class="btn btn-secondary btn-lg" for="option2">36</label>
                <?php } if($gra['38']){?>

                  <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" value="38">
                  <label class="btn btn-secondary btn-lg" for="option3">38</label>

                <?php } if($gra['40']){?>

                  <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off" value="40">
                  <label class="btn btn-secondary btn-lg" for="option4">40</label>

                <?php } if($gra['42']){?>

                  <input type="radio" class="btn-check" name="options" id="option5" autocomplete="off" value="42">
                  <label class="btn btn-secondary btn-lg" for="option5">42</label>

                <?php } if($gra['44']){?>

                  <input type="radio" class="btn-check" name="options" id="option6" autocomplete="off" value="44">
                  <label class="btn btn-secondary btn-lg" for="option6">44</label>

                <?php } if($gra['46']){?>

                  <input type="radio" class="btn-check" name="options" id="option7" autocomplete="off" value="46">
                  <label class="btn btn-secondary btn-lg" for="option7">46</label>

                <?php }?>

                </div>

                <?php
                  }
                ?>

              </div>

              <?php if(array_sum($gra)){ ?>

                <div class="box-quantidade">
                  <label for=""><i class="bi bi-boxes"></i> Preencha a Quantidade:</label>
                  <div class="input-group mb-1">
                    <button class="btn btn-black btn-lg" type="button" id="bQuaMen"><i class="bi bi-dash-circle-fill"></i></button>
                    <input type="text" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="0" id="eQuaPro">
                    <button class="btn btn-black btn-lg" type="button" id="bQuaAdi"><i class="bi bi-plus-circle-fill"></i></button>
                  </div>
                </div>
              <?php } ?>

            </div>

            <br>

            <div id="result_add_item"></div>

            <br>

            <?php if(array_sum($gra)){ ?>

              <div class="box-adicionar-item">
                <button class="btn btn-black btn-radius btn-lg" value="<?php echo $_GET['id'];?>" id="bAdiPro"><i class="bi bi-cart-plus-fill"></i> Adicionar</button>
                <a href="https://wa.me/5585989976085?text=Ol%C3%A1,%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es%20sobre%20o%20produto%20de%20Refer%C3%AAncia%20<?php echo $_GET['id'];?>" class="btn btn-black btn-lg btn-radius" target="_blank"><i class="bi bi-whatsapp"></i> Contate-nos</a>
              </div>

            <?php }else{ ?>

              <h4><i class="bi bi-emoji-tear-fill"></i> Peça esgotada...</h4>

            <?php } ?>

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
    <script src="../framework/lightzoom/lightzoom.js"></script>

</body>
</html>