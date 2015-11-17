
<?php
require_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/theme.css" rel="stylesheet">

  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bootstrap theme</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      


      <div class="page-header">
        <h1>Cadastro de usuário</h1>
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

  $dados = $_POST['usuario'];

  // validando e-mail
  if($dados['inputEmail'] == ""){

    $erros[] = "O campo e-mail esta vazio!";

  }

  // Validando nome
  if($dados['inputNome'] == ""){

    $erros[] = "O campo nome esta vazio!";

  }

   // Validando nome
  if($dados['inputSenha'] == ""){

    $erros[] = "O campo senha esta vazio!";

  }

  // Testa se nao encontrou nenhum erro
  if(count($erros) == 0){

    $md5 = md5($dados['inputSenha']);

    // Inserir no banco
    $sql = "INSERT INTO usuario(
              nome, email, senha)
      VALUES ('" . $dados['inputNome'] .  "', 
        '" .$dados['inputEmail'] . "', 
        '$md5');";

    //echo $sql;

    $count = $dbh->exec($sql);

    if($count == 0){

      $erros[] = "Ocorreu um erro ao inserir o usuario!";

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

                <a href="index.php" class="btn btn-info">Voltar</a>

              </div>
            </div>

          </form>


        </div>
      </div>





    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
