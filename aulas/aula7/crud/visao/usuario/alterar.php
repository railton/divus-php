  <div class="page-header">
        <h1>Alterar usuário</h1>
      </div>
      <div class="row">
        <div class="col-md-12">

<?php

$erros = [];

$count = 0;

if($_POST){

  //echo "Foi realizado um post <br>";

  // echo "<pre>";
  // print_r($_POST['usuario']);
  // echo "</pre>";

  //$dados = $_POST['usuario'];

  $dados['nome'] = $_POST['usuario']['nome'];
  $dados['email'] = $_POST['usuario']['email'];
  $dados['senha'] = $_POST['usuario']['senha'];

  // validando e-mail
  if($dados['email'] == ""){

    $erros[] = "O campo e-mail esta vazio!";

  }

  // Validando nome
  if($dados['nome'] == ""){

    $erros[] = "O campo nome esta vazio!";

  }

  if($dados['senha'] != ""){

    $md5 = md5($dados['senha']);

  }else{

    $md5 = $senha_temp;

  }

  // Testa se nao encontrou nenhum erro
  if(count($erros) == 0){

    

    // Inserir no banco
    $sql = "UPDATE  usuario SET nome='".$dados['nome']."', email='".$dados['email']."',
     senha='".$md5."' WHERE codigo = $codigo";

    //echo $sql;

    $count = $dbh->exec($sql);

    if($count == 0){

      $erros[] = "Ocorreu um erro ao alterar o usuario!";

    }

  } // if

} // _POST

?>

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

    Usuario alterado com sucesso

  </div>

<?php
endif;
?>

          <form action="" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail" name="usuario[email]" value="<?= $dados['email'] ?>" placeholder="E-mail">
              </div>
            </div>

            <div class="form-group">
              <label for="inputNome" class="col-sm-2 control-label">Nome</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputNome" name="usuario[nome]" value="<?= $dados['nome'] ?>" placeholder="Nome">
              </div>
            </div>

            <div class="form-group">
              <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" id="inputSenha" name="usuario[senha]" value="<?= $dados['senha'] ?>" placeholder="Senha">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">

                <button type="submit" class="btn btn-success">Alterar</button>

                <a href="index.php?r=usuario/index" class="btn btn-info">Voltar</a>

              </div>
            </div>

          </form>


        </div>
      </div>
