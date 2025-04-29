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

    <title>Adm - Cad Produto</title>
</head>
<body>

  <?php
    require_once("menu.php");
  ?>

    <div class="container">

      <div class="page">

        <div class="row">

            <div class="col-lg-6">

              <form enctype="multipart/form-data" action="cad_produto.php" method="POST">

                <h1>Cadastrar Produto</h1>

                <?php

                  

                  if (isset($_POST['bSalvar'])) {

                    $caminho = "../img/upload/";
                    
                    $quant = 3;

                    $nome = array();

                    $i = 0;

                    $result;

                    for ($i=0; $i < $quant; $i++) {

                     if(isset($_FILES['eFotPro']['name'][$i])){
                    
                        $uploadfile = $caminho.basename($_FILES['eFotPro']['name'][$i]);

                        if (move_uploaded_file($_FILES['eFotPro']['tmp_name'][$i], $uploadfile)) {
                            $nome[] = $_FILES['eFotPro']['name'][$i];
                        } else {
                            echo $_FILES['eFotPro']['error'][$i];
                        }
                      }else{
                        $nome[] = "";
                      }                

                    }

                    $pre = 0;

                    if(isset($_POST['sPrePro'])){
                      $pre = 1;
                    }

                    $com = 0;

                    if(isset($_POST['sComPro'])){
                      $com = 1;
                    }

                    if ($_POST['sGraPro'] == 1) {
                      $result = $adm->pro->cadastrar(array(
                          "ePp" => $_POST['ePp'],
                          "eP" => $_POST['eP'],
                          "eM" => $_POST['eM'],
                          "eG" => $_POST['eG'],
                          "eGg" => $_POST['eGg'],
                          "sGraPro" => $_POST['sGraPro'],
                          "eNomPro" => $_POST['eNomPro'],
                          "eDesPro" => $_POST['eDesPro'],
                          "eValCus" => $_POST['eValCus'],
                          "eValAta" => $_POST['eValAta'],
                          "eValVar" => $_POST['eValVar'],
                          "sDepPro" => $_POST['sDepPro'],
                          "fUplPro" => $nome,
                          "sPrePro" => $pre,
                          "sComPro" => $com
                       ));
                    }else{
                      $result = $adm->pro->cadastrar(array(
                        "e34" => $_POST['e34'],
                        "e36" => $_POST['e36'],
                        "e38" => $_POST['e38'],
                        "e40" => $_POST['e40'],
                        "e42" => $_POST['e42'],
                        "e44" => $_POST['e44'],
                        "e46" => $_POST['e46'],
                        "sGraPro" => $_POST['sGraPro'],
                        "eNomPro" => $_POST['eNomPro'],
                        "eDesPro" => $_POST['eDesPro'],
                        "eValCus" => $_POST['eValCus'],
                        "eValAta" => $_POST['eValAta'],
                        "eValVar" => $_POST['eValVar'],
                        "sDepPro" => $_POST['sDepPro'],
                        "fUplPro" => $nome,
                        "sPrePro" => $pre,
                        "sComPro" => $com
                      ));
                    }

                    if($result[0]){
                      echo "<p> Cadastrado com sucesso!</p>";
                    }
                  }

                /*$uploaddir = '../img/upload/';
                $uploadfile = $uploaddir.basename($_FILES['eFotPro']['name']);

                echo '<pre>';
                if (move_uploaded_file($_FILES['eFotPro']['tmp_name'], $uploadfile)) {
                    echo "Arquivo válido e enviado com sucesso.\n";
                } else {
                    echo "Possível ataque de upload de arquivo!\n";
                }

                echo 'Aqui está mais informações de debug:';*/

                ?>

                <div class="form-group">
                    <label for="fotoDoProduto">Selecione a foto do produto:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="file"required name="eFotPro[]" id="eFotPro" class="form-control" accept="image/*" multiple="multiple">
                </div>

                <br>

                <div class="form-group">
                    <label for="nomeDepartamento">Nome do Produto:</label>
                    <input type="text" name="eNomPro" id="eNomPro" class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="descricaoDepartamento">Descrição do Produto:</label>
                    <textarea name="eDesPro" id="eDesPro" class="form-control" required></textarea>
                </div>

                <br>

                <div class="form-group">
                  <label for="codigoDepartamento">Selecione o departamento:</label>
                  <select name="sDepPro" id="sDepPro" class="form-control">
                    <?php
                      $adm->dep->listarSelect01();
                    ?>
                  </select>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-4">
                        <div clss="form-group">
                            <label for="valorCusto">Valor Custo (R$):</label>
                            <input type="text" name="eValCus" value="0.00" id="eValCus" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div clss="form-group">
                            <label for="valorCusto">Valor Varejo (R$):</label>
                            <input type="text" name="eValVar" value="0.00" id="eValVar" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div clss="form-group">
                            <label for="valorCusto">Valor Atacado (R$):</label>
                            <input type="text" name="eValAta" value="0.00" id="eValAta" class="form-control">
                        </div>
                    </div>
                </div>
                
                <br>

                <div class="form-group">
                  <label for="tipoGrade">Grade:</label>
                  <select name="sGraPro" id="sGraPro" class="form-control">
                    <option value="0">- Selecione a grade -</option>
                    <option value="1">Grade 01: PP P M G</option>
                    <option value="2">Grade 02: 34 36 38 40 42 44 46</option>
                  </select>
                </div>

                <br>

                <div id="box-grade01">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>PP</th>
                        <th>P</th>
                        <th>M</th>
                        <th>G</th>
                        <th>GG</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="number" id="ePp" name="ePp" class="form-control" value="0"></td>
                        <td><input type="number" id="eP" name="eP" class="form-control" value="0"></td>
                        <td><input type="number" id="eM" name="eM" class="form-control" value="0"></td>
                        <td><input type="number" id="eG" name="eG" class="form-control" value="0"></td>
                        <td><input type="number" id="eGg" name="eGg" class="form-control" value="0"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div id="box-grade02">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>34</th>
                        <th>36</th>
                        <th>38</th>
                        <th>40</th>
                        <th>42</th>
                        <th>44</th>
                        <th>46</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="number" id="e34" name="e34" class="form-control" value="0"></td>
                        <td><input type="number" id="e36" name="e36" class="form-control" value="0"></td>
                        <td><input type="number" id="e38" name="e38" class="form-control" value="0"></td>
                        <td><input type="number" id="e40" name="e40" class="form-control" value="0"></td>
                        <td><input type="number" id="e42" name="e42" class="form-control" value="0"></td>
                        <td><input type="number" id="e44" name="e44" class="form-control" value="0"></td>
                        <td><input type="number" id="e46" name="e46" class="form-control" value="0"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="sComPro" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">Disponibilizar/comercializar item na Loja.</label>
                </div>

                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" name="sPrePro">
                  <label class="form-check-label" for="flexSwitchCheckChecked1">Produto linha Premium.</label>
                </div>

                <div id="p_login"></div>

                <br>

                <!--<button class="btn btn-black" id="bCadPro">Cadastrar</button>
                <button class="btn btn-black" id="bLimPro">Limpar</button>-->
                
                <button class="btn btn-black btn-lg btn-radius" type="submit" name="bSalvar"><i class="bi bi-check-circle-fill"></i> Cadastrar</button>
              </form>

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
    <script src="../framework/jquery-mask/dist/jquery.mask.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/ajax.js"></script>

    <script>
      $('#eValCus').mask("###0.00", {reverse: true});
      $('#eValVar').mask("###0.00", {reverse: true});
      $('#eValAta').mask("###0.00", {reverse: true});
    </script>

</body>
</html>