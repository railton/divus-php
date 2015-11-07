<?php

function imprimir($valor){
	echo $valor . "<br>";
}

function imprimirArray($valor){
	echo "<pre>";
	print_r($valor);
	echo "</pre>";
}

$foo = "0"; // $foo é string (ASCII 48)
imprimir($foo);

//$foo = $foo + 2;
$foo += 2; // $foo é agora um interio (2)
imprimir($foo);

$foo = $foo + 1.3; // $foo é agora um float (3.3)
imprimir($foo);

$foo = 5 + "10 pequenos porcos"; 
imprimir($foo);


$foo = 10; // $foo é um inteiro

$bar = (boolean) $foo; // $bar é um booleano
imprimir($bar);

if($bar == true){
	imprimir("E true");
}

$foo = (int) $bar;
imprimir($foo);


$a = 3;
$a += 5; // configura $a para 8, como se disséssemos: $a = $a + 5;
$b = "Bom ";
$b .= "Dia!"; // configura $b para "Bom Dia!", como em $b = $b . "Dia!";
//$b = $b . "Dia!
imprimir($b);


// Operadores de comparacao
$a = 1;
$b = 1;

if($a == $b){
	imprimir("E igual");
}

if(5 > 3){
	echo "Maior";
}else{
	echo "Menor";
}

$action = (5 > $a) ? 'Maior' : 'Menor';
imprimir($action);

//$value = @$cache[$key];

$cmd = "ls -la";
$output = `$cmd`;
echo "<pre>$output</pre>";

// Operadores pos e pre incremento
// Pos
$a = 5;
imprimir("Deve ser 5: " . $a++);
imprimir("Deve ser 6: " . $a);

// Pre
$a = 5;
imprimir("Deve ser 6: " . ++$a);
imprimir("Deve ser 6: " . $a);


$a = false;
$b = true;

if($a == false and $b == true){
	imprimir("Hello world");
}

// and = &&
// or = ||


$a = ["a" => "maca", "b" => "banana"];
$b = ["a" =>"pera", "b" => "framboesa", "c" => "morango"];
$c = $a + $b;
imprimirArray($c);



// Estruturas de controle
$a = 2;
$b = 4;

if ($a > $b) {
	echo "a e maior b";
} else if ($a == $b) {
	echo "a e igual a b"; 
} else if ($a > 10) {
	echo "a e maior que 10"; 
} else {
	echo "a e menor que b"; 
}

if ($a > $b) {
	echo "a e maior b";
} else {
	echo "a e menor que b"; 
}

// Sintaxe alternativa
if($a > $b):
	echo "a e maior b";




endif;



?>

<?php
if($a > $b):
?>

<table>
	<tr>
		<td>dfdfd</td>
	</tr>
	<tr>
		<td>dfdfd</td>
	</tr>
	<tr>
		<td>dfdfd</td>
	</tr>

</table>

<?php
else:
?>

<a href="www.google.com">Google</a>

<?php
endif;
?>


