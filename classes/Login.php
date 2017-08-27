<?php

require_once 'Conexao.php';
require_once 'dao/UsuarioDAO.php';

class Login {
    //put your code here
    
    private $id;
    private $usuario;
    private $status;
    private $acesso;
    
    public function __construct(){

    }
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getAcesso() {
        return $this->acesso;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setAcesso($acesso) {
        $this->acesso = $acesso;
    }
    
}
