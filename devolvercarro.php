<?php

session_start();

 require_once 'classes/Conexao.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');
$hora = date('H:i:s');

$conn = new Conexao();

$id = $_GET['id'];

$select = mysqli_query($conn->Conectar(), "SELECT * FROM aluguel WHERE id = $id");
$select = mysqli_fetch_array($select);

$databanco = explode(" " , $select['dataaluguel']);

$dt = $databanco[0];
$hr = $databanco[1];

print_r($databanco);
print_r($dt, $hr);

if(strtotime($dt) <= strtotime($data) && strtotime($hr) <= strtotime($hora)){
    $_SESSION['aluguel'] = "<p class='text-danger text-center'><b>Data de devolução inferior a data de aluguel.</b></p>";
    header("Location:  utilizacaocarros.php");
} else {
    $query = mysqli_query($conn->Conectar(), "UPDATE aluguel SET datadevolucao = NOW() WHERE id = $id");
    $_SESSION['aluguel'] = "<p class='text-success text-center'><b>Carro " . $select['carro'] . " devolvido com sucesso.</b></p>";
    header("Location:  utilizacaocarros.php");
}



?>