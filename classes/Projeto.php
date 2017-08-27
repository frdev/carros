<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projeto
 *
 * @author felipe.ristow
 */
class Projeto {
    //put your code here
    private $id;
    private $nome;
    private $cr;
    
    public function __construct(){
        
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCr() {
        return $this->cr;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCr($cr) {
        $this->cr = $cr;
    }
    
}
