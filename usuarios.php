<!DOCTYPE html>

<?php
    require_once 'seguranca.php';
    require_once 'validaadmin.php';
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favctc.ico">

    <title>Controle de Custo - CTC</title>

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>
      <!-- BARRA DE NAVEGAÇÃO -->
      <?php
      require_once("menu.php");
      ?>
      <div class="container">
        <div class="row">
            <h1 class="text-center">Usuários</h1>
            <hr>
            <form action="cadastrarusuario.php" method="post">
                <div class="form-group col-lg-2">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="txtusuario" name="usuario" required />
                </div>
                <div class="form-group col-lg-2">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="txtsenha" name="senha" required />
                </div>
                <div class="form-group col-lg-2">
                <label for="acesso">Acesso</label>
                <select class="form-control" id="txtacesso" name="acesso" required>
                    <option value=""></option>
                    <option value="1">Administrador</option>
                    <option value="2">Comum</option>
                </select>
                </div>
                <div class="form-group col-lg-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="txtemail" name="email" required />
                </div>
                <div class="form-group col-lg-3 pull-right" style="margin-top: 25px;">
                    <input type="submit" class="btn btn-success btn-sm" value="Cadastrar" />
                    <a href="usuarios.php" class="btn btn-default btn-sm">Voltar</a>
                </div>
            </form>
        </div>
          <hr>
        <?php
            if(isset($_SESSION['usuario'])){
                echo $_SESSION['usuario'];
                unset($_SESSION['usuario']);
            }
        ?>
          <br>
        <?php
        require_once 'classes/Conexao.php';
        require_once 'dao/UsuarioDAO.php';
        $conn = new Conexao();
        $usuariodao = new UsuarioDAO();
        $usuariodao->getSelect($conn->Conectar());
        ?>
      </div>
      <br>
      <br>
    <footer class="footer">
      <div class="container-fluid">
        <span class="text-muted">Projeto - Controle de Custos - CTC - © 2017 - Todos os Direitos Reservados para Felipe Ristow - Desenvolvido por Felipe Ristow</span>
      </div>
    </footer>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
