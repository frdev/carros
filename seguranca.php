<?php
ob_start();
session_start();
if($_SESSION['idusuario'] == "" || $_SESSION['nomeusuario'] == ""){
    unset($_SESSION['idusuario'], $_SESSION['nomeusuario'], $_SESSION['statususuario'], $_SESSION['acessousuario']);
    $_SESSION['login'] = "<p class='text-center text-danger'><b>Área restrita para usuários cadastrados.</b></p>";
    header("Location: index.php");
}
?>