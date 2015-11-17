<?php


switch ($acao) {

    case 'index':
        
        //Recuperar todos registros
		$sql = "SELECT * FROM usuario order by codigo";

		$sth = $dbh->prepare($sql);

		$sth->execute();

		$rows = $sth->fetchAll();

		$visao = "index";

        break;

    case 'cadastrar':
        
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

		$visao = "cadastrar";

        break;

    case 'alterar':
        
        $codigo = $_GET['codigo'];
		// Recuperar um registro
		$sql = "SELECT * FROM usuario WHERE codigo = $codigo";
		$sth = $dbh->prepare($sql);
		$sth->execute();

		$dados = $sth->fetch();

		$senha_temp = $dados['senha'];

		$dados['senha'] = "";

		$visao = "alterar";

        break;  

    case 'deletar':

		$codigo = $_GET['codigo'];
		$sql = "DELETE FROM usuario WHERE codigo = $codigo";
		$count = $dbh->exec($sql);

		// if($count > 0){
		// 	echo "Deletado com sucesso!";
		// }

		header('Location: index.php?r=usuario/index');

        break;   

}