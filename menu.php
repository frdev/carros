    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expannded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Controle de Custo</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if($_SESSION['acessousuario'] == 1) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="usuarios.php">Usuários</a></li>
                            <li><a href="carros.php">Carros</a></li>
                            <li><a href="projetos.php">Projetos</a></li>
                        </ul>
                    </li>
                    <li><a href="gerarrelatorio.php">Relatório</a></li>
                    <?php } ?>
                    <li><a href="utilizacaocarros.php">Utilização dos Carros</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['nomeusuario']; ?></a></li>
                    <li><a href="atualizarsenha.php"><i class="fa fa-address-book-o" aria-hidden="true"></i> Alterar senha</a></li>
                    <li><a href="logout.php"><i class="fa fa-times" aria-hidden="true"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>