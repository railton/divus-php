<?php

$valor1 = null;
$valor2 = null;

if($_POST){

	$valor1 = $_POST['valor1'];
	$valor2 = $_POST['valor2'];

	$total = $valor1 + $valor2;

	//echo "Total: " . $total . "<br>";
}
?>

<html>
<head>
	<title>Calculadora</title>
</head>
<body>

<form action="" method="post">
Valor 1: <input type="text" name="valor1" value="<?= $valor1 ?>" /> <br />
Valor 2: <input type="text" name="valor2" value="<?= $valor2 ?>" /> <br />
<input type="submit" name="submit" value="Somar" />
</form>

<?php

if($_POST){
	echo "Total: " . $total . "<br>";
}	

?>

</body>
</html>