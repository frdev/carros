<?php

require_once 'seguranca.php';
require_once 'dao/UsuarioDAO.php';
require_once 'classes/Conexao.php';


$conn = new Conexao();
$usuariodao = new UsuarioDAO();

$id = $_SESSION['idusuario'];
$atual = $_POST['senhaatual'];
$nova = $_POST['novasenha'];
$conf = $_POST['confnovasenha'];

if($nova == $conf){
    $usuariodao->alterarSenhaUsuario($id, $atual, $nova, $conn->Conectar());
} else {
    $_SESSION['alteracaosenha'] = "<p class='text-center text-danger'><b>Senhas divergentes</b></p>";
}

?>

