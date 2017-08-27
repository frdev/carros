<?php

require_once 'classes/Conexao.php';
require_once 'classes/Usuario.php';
require_once 'classes/Login.php';

class UsuarioDAO {
    //put your code here

    public function inserirUsuario($usuario, $conn){ 
        if($conn){
            
            $email = $usuario->getEmail();
            $acesso = $usuario->getAcesso();
            $user = $usuario->getUsuario();
            $senha = md5($usuario->getSenha());
            if($this->validarUsuarioExistente($user, $conn) == 'ok'){
                $query = mysqli_query($conn, "INSERT INTO usuarios (level, email, usuario, senha, status, criado) VALUES ('$acesso', '$email', '$user', '$senha', 'Ativo', NOW())");
                if(!mysqli_errno($conn)){
                    $_SESSION['usuario'] = "<p class='text-success text-center'><b>Usuário " . $user . " criado com sucesso.</b></p>";
                    header("Location: usuarios.php");
                } else {
                    echo "Erro: " . mysqli_error($conn);
                }
            } else {
                $_SESSION['usuario'] = "<p class='text-danger text-center'><b>Usuário " . $user . " já existente.</b></p>";
                header("Location: usuarios.php");
            }
        } else {
            echo "Erro: " . mysqli_error($conn);
        }
    }
    
    public function getSelectLogin($user, $senha, $conn){
        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$user' AND senha = '$senha' AND status = 'Ativo'");
        $usuario = mysqli_num_rows($query);
        print_r($usuario);
        if($usuario == 1){
            $usuario = mysqli_fetch_array($query);
            $login = new Login();
            $login->setId($usuario['id']);
            $login->setUsuario($usuario['usuario']);
            $login->setAcesso($usuario['level']);
            $login->setStatus($usuario['status']);
            return $login;
        } else {
            $_SESSION['login'] = "<p class='text-center text-danger'><b>Usuário ou senha incorretos.</b></p>";
            return 'erro';
        }
    }
    
    public function getSelect($conn){
        $query = mysqli_query($conn, "SELECT * FROM usuarios");
        $rows = mysqli_num_rows($query);
        echo "<table class='table table-bordered text-center'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td><b>Usuário</b></td>";
        echo "<td><b>Email</b></td>";
        echo "<td><b>Acesso</b></td>";
        echo "<td><b>Criado</b></td>";
        echo "<td><b>Modificado</b></td>";
        echo "<td><b>Status</b></td>";
        echo "<td><b>Editar</b></td>";
        echo "<td><b>Apagar</b></td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($rows = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>" . $rows['usuario'] . "</td>";
            echo "<td>" . $rows['email'] . "</td>";
            $level = $rows['level'];
            //echo "<td>" . $rows['level'] . "</td>";
            $acesso = mysqli_query($conn, "SELECT * FROM nivel_acesso WHERE id = $level");
            $linha = mysqli_num_rows($acesso);
            while($linha = mysqli_fetch_array($acesso)){
                echo "<td>" . $linha['nivel'] . "</td>";
            }
            echo "<td>" . $rows['criado'] . "</td>";
            echo "<td>" . $rows['modificado'] . "</td>";
            if($rows['status'] == 'Ativo'){
                echo "<td> <a class='btn btn-sm btn-success' href='statususuario.php?id=" . $rows['id'] . "'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i></a>";
            } else {
                echo "<td> <a class='btn btn-sm btn-danger' href='statususuario.php?id=" . $rows['id'] . "'><i class='fa fa-thumbs-o-down' aria-hidden='true'></i></a>";
            }
            echo "<td> <class='btn btn-sm btn-";
            echo "<td> <a class='btn btn-sm btn-warning' href='editarusuario.php?id=" . $rows['id'] . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
            echo "<td> <a class='btn btn-sm btn-danger' href='apagarusuario.php?id=" . $rows['id'] . "'><i class='fa fa-times' aria-hidden='true'></i></a>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    public function validarUsuarioExistente($usuario, $conn){
        $query = mysqli_query($conn, "SELECT usuario FROM usuarios WHERE usuario ='$usuario'");
        $user = mysqli_num_rows($query);
        if($user == 0){
            return 'ok';
        } else {
            return 'erro';
        }
    }
    
    public function alterarUsuario($usuario, $conn){
        $id = $usuario->getId();
        $user = $usuario->getUsuario();
        $email = $usuario->getEmail();
        $testesenha = md5($usuario->getSenha());
        $senha = $usuario->getSenha();
        $acesso = $usuario->getAcesso();
        $status = $usuario->getStatus();
        
        $u = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
        $linha = mysqli_fetch_array($u);
        if($linha['senha'] == $testesenha){
            $query = mysqli_query($conn, "UPDATE usuarios SET usuario = '$user', email = '$email', level = '$acesso', status = '$status', modificado = NOW() WHERE id = $id");
        } else {
            $senha = md5($senha);
            $query = mysqli_query($conn, "UPDATE usuarios SET usuario = '$user', email = '$email', level = '$acesso', status = '$status', modificado = NOW(), senha = '$senha' WHERE id = $id");
        }
        
        if(mysqli_affected_rows($conn)){
            $_SESSION['usuario'] = "<p class='text-success text-center'><b>Usuário " . $user . " alterado com sucesso.</b></p>";          
        } else {
            $_SESSION['usuario'] = "<p class='text-danger text-center'><b>Erro ao alterar usuário " . $user . ".</b></p>"; 
        }
        
        header("Location: usuarios.php");
        
    }
    
    public function getObjUsuario($id, $conn){
        $u = new Usuario();
        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
        $user = mysqli_num_rows($query);
        while($user = mysqli_fetch_array($query)){
            $u->setId($user['id']);
            $u->setAcesso($user['level']);
            $u->setEmail($user['email']);
            $u->setUsuario($user['usuario']);
            $u->setSenha($user['senha']);
            $u->setStatus($user['status']);
        }
        return $u;
    }
    
    public function apagarUsuario($id, $conn){
        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
        $linha = mysqli_num_rows($query);
        while($linha = mysqli_fetch_array($query)){
            $nome = $linha['usuario'];
        }
        $delete = mysqli_query($conn, "DELETE FROM usuarios WHERE id = $id");
        $_SESSION['usuario'] = "<p class='text-success text-center'><b>Usuário " . $nome . " deletado com sucesso.</b></p>";
        header("Location: usuarios.php");
    }
    
    public function alterarStatusUsuario($id, $conn){
        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
        $linha = mysqli_num_rows($query);
        while($linha = mysqli_fetch_array($query)){
            $user = $linha['usuario'];
            $status = $linha['status'];
        }
        if($status == 'Inativo'){
            $update = mysqli_query($conn, "UPDATE usuarios SET status = 'Ativo', modificado = NOW() WHERE id = $id");
        } else {
            $update = mysqli_query($conn, "UPDATE usuarios SET status = 'Inativo', modificado = NOW() WHERE id = $id");
        }
        if(mysqli_affected_rows($conn)){
            $_SESSION['usuario'] = "<p class='text-success text-center'><b>Usuário " . $user . " alterado.</b></p>";
            header("Location: usuarios.php");
        } else {
            $_SESSION['usuario'] = "<p class='text-danger text-center'><b>Usuário " . $user . " não alterado.</b></p>";
            header("Location: usuarios.php");
        }
    }
    
    public function alterarSenhaUsuario($id, $atual, $nova, $conn){
        $atual = md5($atual);
        $nova = md5($nova);
        $query = mysqli_query($conn, "UPDATE usuarios SET senha = '$nova' WHERE id = $id AND senha = '$atual'");
        if(mysqli_affected_rows($conn)){
            $_SESSION['alteracaosenha'] = "<p class='text-center text-success'><b>Senha alterada.</b></p>";
            header("Location: atualizarsenha.php");
        } else {
            $_SESSION['alteracaosenha'] = "<p class='text-center text-danger'><b>Senha atual incorreta.</b></p>";
            header("Location: atualizarsenha.php");
        }
    }
    
}
