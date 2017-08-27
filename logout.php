<?php
    session_start();
    session_destroy();
    unset($_SESSION['idusuario'], $_SESSION['nomeusuario'], $_SESSION['acessousuario'], $_SESSION['statususuario']);
    header("Location: index.php");
?>
