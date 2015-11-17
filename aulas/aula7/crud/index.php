<?php

// Verifica se a rota e passada na url
if(isset($_GET['r'])){

	// Divide a rota que foi passada para que seja identificado 
	// quem e o controle e quem e a acao a ser executada
	$rota = explode("/", $_GET['r']);

	// Controle
	$controle = $rota[0];

	// Acao
	$acao = $rota[1];


}else{ // Caso nao seja passada nenhuma rota ele seta a rota padrao default/index

	$controle = "default";
	$acao = "index"; 

}	


// Conexao com o banco
require_once('config/db.php');

// Incluir controller selecionado na rota
require_once('controle/' . $controle . '.php');

// Incluir layout principal
require_once('visao/layout/principal.php');