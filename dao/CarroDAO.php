<?php

require_once 'classes/Conexao.php';
require_once 'classes/Carro.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarroDAO
 *
 * @author felipe.ristow
 */
class CarroDAO {
    //put your code here
        public function inserirCarro($carro, $conn){ 
            $placa = $carro->getPlaca();
            $modelo = $carro->getModelo();
            $cor = $carro->getCor();
            $query = mysqli_query($conn, "INSERT INTO carros (placa, modelo, cor) VALUES ('$placa', '$modelo', '$cor')");
            if(!mysqli_errno($conn)){
                $_SESSION['carro'] = "<p class='text-success text-center'><b>Carro " . $placa . " criado com sucesso.</b></p>";
                header("Location: carros.php");
            } else {
                $_SESSION['carro'] = "<p class='text-danger text-center'><b>Carro " . $placa . " já existe.</b></p>";
                echo "Erro: " . mysqli_error($conn);
            }
        }
    
        public function getSelect($conn){
        $query = mysqli_query($conn, "SELECT * FROM carros ORDER BY placa ASC");
        $rows = mysqli_num_rows($query);
        echo "<table class='table table-bordered text-center'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td><b>Placa</b></td>";
        echo "<td><b>Modelo</b></td>";
        echo "<td><b>Cor</b></td>";
        echo "<td><b>Editar</b></td>";
        echo "<td><b>Apagar</b></td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($rows = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>" . $rows['placa'] . "</td>";
            echo "<td>" . $rows['modelo'] . "</td>";
            echo "<td>" . $rows['cor'] . "</td>";
            echo "<td> <a class='btn btn-sm btn-warning' href='atualizarcarro.php?placa=" . $rows['placa'] . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
            echo "<td> <a class='btn btn-sm btn-danger' href='apagarcarro.php?placa=" . $rows['placa'] . "'><i class='fa fa-times' aria-hidden='true'></i></a>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    public function getObjCarro($placa, $conn){
        $c = new Carro();
        $query = mysqli_query($conn, "SELECT * FROM carros WHERE placa = '$placa'");
        $car = mysqli_num_rows($query);
        while($car = mysqli_fetch_array($query)){
            $c->setPlaca($car['placa']);
            $c->setModelo($car['modelo']);
            $c->setCor($car['cor']);
        }
        return $c;
    }
    
    public function alterarCarro($carro, $conn){
        $placa = $carro->getPlaca();
        $modelo = $carro->getModelo();
        $cor = $carro->getCor();
        
        $query = mysqli_query($conn, "UPDATE carros SET modelo = '$modelo', cor = '$cor' WHERE placa = '$placa'");
        
        if(mysqli_affected_rows($conn)){
            $_SESSION['carro'] = "<p class='text-success text-center'><b>Carro " . $placa . " alterado com sucesso.</b></p>";          
        } else {
            $_SESSION['carro'] = "<p class='text-danger text-center'><b>Erro ao alterar carro " . $placa . ".</b></p>"; 
        }
        
        header("Location: carros.php");
        
    }
    
    public function getPlacas($conn){
        $query = mysqli_query($conn, "SELECT placa, modelo FROM carros");
        return $query;
    }
    
    public function apagarCarro($placa, $conn){;
        $delete = mysqli_query($conn, "DELETE FROM carros WHERE placa = '$placa'");
        if(mysqli_affected_rows($conn)){
            $_SESSION['carro'] = "<p class='text-success text-center'><b>Carro " . $placa . " deletado com sucesso.</b></p>";
            header("Location: carros.php");
        } else {
            echo "ERRO";
        }
        
    }
    
}
