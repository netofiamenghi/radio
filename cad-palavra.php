<?php

require_once './autoload.php';

$mensagem = null;
$palavra = new Palavra();
$promocao = new Promocao();

if (isset($_GET['excluir'])) :
    $palavra->id = $_GET['id'];
    $palavra->excluir();
endif;

if (isset($_GET['promocao'])) :
    $palavra->idPromocao = $_GET['promocao'];
    $promocao->id = $_GET['promocao'];
    $promocao->carregar();
endif;

if (isset($_POST['id'])) :

    $palavra->id = $_POST['id'];
    $palavra->descricao  = $_POST['descricao'];
    $palavra->idPromocao = $_POST['promocao'];

    $promocao->id = $_POST['promocao'];
    $promocao->carregar();

    // cadastrar
    if ($palavra->id == null) :

        if ($palavra->inserir()) :
            $mensagem = "<div class='alert alert-success' role='alert'>Palavra inserida!</div>";
        else :
            $mensagem = "<div class='alert alert-danger' role='alert'>Erro ao inserir Palavra!</div>";
        endif;

    endif;

endif;

$lista = $palavra->listar();

?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilo.css">
</head>

<body>
    <div class="container">
        <?php include_once './cabecalho.php'; ?>
        <br>

        <!-- Promoção -->
        <div class="row justify-content-center">
            <h5>Promoção Nº <?= $promocao->id ?> - <?= date('d/m/Y', strtotime($promocao->dataInicio)) ?> à
                <?= date('d/m/Y', strtotime($promocao->dataFim)) ?></h5>
        </div>
        <br>
        <div class="row justify-content-center">
            <!-- Cadastro de Palavra -->
            <form action="cad-palavra.php" method="POST">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $palavra->id ?>" readonly>
                <input type="hidden" class="form-control" id="promocao" name="promocao" value="<?= $promocao->id ?>" readonly>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Palavra-chave" value="<?= $palavra->descricao ?>" required>
                    </div>
                    <button type="submit" class="col-sm-2 btn btn-success" value="Inserir" ><i class="fas fa-plus"></i></button>
                </div>
            </form>
        </div>
        <br>
        <!-- Lista de Palavras cadastradas -->
        <div class="row justify-content-center">
            <table class="table table-sm table-striped col-lg-4 text-center">
                <thead>
                    <tr>
                        <th scope="col">Palavras-chave cadastradas</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linha) : ?>
                        <tr>
                            <td><?= $linha['descricao'] ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="cad-palavra.php?excluir=sim&id=<?= $linha['id'] ?>&promocao=<?= $linha['id_promocao'] ?>" role="button"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php include_once './rodape.php'; ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/44f5bae32e.js" crossorigin="anonymous"></script>
</body>

</html>