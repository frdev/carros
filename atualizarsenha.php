<?php
    require_once 'seguranca.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favctc.ico">

    <title>Controle de custo</title>

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
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- BARRA DE NAVEGAÇÃO -->
    <?php
    require_once("menu.php");
    ?>
    <div class="container">
        <div class="">
            <h1 class="text-center">Alterando senha</h1>
            <form class="col-lg-offset-4 col-lg-4" method="post" action="alterarsenha.php">
                <div class="form-group">
                    <label for="senhaatual">Senha Atual</label>
                    <input type="password" class="form-control" id="senhaatual" name="senhaatual" required>
                </div>
                <div class="form-group">
                    <label for="novasenha">Nova Senha</label>
                    <input type="password" class="form-control" id="novasenha" name="novasenha" required>
                </div>
                <div class="form-group">
                    <label for="confnovasenha">Confirme Nova Senha</label>
                    <input type="password" class="form-control" id="confnovasenha" name="confnovasenha" required>
                </div>
                <button type="submit" class="btn btn-success btn-md">Alterar</button>
                <a href="painel.php" class="btn btn-default btn-md">Cancelar</a>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if(isset($_SESSION['alteracaosenha'])){
                            echo $_SESSION['alteracaosenha'];
                            unset($_SESSION['alteracaosenha']);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
      <div class="container-fluid">
        <span class="text-muted">Projeto - Controle de Custos - CTC - © 2017 - Todos os Direitos Reservados para Felipe Ristow - Desenvolvido por Felipe Ristow</span>
      </div>
    </footer>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

