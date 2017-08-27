<?php

class Conexao{
    //put your code here

    public function __construct() {
        $this->Conectar();
    }
    
    public function Conectar(){
        header('Content-Type: text/html; charset=utf-8');
        $conn = mysqli_connect("mysql.hostinger.com.br", "u322120177_root", "feristow1508", "u322120177_ctc");
        return $conn;
    }
    
}
