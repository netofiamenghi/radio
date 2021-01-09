<?php

require_once './autoload.php';

$mensagem = null;

if (isset($_POST['email'])) :
    $usuario = new Usuario();
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    $usuario->logar();

    if ($usuario->id != null) :

        session_start();
        $_SESSION['usuario'] = true;
        $_SESSION['id'] = $usuario->id;
        $_SESSION['nome'] = $usuario->nome;
        header('Location: menu-principal.php');
    else :
        $mensagem = "<div class='alert alert-danger' role='alert'>E-mail e/ou senha incorretos!</div>";
    endif;
endif;

?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Rádio Cultura</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Login Form -->
            <form action="login.php" method="POST">
                <input type="email" id="email" class="fadeIn second" name="email" placeholder="E-mail" required>
                <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha" required>
                <input type="submit" class="fadeIn fourth" value="Entrar">
                <?= $mensagem ?>
            </form>
            <div id="formFooter">
                <a target="_blank" href="https://plugasi.com.br">Plugasi Tecnologia em Sistemas</a>
            </div>
        </div>
    </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>