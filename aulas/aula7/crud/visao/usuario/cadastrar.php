
      <div class="page-header">
        <h1>Cadastro de usuário</h1>
      </div>
      <div class="row">
        <div class="col-md-12">


<?php
if(count($erros) > 0):
?>

  <div class="alert alert-danger" role="alert">

    <?php

    // Mostrar os erros
    foreach($erros as $erro):

      echo $erro . "<br>";

    endforeach;

    ?>

  </div>

<?php
endif;
?>

<?php
if($count == 1):
?>

  <div class="alert alert-success" role="alert">

    Usuario inserido com sucesso

  </div>

<?php
endif;
?>

          <form action="" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail" name="usuario[inputEmail]" placeholder="E-mail">
              </div>
            </div>

            <div class="form-group">
              <label for="inputNome" class="col-sm-2 control-label">Nome</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputNome" name="usuario[inputNome]" placeholder="Nome">
              </div>
            </div>

            <div class="form-group">
              <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" id="inputSenha" name="usuario[inputSenha]" placeholder="Senha">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                
                <button type="submit" class="btn btn-success">Cadastrar</button>

                <a href="index.php?r=usuario/index" class="btn btn-info">Voltar</a>

              </div>
            </div>

          </form>


        </div>
      </div>

