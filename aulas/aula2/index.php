<?php

	// Comentar somente uma linha
	/*
	sadfsad
	asdfsad
	asdfasd
	asdf
	*/
	//echdfdo "Hello world!"
	//echo "Hello world!";
	/*
	echo "Hello world!";
	echo "Hello world!";
	echo "Hello world!";
	echo "Hello world!";
	*/

	
	// $nome = 10; // Inteiro
	// $nome = 45.45; // Float
	// $nome = true; // Bolean
	// $nome = "Chico"; // String
	// echo $nome;

	// $valor1 = 10;
	// $valor2 = 20;

	// echo $valor1 + $valor2;

	// //Aspas simples e dupla
	// $nome = "Chico";
	// $sobrenome = "Bento";
	
	// echo 'Olá $nome';

	// echo "Olá $nome $sobrenome <br>";
	// echo 'Olá ' . $nome . " " . $sobrenome . "<br>";

	// //echo "Chico";
	// //echo 'Chico';

	// $nome = "chico";
	// $$nome = "teste";

	// echo "$nome $chico <br>";

	// echo 'Arnold disse uma vez: "I\'ll be back" <br>';

	// echo "\"Teste\" <br>";

	function imprimir($valor){
		echo $valor . "<br>";
	}

	function imprimirArray($valor){
		echo "<pre>";
		print_r($valor);
		echo "</pre>";
	}


	//$a = array(1, 2, 3, 4, 5);
	$a = [1, 2, 3, 4, 5];

	imprimirArray($a);



	$b = [2=>3, 3=>5];
	$b = [];
	$b[2] = 3;
	$b[3] = 5;

	imprimirArray($b);


	$a = [1, 2, 3, 4, 5];

	foreach ($a as $key => $value) {
		echo "$key - $value <br>";
	}

	foreach ($a as $valor) {
		echo $valor;
	}

	$total = count($a);
	imprimir($total);

	echo "<br><br>";
	// for ($i=0; $i < $total; $i++) { 
	// 	imprimir($a[$i]);
	// }

	$alunos = [
		['nome' => "Jose", 'idade' => 14],
		['nome' => "Maria", 'idade' => 12],
		['nome' => "Joao", 'idade' => 13],
	];

	foreach ($alunos as $aluno) {
		imprimir( $aluno['nome'] );
	}


function cube($n)
{
    return($n * $n * $n);
}

$a = array(1, 2, 3, 4, 5);
$b = array_map("cube", $a);

imprimirArray($a);
imprimirArray($b);




?>