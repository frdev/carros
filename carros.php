<!DOCTYPE html>

<?php
    require_once 'seguranca.php';
    require_once 'validaadmin.php';
    require_once 'classes/Conexao.php';
    require_once 'dao/CarroDAO.php';
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
            <h1 class="text-center">Carros</h1>
            <hr>
            <form action="cadastrarcarro.php" method="post">
                <div class="form-group col-lg-2">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="txtplaca" name="placa" required />
                </div>
                <div class="form-group col-lg-4">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="txtmodelo" name="modelo" required />
                </div>
                <div class="form-group col-lg-3">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="txtcor" name="cor" required />
                </div>
                <div class="form-group col-lg-3 pull-right" style="margin-top: 25px;">
                    <input type="submit" class="btn btn-success btn-sm" value="Cadastrar" />
                    <a href="carros.php" class="btn btn-default btn-sm">Voltar</a>
                </div>
            </form>
            
        </div>
          <hr>
        <?php
            if(isset($_SESSION['carro'])){
                echo $_SESSION['carro'];
                unset($_SESSION['carro']);
            }
        ?>
          <br>
        <?php
        $conn = new Conexao();
        $carrodao = new CarroDAO();
        $carrodao->getSelect($conn->Conectar());
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


