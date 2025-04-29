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

        <form method="POST" action="pedidos.php">

            <div class="row">

                <div class="col-lg-12">

                    <h1>Área de Pŕe-venda</h1>

                    <br>

                    <div class="box-checkout">

                        <h1><i class="bi bi-cart-check-fill"></i> Checkout</h1>

                        <p></p>

                        <div id="table-responsive">

                            <table class="table table-hover table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th><i class="bi bi-box2-heart"></i> Cód.</th>
                                        <th><i class="bi bi-ui-checks"></i> Item</th>
                                        <th><i class="bi bi-cash-coin"></i> Quant.</th>
                                        <th><i class="bi bi-cash-coin"></i> Valor (R$)</th>
                                        <th><i class="bi bi-cash-coin"></i> Sub-total (R$)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                        

                                        $total = 0;

                                        foreach ($_SESSION['itens'] as $key => $value) {
                                            
                                            $cod = $value['eIdPro'];
                                            $nom = $value['eNomPro'];
                                            $qua = $value['eQuaPro'];
                                            $val = $value['ePrePro'];
                                            $sub = $qua * $val;

                                            $total += $sub;

                                            $grade = $_SESSION['itens'][$key]['eGraPro'];

                                            $text_grade = "";

                                            foreach ($grade as $key2 => $value2) {
                                            
                                                if($value2){
                                                $text_grade.= " ".$key2.": ".$value2;
                                                }

                                            }

                                    ?>

                                            <tr>
                                                <td><?php echo $cod; ?></td>
                                                <td><?php echo $nom." (".$text_grade.")";?></td>
                                                <td><?php echo $qua; ?></td>
                                                <td><?php echo "R$ ".number_format($val, 2, ",", ".");?></td>
                                                <td><?php echo "R$ ".number_format($sub, 2, ",", ".");?></td>
                                            </tr>

                                    <?php }?>

                                        <td colspan="4" class="text-right">Total</td>
                                        <td colspan="1"><?php echo "R$ ".number_format($total, 2, ",", ".");?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <br>

                        <a class="btn btn-black btn-radius btn-lg" href="listar.php""><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
                        <a class="btn btn-black btn-radius btn-lg" id="bProChe"><i class="bi bi-arrow-right-circle-fill"></i> Avançar</a>
                    </div>

                    <div class="box-entrega">

                        <h1><i class="bi bi-box2-heart-fill"></i> Entrega</h1>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="rRet" name="rRet" value='1' checked/>
                            <label class="form-check-label" for="">Retirar na Unidade (<i class="bi bi-geo-alt"></i> Rua José Karam, Nº 1109, Santa Luzia, Canindé - CE)</label>
                        </div>

                        <br>

                        <div id='ver_entrega'>

                            <h5><i class="bi bi-house-check-fill"></i> Local de entrega:</h5>

                            <p><i class="bi bi-exclamation-triangle-fill"></i> Entregas apenas para a zona urbana de Canindé - CE (Taxa Fixa: R$2,00).</p>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="rEnd" name="rEnd" checked/>

                                <?php
                                    $texto = "";

                                    if(isset($_SESSION['usuario'])){

                                        if ($_SESSION['usuario'][0]['rua_tb_endereco']!= "") {

                                            $rua = $_SESSION['usuario'][0]['rua_tb_endereco'];
                                            $num = $_SESSION['usuario'][0]['num_tb_endereco'];
                                            $bai = $_SESSION['usuario'][0]['bai_tb_endereco'];
                                            $cid = $_SESSION['usuario'][0]['cid_tb_endereco'];
                                            $est = $_SESSION['usuario'][0]['est_tb_endereco'];
                                            
                                            $texto = "Rua $rua, Nº $num, $bai, $cid - $est";

                                        }else{
                                            $texto = "Não há endereço cadastrado";
                                        }

                                    }else{
                                        $texto = "Por favor, realize login!";
                                    }
                                ?>

                                <label class="form-check-label" for="endereço" id="end_entre">Endereço do seu cadastro: (<i class="bi bi-geo-alt"></i> <?php echo $texto;?>)</label>
                            </div>

                            <br>
                    
                            <div id="pre_ende">

                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="row">

                                            <p>Preencha o endereço para entrega:</p>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="Número">Número:</label>
                                                    <input type="number" name="eNumero" class="form-control">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="Número">Rua:</label>
                                                    <input type="text" name="eRua" class="form-control">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="Número">Bairro:</label>
                                                    <input type="text" name="eBairro" class="form-control">
                                                </div>
                                            </div>

                                            <br>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="">Complemento:</label>
                                                    <input type="text" name="eComplemento" class="form-control">
                                                </div>
                                            </div>

                                            <br>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <h1><i class="bi bi-cash-coin"></i> Forma de Pagamento:</h1>

                        <div class="box-sel-pag">

                            <input type="radio" class="btn-check" name="ePagVen" id="opt1" autocomplete="off" value="0">
                            <label class="btn btn-secondary btn-lg" for="opt1">Pix</label>

                            <input type="radio" class="btn-check" name="ePagVen" id="opt2" autocomplete="off" value="1">
                            <label class="btn btn-secondary btn-lg" for="opt2">Espécie</label>

                            <input type="radio" class="btn-check" name="ePagVen" id="opt3" autocomplete="off" value="2">
                            <label class="btn btn-secondary btn-lg" for="opt3">Crédito/Débito</label>

                        </div>

                        <br>

                        <p id="status_a"></p>

                        <br>

                        <a class="btn btn-black btn-radius btn-lg" id="bVolEnt"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
                        <a class="btn btn-black btn-radius btn-lg" id="bProEnt"><i class="bi bi-arrow-right-circle-fill"></i> Avançar</a>
                    </div>

                    <div class="box-resumo">
                        <h1><i class="bi bi-check-circle-fill"></i> Resumo da Compra</h1>

                        <p>Revise as informações, será gerado um pedido, basta aguardar o nosso contato...</p>

                        <?php

                            $total = 0; 
                            $val_total = 0; 
                            foreach ($_SESSION['itens'] as $key => $value) { 
                                $total+= $value['eQuaPro'];
                                $val_total+= $value['ePrePro'] * $value['eQuaPro'];
                            } 

                        ?>

                        <div class="row">
                            <div class="col-lg-6">
                                <div id="table-responsive">
                                    <table class="table table-hover table-bordered table-striped table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>Quantidade Itens:</td>
                                                <td id="col_quant" val1="<?php echo $total;?>"><?php echo $total;?></td>
                                            </tr>
                                            <tr>
                                                <td>Valor em compras:</td>
                                                <td id="col_total" val1="<?php echo $val_total;?>"><?php echo "R$".number_format($val_total, 2, ",", ".");?></td>
                                            </tr>
                                            <tr>
                                                <td>Valor em Frete:</td>
                                                <td id="col_frete" val1="0">R$0,00</td>
                                            </tr>
                                            <tr>
                                                <td>Valor em Desconto:</td>
                                                <td id="col_desco" val1="0">R$0,00</td>
                                            </tr>
                                            <tr>
                                                <td>TOTAL (R$):</td>
                                                <td id="col_geral" val1="0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                    <input type="text" placeholder="Inserir cupom..." class="form-control form-control-lg" aria-label="Recipient's username" aria-describedby="button-addon2" name="eCupDes" id="eCupDes">
                                    <a href="#" class="btn btn-outline-secondary btn-black btn-lg" type="button" id="bValidarCupom">Utilizar</a>
                                    </div>

                                    <div id="id_res_cup"></div>

                                </div>

                                
                            </div>
                            
                        </div>

                        <br>

                        <p>Ao clicar em <strong>Finalizar</strong> você será redirecionado aos seus pedidos, basta aguardar o nosso contato para finalizar a venda.</p>

                        <a class="btn btn-black btn-radius btn-lg" id="bVolRes"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
                        <button type="submit" class="btn btn-black btn-radius btn-lg" id="bAvaRes" name="bSalvar"><i class="bi bi-check-circle-fill"></i> Finalizar</button>
                        

                    </div>

                    <!--<div class="box-loading">
                        <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                        </div>
                        <label for="">Aguarde, vamos lhe redirecionar para página de pagamento...</label>
                    </div>-->
                </div>
            </div>

        </form>

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