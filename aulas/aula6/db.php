
<?php
$hostname = 'localhost';
$username = 'postgres';
$password = 'tralala'; // Senha
$database = 'divus';

$conexao = "pgsql:host=$hostname;dbname=$database";

try {
    $dbh = new PDO($conexao, $username, $password);
}
catch(PDOException $e)
{
  echo $e->getMessage();
}


?>