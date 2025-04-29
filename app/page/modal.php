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

                        <h1><i class="bi bi-emoji-smile-upside-down-fill"></i> Cadastre-se</h1>

                        <br>

                        <div class="form-group">
                            <label for=""><i class="bi bi-person-heart"></i> Nome Completo:</label>
                            <input type="text" class="form-control form-control-lg" id="eNome">
                        </div>

                        <div class="form-group">
                            <label for=""><i class="bi bi-envelope-heart-fill"></i> Melhor E-mail:</label>
                            <input type="text" class="form-control form-control-lg" id="eEmail" placeholder="exemple@exemple.com.br">
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""><i class="bi bi-whatsapp"></i> Whatsapp:</label>
                                    <input type="text" class="form-control form-control-lg" id="eContato" placeholder="(00) 90000-0000">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""><i class="bi bi-lock-fill"></i> Senha:</label>
                                    <input type="password" class="form-control form-control-lg" id="eSenha">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""><i class="bi bi-lock-fill"></i> Repita:</label>
                                    <input type="password" class="form-control form-control-lg" id="eSenha2">
                                </div>
                            </div>

                        </div>

                        <br>

                        <div id="result_cad"></div>

                        <br>

                        <button class="btn btn-white btn-lg btn-radius" id="bCadUsuario"><i class="bi bi-heart-fill"></i> Cadastrar</button>

                        <button type="reset" class="btn btn-white btn-lg btn-radius"><i class="bi bi-x-square-fill"></i> Limpar</button>
                        
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

                        <div class="float-end"><h3 class="bfecharModal2"><i class="bi bi-x-lg"></i></h3></div><br>

                        <h2><i class="bi bi-heart-fill"></i> Olá <span id="span_nome"></span>, seja bem-vindo!</h2>
                        <br>

                        <h3>Finalize seu cadastro para liberar seu cupom de 10% OFF na primeira compra!!!</h3>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-cad">

                        <div class="float-end"><h3 class="bfecharCanCli"><i class="bi bi-x-lg"></i></h3></div><br>
                        <h2><i class="bi bi-emoji-tear-fill"></i> Cancelamento de Pedido</h2>

                        <p>Ficamos tristes em saber do seu cancelamento, mas gostaríamos que comentasse brevemente, para assim melhorarmos nossos serviços...</p>

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