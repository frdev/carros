<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'dao/ProjetoDAO.php';


$projetodao = new ProjetoDAO();
$conn = new Conexao();

$projetodao->apagarProjeto($_GET['id'], $conn->Conectar());

?>

