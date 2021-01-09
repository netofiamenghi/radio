<?php

session_start();

if (!isset($_SESSION['usuario'])) :
    header('Location: login.php');
endif;

?>

<div class="jumbotron">
    <h1 class="display-4">Rádio Cultura</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="menu-principal.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Página Inicial
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Inserir
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./cad-usuario.php">Usuário</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./cad-promocao.php">Promoção</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Listar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./usuarios.php">Usuário</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./menu-principal.php">Promoção</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./logout.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Sair
                </a>
            </li>
        </ul>
    </div>
</nav>