<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluguel
 *
 * @author felipe.ristow
 */
class Aluguel {
    //put your code here
    private $id;
    private $carro;
    private $usuario;
    private $projeto;
    private $origem;
    private $destino;
    private $dataaluguel;
    private $datadevolucao;
    
    function __construct() {
        
    }
    
    function getOrigem() {
        return $this->origem;
    }

    function getDestino() {
        return $this->destino;
    }

    function setOrigem($origem) {
        $this->origem = $origem;
    }

    function setDestino($destino) {
        $this->destino = $destino;
    }
    
    function getId() {
        return $this->id;
    }

    function getCarro() {
        return $this->carro;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getProjeto() {
        return $this->projeto;
    }

    function getDataaluguel() {
        return $this->dataaluguel;
    }

    function getDatadevolucao() {
        return $this->datadevolucao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCarro($carro) {
        $this->carro = $carro;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setProjeto($projeto) {
        $this->projeto = $projeto;
    }

    function setDataaluguel($dataaluguel) {
        $this->dataaluguel = $dataaluguel;
    }

    function setDatadevolucao($datadevolucao) {
        $this->datadevolucao = $datadevolucao;
    }
    
}
