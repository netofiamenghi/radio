<?php

require_once './autoload.php';

$mensagem = null;
$usuario = new Usuario();

if (isset($_POST['id'])) :

  $usuario->id = $_POST['id'];
  $usuario->nome  = $_POST['nome'];
  $usuario->email = $_POST['email'];
  $usuario->senha = $_POST['senha'];

  // cadastrar
  if ($usuario->id == null) :

    if ($usuario->inserir()) :
      $mensagem = "<div class='alert alert-success' role='alert'>Usuário inserido!</div>";
    else :
      $mensagem = "<div class='alert alert-danger' role='alert'>Erro ao inserir Usuário!</div>";
    endif;

  // alterar
  else :
    if ($usuario->alterar()) :
      $mensagem = "<div class='alert alert-success' role='alert'>Usuário alterado!</div>";
    else :
      $mensagem = "<div class='alert alert-danger' role='alert'>Erro ao alterar Usuário!</div>";
    endif;

  endif;

// carregar  
elseif (isset($_GET['id'])) :

  $usuario->id = $_GET['id'];
  $usuario->carregar();

endif;

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
    <h2 class="text-center">Cadastro de Usuários</h2>
    <form action="cad-usuario.php" method="POST">
      <div class="form-group">
        <label for="codigo">Código</label>
        <input type="text" class="form-control" id="id" name="id" value="<?= $usuario->id ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome Completo" value="<?= $usuario->nome ?>" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu E-mail" value="<?= $usuario->email ?>" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua Senha" value="<?= $usuario->senha ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
    <br>
    <?= $mensagem ?>
    <?php include_once './rodape.php'; ?>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>