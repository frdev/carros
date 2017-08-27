<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'dao/UsuarioDAO.php';


$usuariodao = new UsuarioDAO();
$conn = new Conexao();

$usuariodao->alterarStatusUsuario($_GET['id'], $conn->Conectar());

?>

