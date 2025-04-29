    <div class="card-menu1" id="card-menu1">

      <div class="container">

        <div class="row">

          <div class="col-lg-12 title-menu">
            <h1>Sessões</h1>
          </div>

          <?php
            $dep = $adm->dep->consultar();

            foreach ($dep as $key => $value) {
            
          ?>

            <div class="col-lg-2 card-item">

              <h5><?php echo $value['nome_tb_departamento']?></h5>

              <div class="desc_departamento">

              <p><?php echo $value['descricao_tb_departamento'];?></p>

              </div>

              <a class="btn btn-black btn-radius" href="listar.php?cat=<?php echo $value['id_tb_departamento'];?>">Ver mais</a>

            </div>

          <?php
            }
          ?>

        </div>

      </div>

    </div>

    <div class="card-menu2" id="card-menu2">

      <div class="container">

        <div class="row">

        <div class="col-lg-12 title-menu">
          <h1>Acessórios</h1>
        </div>

        <div class="col-lg-2 card-item">

          <h5>Bolsas</h5>

          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam sunt perferendis sed debitis tenetur culpa, magnam dolor eius rem.</p>

          <button class="btn btn-black">Ver mais</button>

        </div>

        <div class="col-lg-2 card-item">

          <h5>Brinco</h5>

          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam sunt perferendis sed debitis tenetur culpa, magnam dolor eius rem.</p>

          <button class="btn btn-black">Ver mais</button>

        </div>

        <div class="col-lg-2 card-item">

          <h5>Cintos</h5>

          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam sunt perferendis sed debitis tenetur culpa, magnam dolor eius rem.</p>

          <button class="btn btn-black">Ver mais</button>

        </div>

        <div class="col-lg-2 card-item">

          <h5>Sandálias</h5>

          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam sunt perferendis sed debitis tenetur culpa, magnam dolor eius rem.</p>

          <button class="btn btn-black">Ver mais</button>

        </div>

        <div class="col-lg-2 card-item">

        <img src="../img/modelo2.jpg" class="d-block w-100" alt="...">

        </div>

        <div class="col-lg-2 card-item">

        <img src="../img/modelo2.jpg" class="d-block w-100" alt="...">

        </div>

        </div>

      </div>

    </div>

    <div class="card-menu3" id="card-menu3">

      <div class="container">

        <div class="row">

          <div class="col-lg-12 title-menu">
            <h1>Carrinho</h1>
            <label for="">Total de modelos: <?php echo count($_SESSION['itens']); ?> modelo(s).</label>
            <br>
          </div>

          <br>

          <div class="col-lg-8 col-xs-12 col-sm-12">

            <div class="box-car">

              <div class="row">

                <div class="col-lg-12" id="lista_car">

                  <?php

                    $total_car = 0;

                    foreach ($_SESSION['itens'] as $key => $value) {

                      $total_car+= $value['eQuaPro'] * $value['ePrePro'];

                      $grade = $_SESSION['itens'][$key]['eGraPro'];

                      $text_grade = "";

                      foreach ($grade as $key2 => $value2) {
                      
                        if($value2){
                          $text_grade.= " ".$key2.":".$value2;
                        }

                      }

                  ?>

                  <div class="item-car">


                        <div class="img-item-car">
                          <img src="<?php echo $value['eImgPro'];?>" >
                        </div>


                      <div class="desc-item-car">
                        <h5><a href="visualizar.php?id=<?php echo $value['eIdPro']; ?>"><?php echo "Cód.: ".$value['eIdPro']." - ".$value["eNomPro"]; ?></a></h5>
                        <label for="">Itens: <?php echo $value['eQuaPro']; ?> (uni).</label>
                        <label for=""> <?php echo $text_grade; ?></label>
                        <label for="">Sub-total (R$): <?php echo number_format($value['eQuaPro'] * $value['ePrePro'], 2, ",", ".");?></label>
                      </div>

                        <div class="action-item-car">
                        <button name="bDeletarItem" class="btn btn-black" value="<?php echo $value['eIdPro'];?>"><i class="bi bi-trash3-fill"></i></button>
                        </div>

                  </div>

                  <?php
                    }
                  ?>

                </div>

                <div class="col-lg-12">

                  <?php
                    if($total_car){
                  ?>
                  <p><i class="bi bi-calculator-fill"></i> Total em compras: R$<?php echo number_format($total_car, 2, ",", "."); ?></p>

                  <div id="id_res_car"></div>

                  <a href="#" id="b_finalizar_c" class="btn btn-black btn-radius btn-lg"><i class="bi bi-cart-check-fill"></i> Finalizar</a>
                  <button class="btn btn-black btn-radius btn-lg" id="bEsvCar"><i class="bi bi-cart-x-fill"></i> Esvaziar</button>
                  <?php
                    }
                  ?>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="card-menu4" id="card-menu4">

      <div class="container">

        <div class="row justify-content-md-center">


        <div class="col-lg-4">

          <id class="form-login">

            <br>

            <div class="form-group">
              <label for=""><i class="bi bi-envelope-heart"></i> E-mail:</label>
              <input type="text" id="eEmailLogin" class="form-control form-control-lg" placeholder="exemple@exemple.com.br">
            </div>

            <br>

            <div class="form-group">
              <label for=""><i class="bi bi-lock-fill"></i> Senha:</label>
              <input type="password" id="eSenhaLogin" class="form-control form-control-lg" placeholder="a senha da felicidade">
            </div>

            <br>

            <p id="p_login"></p>

            <button type="submit" class="btn btn-black btn-lg btn-radius" id="bLogin"><i class="bi bi-heart-fill"></i> Entrar</button>
            <a href="#" class="btn btn-black btn-lg btn-radius" id="bModal"><i class="bi bi-person-fill-add"></i> Cadastre-se</a>

          </id>

          <br>

        </div>


        </div>

      </div>

    </div>