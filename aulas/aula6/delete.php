<?php
require_once('db.php');

$codigo = $_GET['codigo'];
$sql = "DELETE FROM usuario WHERE codigo = $codigo";
$count = $dbh->exec($sql);

// if($count > 0){
// 	echo "Deletado com sucesso!";
// }

header('Location: index.php');



?>