<?php
    require_once 'seguranca.php';
    require_once 'classes/Conexao.php';
    require_once 'classes/Aluguel.php';
    require_once 'dao/AluguelDAO.php';
    
    $conn = new Conexao();
    $aluguel = new Aluguel();
    $alugueldao = new AluguelDAO();
    
    $aluguel->setUsuario($_SESSION['idusuario']);
    $aluguel->setCarro($_POST['carro']);
    $aluguel->setProjeto($_POST['projeto']);
    $aluguel->setDataaluguel($_POST['dthr']);
    $aluguel->setOrigem($_POST['origem']);
    $aluguel->setDestino($_POST['destino']);
    $alugueldao->Alugar($aluguel, $conn->Conectar());
       
?>
