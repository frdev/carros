<?php

if($_SESSION['acessousuario'] != 1){
    unset($_SESSION['idusuario'], $_SESSION['nomeusuario'], $_SESSION['statususuario'], $_SESSION['acessousuario']);
    $_SESSION['login'] = "<p class='text-center text-danger'><b>Área restrita para usuários cadastrados.</b></p>";
    header("Location: index.php");
}

?>
