<?php

session_start();

require_once 'classes/Conexao.php';
require_once 'dao/UsuarioDAO.php';


$conn = new Conexao();
$usuariodao = new UsuarioDAO();

$user = $_POST['usuario'];
$senha = md5($_POST['senha']);

$login = $usuariodao->getSelectLogin($user, $senha, $conn->Conectar());

if($login == 'erro'){
    $_SESSION['usuario'] = "<p class='text-center text-danger'><b>Usuário ou senha incorretos.</b></p>";
    header("Location: index.php");
} else {
    $_SESSION['idusuario'] = $login->getId();
    $_SESSION['nomeusuario'] = $login->getUsuario();
    $_SESSION['acessousuario'] = $login->getAcesso();
    $_SESSION['statususuario'] = $login->getStatus();
    header("Location: utilizacaocarros.php");
}

?>

