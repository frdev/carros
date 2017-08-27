<?php

require_once 'Conexao.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Pichau
 */
class Usuario {
    //put your code here
    
    private $id;
    private $usuario;
    private $acesso;
    private $email;
    private $senha;
    private $status;
    private $criado;
    private $modificado;
    
    public function __construct() {
        
    }
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        
    function getAcesso() {
        return $this->acesso;
    }

    function setAcesso($acesso) {
        $this->acesso = $acesso;
    }

        function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
        
    function getUsuario() {
        return $this->usuario;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getCriado() {
        return $this->criado;
    }

    function getModificado() {
        return $this->modificado;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setCriado($criado) {
        $this->criado = $criado;
    }

    function setModificado($modificado) {
        $this->modificado = $modificado;
    }
    
}
