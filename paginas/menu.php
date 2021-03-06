<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location:/gerenciador/paginas/login');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerenciador financeiro</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="/gerenciador/css/app.css" rel="stylesheet">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Gerenciador</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/gerenciador">Painel de controle <span class="sr-only">(current)</span></a></li>
                        <li><a href="/gerenciador/paginas/lancamentos/index.php">Lançamentos</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/gerenciador/paginas/caixa/index.php">Contas/Caixas</a></li>
                                <li><a href="/gerenciador/paginas/categoria/index.php">Categorias</a></li>
                                <li><a href="/gerenciador/paginas/usuario/index.php">Usuários</a></li>

                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']['nome']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/gerenciador/paginas/login/senha.php">Trocar Senha</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/gerenciador/paginas/login/sair.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
