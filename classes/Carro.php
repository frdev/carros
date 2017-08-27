<?php

require_once 'Conexao.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carro
 *
 * @author felipe.ristow
 */
class Carro {
    //put your code here
    private $placa;
    private $modelo;
    private $cor;
    
    public function __construct(){
        
    }
    
    function getPlaca() {
        return $this->placa;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getCor() {
        return $this->cor;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }
}
