<html>
<head>
	<title>Divus</title>
</head>
<body>

<?php

	$teste = "Hello world!";

?>	


<h4><?= $teste ?></h4>
<h4>
	<?php 
		echo $teste; 
		echo "<br>";
	?>
</h4>


<table>
	<tr>
		<td><b>Nome</b></td>
		<td><b>Idade</b></td>
		<td><b>Cidade</b></td>
	</tr>

	<?php

	$dados = [
				[
					'nome' => 'Chico Bento',
					'idade' => 15,
					'cidade' => 'Manaus',
				],
				[
					'nome' => 'Cebolinha',
					'idade' => 14,
					'cidade' => 'Careiro',
				],
				[
					'nome' => 'Cascao',
					'idade' => 13,
					'cidade' => 'Itacoatiara',
				],
	];

	foreach($dados as $dado):
	?>

	<tr>
		<td><?= $dado['nome'] ?></td>
		<td><?= $dado['idade'] ?></td>
		<td><?= $dado['cidade'] ?></td>
	</tr>

	<?php
	endforeach;
	?>


</table>



<?php

$teste = "abcd";

if(strlen($teste) > 5):

?>

	Maior que 5 <br>

<?php
endif;
?>


<?php

$teste = "abcd";

if(strlen($teste) > 5){

	echo "Maior que 5 <br>";
}
?>


<h1>Titulo</h1>
<h2>Titulo</h2>
<h3>Titulo</h3>
<h4>Titulo</h4>
<h5>Titulo</h5>
<h6>Titulo</h6>
<h7>Titulo</h7>


</body>
</html>