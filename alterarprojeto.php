<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'classes/Projeto.php';
require_once 'dao/ProjetoDAO.php';

$conn = new Conexao();
$projeto = new Projeto();
$projetodao = new ProjetoDAO();

$projeto->setId($_POST['id']);
$projeto->setNome($_POST['nome']).
$projeto->setCr($_POST['cr']);

$projetodao->alterarProjeto($projeto, $conn->Conectar());

?>

