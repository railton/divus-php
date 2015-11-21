<?php

class Pessoa{
    public $nome;
    public $idade;
    
    function __construct($nome, $idade) {
        
        $this->nome = $nome;
        $this->idade = $idade;

        echo "Criando o objeto do " . $this->nome . "<br>";
    }
    
    public function anda(){
        echo $this->nome . " andou!<br>";
    }
    
    public function fala(){
        echo "Falou!";
    }
    
    function __destruct() {
        //echo "Objecto finalizado <br>";
    }
}

class Policial extends Pessoa{
    
    public $patente;
    
    public function atira(){
        echo "Atira <br>";
    }
    
    public function prende(){
        echo "Prendeu a galera da FDN <BR>";
    }
    
    public function fala(){
        echo "Gritar!<br>";
    }
    
}

$policial = new Policial("Joao", 30);

$policial->fala();

$policial->prende();

//$pessoa = new Pessoa("Joao", 16);
//echo $pessoa->idade . "<br>";
//$pessoa2 = new Pessoa();

//$pessoa->nome = "Joao";
//$pessoa->idade = 16;

//echo $pessoa->nome . "<br>";
//
//$pessoa->anda();
//$pessoa2->anda(); // Fulano
//
//$pessoa2->nome = "Sergio";
//$pessoa2->anda(); // Sergio