<?php

$hostname = 'localhost';
$username = 'postgres';
$password = 'tralala'; // Senha
$database = 'divus';

$conexao = "pgsql:host=$hostname;dbname=$database";

try {
    $dbh = new PDO($conexao, $username, $password);
    echo 'Conectado ao banco de dados';
}
catch(PDOException $e)
{
	echo $e->getMessage();
}


//Recuperar todos registros
// $sql = "SELECT * FROM usuario";

// $sth = $dbh->prepare($sql);

// $sth->execute();

// $rows = $sth->fetchAll();

// //print_r($rows);

// foreach($rows as $row){

//    echo $row['nome'] . " - " . $row['email'] .   "<br>";

// }
echo "<br><br>";
// Recuperar um registro
// $sql = "SELECT * FROM usuario WHERE codigo = 30000";
// $sth = $dbh->prepare($sql);
// $sth->execute();

// $row = $sth->fetch();
// //print_r($row);
// if($row != null){
// 	echo $row['nome'];
// }else{
// 	echo "Nao existe usuario com este codigo <br>";
// }


// Insert/Deletar/Update
//$sql = "DELETE FROM usuario WHERE codigo = 1";
//$count = $dbh->exec($sql);
//echo "Linhas deletadas: $count";

// Inserir 100 setores na tabela setor utilizando o insert

// for ($i=0; $i < 100; $i++) { 
	
// 	$sql = "INSERT INTO setor(nome) VALUES ('Setor-$i')";
// 	$count = $dbh->exec($sql);

// 	if($count > 0){
// 		echo "Inserido com sucesso! <br>";
// 	}else{
// 		echo "Error: " . $sql . "<br>";
// 	}

// }


// Usando parametros
// $sexo = 1;
// $s = $dbh->prepare('SELECT nome FROM usuario WHERE codigo = :codigo');
// $s->bindParam(':codigo', $codigo); // usado bindParam para vincular a variável
// $s->execute();

// simulando sql injection
$codigo = $_GET['codigo'];
$sql = "DELETE FROM usuario WHERE codigo = $codigo";
$count = $dbh->exec($sql);
echo "Linhas deletadas: $count";


