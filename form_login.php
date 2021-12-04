<?php
  include "components/header.php";
?>
  <main>
      <div class="container">
          <div id="login" class="row my-5 rounded-3">
              <div class="col-12 col-md-8 align-items-center justify-content-center padding-login">
                  <div>
                      <h1 class="text-center">Entre na sua conta</h1>
                      <form id="loginForm" class="mx-auto" action="login.php" method="POST">
                          <div class="input-group flex-nowrap mb-3">
                              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                                  aria-label="Username" aria-describedby="addon-wrapping">
                          </div>
                          <div class="input-group flex-nowrap mb-3">
                              <input type="password" class="form-control" id="email" name="password" placeholder="Senha"
                                  aria-label="Username" aria-describedby="addon-wrapping">
                          </div>
                          <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" name="relembrar-usuario" value="ativo"
                                  id="relembrar-usuario">
                              <label class="form-check-label" for="relembrar-usuario">
                                  Relembrar usuário
                              </label>
                          </div>
                          <div class="text-center mb-3">
                              <button type="submit" class="btn rounded-pill px-5"
                                  style="background-color: #d2cece;">Login</button>
                          </div>
                          <div class="text-start">
                              <a class="text-decoration-none text-dark" href="#">Esqueceu sua senha?</a>
                          </div>
                      </form>
                  </div>
              </div>
              <div
                  class="col-12 col-md-4 py-5 bg-dark d-flex align-items-center justify-content-center padding-login">
                  <div class="text-white">
                      <h2 class="text-center">Olá, Amigo!</h2>
                      <p class="text-center">Insira seus dados pessoais e comece a jornada conosco</p>
                      <div class="text-center">
                          <a class="btn btn-light" href="form_cadastro.php">Registrar</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>


<?php
  include "components/footer.php";  