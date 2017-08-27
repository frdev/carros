<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'classes/Carro.php';
require_once 'dao/CarroDAO.php';

$conn = new Conexao();
$carro = new Carro();
$carrodao = new CarroDAO();

$carro->setPlaca($_POST['placa']);
$carro->setModelo($_POST['modelo']).
$carro->setCor($_POST['cor']);

$carrodao->alterarCarro($carro, $conn->Conectar());

?>

