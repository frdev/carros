<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'classes/Usuario.php';
require_once 'dao/UsuarioDAO.php';


$conn = new Conexao();
$usuario = new Usuario();
$usuariodao = new UsuarioDAO();

/* @var $_POST type */
$usuario->setEmail($_POST['email']);
$usuario->setAcesso($_POST['acesso']);
$usuario->setUsuario($_POST['usuario']);
$usuario->setSenha($_POST['senha']);

$usuariodao->inserirUsuario($usuario, $conn->Conectar());

?>

