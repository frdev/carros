<?php

require_once 'seguranca.php';
require_once 'classes/Conexao.php';
require_once 'dao/AluguelDAO.php';


$alugueldao = new AluguelDAO();
$conn = new Conexao();

$alugueldao->infoAluguel($_GET['id'], $conn->Conectar());

?>


