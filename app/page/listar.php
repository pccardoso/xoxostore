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

    <title>XOXO Store - Produtos</title>
</head>
<body>

  <?php
    require_once("menu.php");
    require_once("card_menu.php");
    require_once("menu_lateral.php");
  ?>

    <div class="page">

      <div class="container">

                <div class="row">

                    <?php

                        $sql = "WHERE tb_produto.visualizar_tb_produto='1'";

                        if(isset($_GET['cat'])){
                            $sql.= " AND tb_departamento.id_tb_departamento=".$_GET['cat'];
                        }

                        if (isset($_GET['bPes'])) {

                            $palavra = $_GET['ePal'];

                            if ($palavra) {
                                $sql.=" AND tb_produto.nome_tb_produto LIKE '%$palavra%'";
                            }

                            $tam = $_GET['sTam'];

                            if($tam){
                                $sql.= " AND tb_grade.".$tam."_tb_grade <> 0";
                            }

                            $preco = $_GET['ePre'];

                            if($preco){
                                $sql.= " AND tb_produto.varejo_tb_produto <= $preco";
                            }

                            $dep = $_GET['sSes'];

                            if($dep){
                                $sql.= " AND tb_departamento.id_tb_departamento=$dep";
                            }
                        }

                        $pro = $adm->pro->consultar($sql);

                    ?>

                        <div class="col-lg-12">

                            <div class="box-filtro">

                                <button class="btn btn-black btn-radius btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                <i class="bi bi-filter-square-fill"></i> Filtro
                                </button>

                                <label for="ooie"><?php echo count($pro)." resultado(s) encontrado(s)."; ?></label>

                            </div>

                        </div>

                    <?php
                        if(!isset($pro[0])){
                    ?>

                        <div class="col-lg-12 box-help">
                            <h1><i class="bi bi-heartbreak-fill"></i></h1>
                            <h3>Infelizmente, não encontramos as peças desejadas, mas podemos te ajudar pelo whatsapp...</h3>
                            <br>
                            <a href="https://wa.me/5585989976085?text=Ol%C3%A1,%20n%C3%A3o%20encontrei%20a%20pe%C3%A7a%20desejada.%20XOXO%20Store%20poderia%20me%20ajudar?" class="btn btn-black btn-radius btn-lg" target="_blank"><i class="bi bi-whatsapp"></i> Alô XOXO!</a>
                        </div>

                    <?php
                        }
                    ?>


                    <?php

                        foreach ($pro as $key => $value) {

                            $gra = $value['tipo_tb_grade'];

                            $gr01 = array("pp", "p", "m", "g", "gg");
                            $gr02 = array("34", "36", "38", "40", "42", "44", "46");

                            $tex = "";
                            $estoque = false;

                            if($gra == 1){

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
                                $tex = "<strong>ESGOTADO</strong>";
                            }

                            $pre = $value['premium_tb_produto'];

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

                                        <div class="item-img <?php if(!$estoque){echo "item-esgotado";}?>">
                                            <a href="visualizar.php?id=<?php echo $value['id_tb_produto'];?>"><img src="../img/upload/<?php echo $value['img1_tb_produto'];?>" alt=""></a>
                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="item-desc <?php if($pre == 1){echo 'premium-box-back';}?>">
                                            <p><a href="visualizar.php?id=<?php echo $value['id_tb_produto'];?>"><?php echo $value['nome_tb_produto'];?></a></p>
                                            <p><i class="bi bi-bookmark-heart"></i> Ref: <?php echo $value['id_tb_produto'];?>  <i class="bi bi-coin"></i> R$ <?php echo number_format($value['varejo_tb_produto'], 2, ",", ".");?></p>
                                            <p><i class="bi bi-aspect-ratio"></i> Tam: <?php echo $tex;?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            
                        </div>

                    <?php

                        }

                    ?>

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