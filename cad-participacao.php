<?php
require_once './autoload.php';

if (isset($_POST['palavra1'])) :
    $participacao = new Participacao();
    $participacao->palavra1 = $_POST['palavra1'];
    $participacao->palavra2 = $_POST['palavra2'];
    $participacao->data = date('Y-m-d');

    $lista = $participacao->verificarPalavras();

    if(!empty($lista)):
        header('Location: cad-participacao.php');
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
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Rádio Cultura</h1>
            <hr class="my-4">
            <p>Para participar, fique na Cultura e anote as palavras-chave do dia,
                quando acumular duas ou mais palavras-chave, preencha o formulário abaixo para gerar um cupom.
                <br>Quanto mais cupons você acumular, mais chances tem de levar o prêmio!</p>
        </div>
        <form action="index.php" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right" for="palavra1">Palavra-chave 1</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="palavra1" name="palavra1" placeholder="Digite a palavra-chave">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right" for="palavra2">Palavra-chave 2</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="palavra2" name="palavra2" placeholder="Digite a palavra-chave">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right" for="palavra2"></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="palavra2" name="palavra2" placeholder="Digite a palavra-chave">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right" for="palavra2">Palavra-chave 2</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="palavra2" name="palavra2" placeholder="Digite a palavra-chave">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right" for="palavra2">Palavra-chave 2</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="palavra2" name="palavra2" placeholder="Digite a palavra-chave">
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-8">Participar</button>
            </div>
        </form>
        <br>
        <footer class="page-footer font-small blue">
            <div class="footer-copyright text-center py-3">
                <a target="_blank" href="https://plugasi.com.br">Plugasi Tecnologia em Sistemas</a>
            </div>
        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>