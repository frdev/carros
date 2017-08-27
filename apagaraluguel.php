<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'dao/AluguelDAO.php';


$alugueldao = new AluguelDAO();
$conn = new Conexao();

$alugueldao->apagarAluguel($_GET['id'], $conn->Conectar());

?>
