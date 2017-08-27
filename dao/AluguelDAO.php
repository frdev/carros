<?php

require_once 'classes/Aluguel.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AluguelDAO
 *
 * @author felipe.ristow
 */
class AluguelDAO {
    //put your code here
    
    public function getSelect($conn){
        if($_SESSION['acessousuario'] == 1){
            $query = mysqli_query($conn, "SELECT * FROM aluguel ORDER BY dataaluguel DESC");
        } else {
            $u = $_SESSION['idusuario'];
            $query = mysqli_query($conn, "SELECT * FROM aluguel WHERE usuario = $u");
        }
        $rows = mysqli_num_rows($query);
        echo "<table class='table table-bordered text-center'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td><b>Usuário</b></td>";
        echo "<td><b>Carro</b></td>";
        echo "<td><b>Projeto</b></td>";
        echo "<td><b>Alugado para</b></td>";
        echo "<td><b>Devolvido em</b></td>";
        echo "<td><b>Devolver</b></td>";
        echo "<td><b>+Info</b></td>";
        if($_SESSION['acessousuario'] == 1){
            echo "<td><b>Apagar</b></td>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($rows = mysqli_fetch_array($query)){
            echo "<tr>";
            $user = $rows['usuario'];
            $usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '$user'");
            $usuario1 = mysqli_fetch_array($usuario);
            echo "<td>" . $usuario1['usuario'] . "</td>";
            echo "<td>" . $rows['carro'] . "</td>";
            $projeto = $rows['projeto'];
            $prj = mysqli_query($conn, "SELECT * FROM projetos WHERE id = '$projeto'");
            $prj1 = mysqli_fetch_array($prj);
            echo "<td>" . $prj1['nome'] . "</td>";
            echo "<td>" . $rows['dataaluguel'] . "</td>";
            echo "<td>" . $rows['datadevolucao'] . "</td>";
            if(($_SESSION['idusuario'] == $rows['usuario']) || ($_SESSION['acessousuario'] == 1)){
                if($rows['datadevolucao'] == null){
                    echo "<td> <a class='btn btn-sm btn-success' href='devolvercarro.php?id=" . $rows['id'] . "'><i class='fa fa-check' aria-hidden='true'></i></a>";
                } else {
                    echo "<td><i class='fa fa-check-square-o fa-2x' aria-hidden='true'></i></td>";
                }                
            }
            echo "<td> <a class='btn btn-sm btn-info' href='infoaluguel.php?id=" . $rows['id'] . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
            if($_SESSION['acessousuario'] == 1){
                echo "<td> <a class='btn btn-sm btn-danger' href='apagaraluguel.php?id=" . $rows['id'] . "'><i class='fa fa-times' aria-hidden='true'></i></a>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    public function Alugar($aluguel, $conn){
        $carro = $aluguel->getCarro();
        $usuario = $aluguel->getUsuario();
        $projeto = $aluguel->getProjeto();
        $origem = $aluguel->getOrigem();
        $destino = $aluguel->getDestino();
        $dthr = $aluguel->getDataaluguel();
        $query = mysqli_query($conn, "INSERT INTO aluguel (carro, usuario, projeto, origem, destino, dataaluguel) VALUES ('$carro', '$usuario', '$projeto', '$origem', '$destino', '$dthr')");
        if(!mysqli_errno($conn)){
            $_SESSION['aluguel'] = "<p class='text-success text-center'><b>Carro " . $carro . " alugado com sucesso.</b></p>";
            header("Location: utilizacaocarros.php");
        } else {
            echo mysqli_errno($conn);
            $_SESSION['aluguel'] = "<p class='text-danger text-center'><b>Não é possível alugar o carro " . $carro . ".</b></p>";
            header("Location: utilizacaocarros.php");
        }
    }
    
    public function apagarAluguel($id, $conn){;
        $delete = mysqli_query($conn, "DELETE FROM aluguel WHERE id = $id");
        if(mysqli_affected_rows($conn)){
            $_SESSION['aluguel'] = "<p class='text-success text-center'><b>Aluguel " . $id . " deletado com sucesso.</b></p>";
            header("Location: utilizacaocarros.php");
        } else {
            echo "ERRO";
        }
        
    }
    
    public function infoAluguel($id, $conn){
        $select = mysqli_query($conn, "SELECT * FROM aluguel WHERE id = $id");
        $select = mysqli_fetch_array($select);
        echo "<label for='id'>ID</label>";
        echo "<p id='id'>" . $select['id'] . "</p>";
        echo "<label for='carro'>Carro</label>";
        echo "<p id='carro'>" . $select['carro'] . "</p>";
        $user = $select['usuario'];
        $user = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE id = $user");
        $user = mysqli_fetch_array($user);
        echo "<label for='usuario'>Usuário</label>";
        echo "<p id='usuario'>" . $user['usuario'] . "</p>";
        $prj = $select['projeto'];
        $prj = mysqli_query($conn, "SELECT nome FROM projetos WHERE id = $prj");
        $prj = mysqli_fetch_array($prj);
        echo "<label for='prj'>Projeto</label>";
        echo "<p id='prj'>" . $prj['nome'] . "</p>";
        echo "<label for='origem'>Origem</label>";
        echo "<p id='origem'>" . $select['origem'] . "</p>";
        echo "<label for='destino'>Destino</label>";
        echo "<p id='destino'>" . $select['destino'] . "</p>";
        echo "<label for='dthr'>Alugado para</label>";
        echo "<p id='dthr'>" . $select['dataaluguel'] . "</p>";
        echo "<label for='dtdv'>Devolvido em</label>";
        echo "<p id='dtdv'>" . $select['datadevolucao'] . "</p>";
        echo "<a href='utilizacaocarros.php' class='btn btn-sm btn-default'>Voltar</a>";
    }
    
}
