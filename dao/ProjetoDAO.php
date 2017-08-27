<?php

require_once 'classes/Conexao.php';
require_once 'classes/Projeto.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetoDAO
 *
 * @author felipe.ristow
 */
class ProjetoDAO {
    //put your code here
    
    public function inserirProjeto($projeto, $conn){ 
            $nome = $projeto->getNome();
            $cr = $projeto->getCr();
            $query = mysqli_query($conn, "INSERT INTO projetos (nome, cr) VALUES ('$nome', '$cr')");
            if(!mysqli_errno($conn)){
                $_SESSION['projeto'] = "<p class='text-success text-center'><b>Projeto " . $nome . " criado com sucesso.</b></p>";
                header("Location: projetos.php");
            } else {
                $_SESSION['projeto'] = "<p class='text-danger text-center'><b>Projeto " . $nome . " já existe.</b></p>";
                echo "Erro: " . mysqli_error($conn);
            }
    }
    
    public function getSelect($conn){
        $query = mysqli_query($conn, "SELECT * FROM projetos ORDER BY nome ASC");
        $rows = mysqli_num_rows($query);
        echo "<table class='table table-bordered text-center'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td><b>Nome</b></td>";
        echo "<td><b>CR</b></td>";
        echo "<td><b>Editar</b></td>";
        echo "<td><b>Apagar</b></td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($rows = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>" . $rows['nome'] . "</td>";
            echo "<td>" . $rows['cr'] . "</td>";
            echo "<td> <a class='btn btn-sm btn-warning' href='atualizarprojeto.php?id=" . $rows['id'] . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
            echo "<td> <a class='btn btn-sm btn-danger' href='apagarprojeto.php?id=" . $rows['id'] . "'><i class='fa fa-times' aria-hidden='true'></i></a>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    public function apagarProjeto($id, $conn){
        $delete = mysqli_query($conn, "DELETE FROM projetos WHERE id = $id");
        $_SESSION['projeto'] = "<p class='text-success text-center'><b>Projeto " . $id . " deletado com sucesso.</b></p>";
        header("Location: projetos.php");
    }
    
    public function getObjProjeto($id, $conn){
        $p = new Projeto();
        $query = mysqli_query($conn, "SELECT * FROM projetos WHERE id = $id");
        $prj = mysqli_num_rows($query);
        while($prj = mysqli_fetch_array($query)){
            $p->setId($prj['id']);
            $p->setNome($prj['nome']);
            $p->setCr($prj['cr']);
        }
        return $p;
    }
    
    public function alterarProjeto($prj, $conn){
        $id = $prj->getId();
        $nome = $prj->getNome();
        $cr = $prj->getCr();
        
        $query = mysqli_query($conn, "UPDATE projetos SET nome = '$nome', cr = '$cr' WHERE id = $id");
        
        if(mysqli_affected_rows($conn)){
            $_SESSION['projeto'] = "<p class='text-success text-center'><b>Projeto " . $nome . " alterado com sucesso.</b></p>";          
        } else {
            $_SESSION['projeto'] = "<p class='text-danger text-center'><b>Erro ao alterar projeto " . $nome . ".</b></p>"; 
        }
        header("Location: projetos.php");
    }
    
    public function getProjetos($conn){
        $query = mysqli_query($conn, "SELECT id, nome FROM projetos");
        return $query;
    }
    
}
