<?php

require_once 'seguranca.php';
    require_once 'classes/Conexao.php';
    require_once 'dao/AluguelDAO.php';
    require_once 'dao/CarroDAO.php';
    require_once 'dao/ProjetoDAO.php';
    
    $conn = new Conexao();
    $carrodao = new CarroDAO();
    $projetodao = new ProjetoDAO();

$arquivo = 'RelatoriosUsoCarrosCTC.xls';

$html = "";
$html .= "<table border='1'>";
$html .= "<tr>";
$html .= "<td>ID</td>";
$html .= "<td>Carro</td>";
$html .= "<td>Usuario</td>";
$html .= "<td>Projeto</td>";
$html .= "<td>Origem</td>";
$html .= "<td>Destino</td>";
$html .= "<td>Data Aluguel</td>";
$html .= "<td>Data Devolucao</td>";
$html .= "</tr>";

$a = mysqli_query($conn->Conectar(), "SELECT * FROM aluguel");
$al = mysqli_num_rows($a);

while($al = mysqli_fetch_array($a)){
   $html .= "<tr>";
   $html .= "<td>" . $al['id'] . "</td>";
   $p = $al['carro'];
   $placas = mysqli_query($conn->Conectar(), "SELECT * FROM carros WHERE placa = '$p'");
   $lp = mysqli_fetch_array($placas);
   $html .= "<td>" . $lp['placa'] . " " . $lp['modelo'] . "</td>";
   
   $u = $al['usuario'];
   $usuario = mysqli_query($conn->Conectar(), "SELECT * FROM usuarios WHERE id = $u");
   $lu = mysqli_fetch_array($usuario);
   $html .= "<td>" . $lu['usuario'] . "</td>";
   
   $prj = $al['projeto'];
   $projetos = mysqli_query($conn->Conectar(), "SELECT * FROM projetos WHERE id = $prj");
   $lprj = mysqli_fetch_array($projetos);
   $html .= "<td>" . $lprj['nome'] . "</td>";

   $html .= "<td>" . $al['origem'] . "</td>"; 
   $html .= "<td>" . $al['destino'] . "</td>"; 
   $html .= "<td>" . $al['dataaluguel'] . "</td>"; 
   $html .= "<td>" . $al['datadevolucao'] . "</td>"; 
   $html .= "</tr>";
}

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit; 
header("Location: utilizacaocarros.php");
?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

