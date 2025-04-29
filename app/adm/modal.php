<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-cad">

                        <div class="float-end"><h3 class="bfecharModal"><i class="bi bi-x-lg"></i></h3></div><br>

                        <h1>Cadastre-se</h1>

                        <br>

                        <div class="form-group">
                            <label for=""><i class="bi bi-person-heart"></i> Nome Completo:</label>
                            <input type="text" class="form-control" id="eNome">
                        </div>

                        <div class="form-group">
                            <label for=""><i class="bi bi-envelope-heart-fill"></i> Melhor E-mail:</label>
                            <input type="text" class="form-control" id="eEmail">
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""><i class="bi bi-telephone-fill"></i> Melhor Contato:</label>
                                    <input type="text" class="form-control" id="eContato">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""><i class="bi bi-lock-fill"></i> Senha:</label>
                                    <input type="password" class="form-control" id="eSenha">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""><i class="bi bi-lock-fill"></i> Repita a senha:</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>

                        </div>

                        <br>

                        <button class="btn btn-white" id="bCadUsuario"><i class="bi bi-heart-fill"></i> Cadastrar</button>

                        <button type="reset" class="btn btn-white"><i class="bi bi-x-square-fill"></i> Limpar</button>
                        

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCupom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-cad">

                        <div class="float-end"><h3 class="bfecharModal"><i class="bi bi-x-lg"></i></h3></div><br>

                        <h2><i class="bi bi-heart-fill"></i> Olá <span id="span_nome"></span>, seja bem-vindo!</h2>
                        <br>

                        <p>Cadastro efetuado com sucesso, basta realizar o login!</p>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCancelarVendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-cad">

                        <div class="float-end"><h3 class="bfecharCanAdm"><i class="bi bi-x-lg"></i></h3></div><br>
                        <h2><i class="bi bi-emoji-tear-fill"></i> Cancelamento de Pedido</h2>

                        <form action="pedidos.php?id=<?php if(isset($_GET['id'])){echo $_GET['id'];}?>" method="post">
                            <div class="form-group">
                                <label for="motivoLabel">Motivo do Cancelamento (opicional):</label>
                                <textarea name="eMotCan" id="" class="form-control form-control-lg"></textarea>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-white btn-lg btn-radius" name="bProCan">Prosseguir</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>