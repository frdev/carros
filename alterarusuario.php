<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'classes/Usuario.php';
require_once 'dao/UsuarioDAO.php';


$conn = new Conexao();
$usuario = new Usuario();
$usuariodao = new UsuarioDAO();

$usuario->setId($_POST['id']);
$usuario->setAcesso($_POST['acesso']);
$usuario->setEmail($_POST['email']);
$usuario->setUsuario($_POST['usuario']);
$usuario->setSenha($_POST['senha']);
$usuario->setStatus($_POST['status']);
$usuariodao->alterarUsuario($usuario, $conn->Conectar());

?>
