<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'dao/CarroDAO.php';


$carrodao = new CarroDAO();
$conn = new Conexao();

$carrodao->apagarCarro($_GET['placa'], $conn->Conectar());

?>
