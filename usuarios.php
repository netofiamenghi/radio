<?php

require_once './autoload.php';

$mensagem = null;
$usuario = new Usuario();

if (isset($_GET['id'])) :

    $usuario->id = $_GET['id'];

    if ($usuario->excluir()) :
        $mensagem = "<div class='alert alert-success' role='alert'>Usuário excluído!</div>";
    else :
        $mensagem = "<div class='alert alert-danger' role='alert'>Erro ao excluir Usuário!</div>";
    endif;

endif;

$lista = $usuario->listar();

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
        <h2 class="text-center">Usuários</h2>
        <div class="row">
            <?= $mensagem ?>
        </div>
        <div class="row justify-content-center">
            <table class="table table-sm col-lg-10">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linha) : ?>
                        <tr>
                            <td><?= $linha['id'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td><?= $linha['email'] ?></td>
                            <td><?= $linha['status'] == 0 ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="cad-usuario.php?id=<?= $linha['id'] ?>" role="button"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="usuarios.php?excluir=sim&id=<?= $linha['id'] ?>" role="button"><i class="fas fa-trash-alt"></i></a>
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