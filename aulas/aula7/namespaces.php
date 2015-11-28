<?php

namespace donner;
class Superman {
	var $ator = "Christopher Reeve";
	var $diretor = "Richard Donner";
	var $ano = 1978;
}

namespace snyder;
class Superman {
	var $ator = "Henry Cavill";
	var $diretor = "Zack Snyder ";
	var $ano = 2013;
}


$snyder = new \snyder\Superman();

$donner = new \donner\Superman();

echo $snyder->diretor;

// Formas de instanciar uma classe com namespace

// 1
include "snyder/Superman.php";
$superman = new \snyder\Superman();

// 2
include "snyder/Superman.php";
use snyder\Superman;  
$superman = new Superman();

// 3. Com aliases
include "snyder/Superman.php";
use \snyder\Superman as Kalel;
$superman = new Kalel();