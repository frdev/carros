<!DOCTYPE html>

<?php
    require_once 'seguranca.php';
    require_once 'classes/Conexao.php';
    require_once 'dao/AluguelDAO.php';
    require_once 'dao/CarroDAO.php';
    require_once 'dao/ProjetoDAO.php';
    
    $conn = new Conexao();
    $carrodao = new CarroDAO();
    $projetodao = new ProjetoDAO();
    
    $placas = $carrodao->getPlacas($conn->Conectar());
    $projetos = $projetodao->getProjetos($conn->Conectar());
    
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
            <h1 class="text-center">Utilização dos Carros</h1>
            <hr>
            <form action="alugar.php" method="post">
                <h3><b>Alugar Carro</b></h3>
                <div class="row">
                <div class="form-group col-lg-3">
                <label for="carro">Carro</label>
                <select class="form-control" id="carro" name="carro">
                    <option value=""></option>
                    <?php
                          $lp = mysqli_num_rows($query);
                          while($lp = mysqli_fetch_array($placas)){
                              echo "<option value='" . $lp['placa'] . "'>" . $lp['placa'] . " - " . $lp['modelo'] . "</option>";
                          }
                    ?>
                </select>
                </div>
                <div class="form-group col-lg-5">
                <label for="projeto">Projeto</label>
                <select class="form-control" id="projeto" name="projeto">
                    <option value=""></option>
                    <?php
                          $lprj = mysqli_num_rows($query);
                          while($lprj = mysqli_fetch_array($projetos)){
                              echo "<option value='" . $lprj['id'] . "'>" . $lprj['nome'] . "</option>";
                          }
                    ?>
                </select>
                </div>
                <div class="form-group col-lg-4">
                <label for="dthr">Data e hora</label>
                <input type="datetime-local" class="form-control" id="dthr" name="dthr" required />
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label for="origem">Origem</label>
                        <input type="text" class="form-control" id="origem" name="origem" required />
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="destino">Destino</label>
                        <input type="text" class="form-control" id="destino" name="destino" required />
                    </div>
                    <div class="form-group col-lg-2 pull-right" style="margin-top: 25px;">
                        <input type="submit" class="btn btn-success btn-sm" value="Alugar" />
                        <a href="utilizacaocarros.php" class="btn btn-default btn-sm">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <?php
            if(isset($_SESSION['aluguel'])){
                echo $_SESSION['aluguel'];
                unset($_SESSION['aluguel']);
            }
        ?>
        <br>
        <?php
            $alugueldao = new AluguelDAO();
            $alugueldao->getSelect($conn->Conectar());
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


