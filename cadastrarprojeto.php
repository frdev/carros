<?php

require_once 'seguranca.php';
require_once 'validaadmin.php';
require_once 'classes/Conexao.php';
require_once 'classes/Projeto.php';
require_once 'dao/ProjetoDAO.php';

$conn = new Conexao();
$prj = new Projeto();
$prjdao = new ProjetoDAO();

$prj->setNome($_POST['nome']);
$prj->setCr($_POST['cr']);

$prjdao->inserirProjeto($prj, $conn->Conectar());

?>