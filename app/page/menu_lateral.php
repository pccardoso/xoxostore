    <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">        
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="bi bi-filter-square-fill"></i> Filtro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">

            <form method="get">

              <div class="form-group">
                <h5><i class="bi bi-alphabet-uppercase"></i> Palavra-chave:</h5>
                <input type="text" value="<?php if(isset($_GET['bPes'])){echo $_GET['ePal'];}?>" class="form-control form-control-lg" placeholder="Digite aqui..." name="ePal">
              </div>

              <br>

              <div class="form-group">
                <h5><i class="bi bi-bag-fill"></i> Selecione a sessão:</h5>
                <select name="sSes" id="" class="form-control form-control-lg">
                  <option value="0">- Selecione a sessão -</option>
                  <?php
                    if(isset($_GET['sSes']) && $_GET['sSes'] != 0){
                      $adm->dep->listarSelect01($_GET['sSes']);
                    }else{
                      $adm->dep->listarSelect01();
                    }
                    
                  ?>
                </select>
              </div>

              <br>

              <div class="form-group">
                <h5><i class="bi bi-aspect-ratio"></i> Selecione o tamanho:</h5>
                <select name="sTam" id="" class="form-control form-control-lg">
                  <option value="0">- Selecione o tamanho -</option>
                  <option value="pp" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "pp"){ echo "selected"; } ?>>PP</option>
                  <option value="p" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "p"){ echo "selected"; } ?>>P</option>
                  <option value="m" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "m"){ echo "selected"; } ?>>M</option>
                  <option value="g" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "g"){ echo "selected"; } ?>>G</option>
                  <option value="gg" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "gg"){ echo "selected"; } ?>>GG</option>
                  <option value="34" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "34"){ echo "selected"; } ?>>34</option>
                  <option value="36" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "36"){ echo "selected"; } ?>>36</option>
                  <option value="38" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "38"){ echo "selected"; } ?>>38</option>
                  <option value="40" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "40"){ echo "selected"; } ?>>40</option>
                  <option value="42" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "42"){ echo "selected"; } ?>>42</option>
                  <option value="44" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "44"){ echo "selected"; } ?>>44</option>
                  <option value="46" <?php if(isset($_GET['bPes']) && $_GET['sTam'] == "46"){ echo "selected"; } ?>>46</option>
                </select>
              </div>
              
              <br>

              <div class="form-group">
                <h5 id="result_prec"><i class="bi bi-cash-coin"></i> Preço<?php if(isset($_GET['bPes'])){ echo " (até R$".$_GET['ePre'].")"; }else{echo " (até R$100,00)";} ?>:</h5>
                <input type="range" name="ePre" class="form-range form-rang-lg" id="disabledRange" min="0" max="100" step="10" value="<?php if(isset($_GET['bPes'])){ echo $_GET['ePre']; }else{echo "100";} ?>">
              </div>

              <br>

              <button type="submit" name="bPes" class="btn btn-black btn-lg btn-radius"><i class="bi bi-search-heart-fill"></i> Pesquisar</button>

            </form>

          </div>
        </div>
      </div>
    </nav>