<?php

require_once './autoload.php';

$mensagem = null;
$promocao = new Promocao();

if (isset($_POST['id'])) :

  $promocao->id = $_POST['id'];
  $promocao->dataInicio  = $_POST['dataInicio'];
  $promocao->dataFim = $_POST['dataFim'];
  $promocao->descricao = $_POST['descricao'];

  // cadastrar
  if ($promocao->id == null) :

    if ($promocao->inserir()) :
      $mensagem = "<div class='alert alert-success' role='alert'>Promoção inserida!</div>";
    else :
      $mensagem = "<div class='alert alert-danger' role='alert'>Erro ao inserir Promoção!</div>";
    endif;

  // alterar
  else :
    if ($promocao->alterar()) :
      $mensagem = "<div class='alert alert-success' role='alert'>Promoção alterada!</div>";
    else :
      $mensagem = "<div class='alert alert-danger' role='alert'>Erro ao alterar Promoção!</div>";
    endif;

  endif;

// carregar  
elseif (isset($_GET['id'])) :

  $promocao->id = $_GET['id'];
  $promocao->carregar();

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
    <h2 class="text-center">Cadastro de Promoção</h2>
    <form action="cad-promocao.php" method="POST">
      <div class="form-group">
        <label for="codigo">Código</label>
        <input type="text" class="form-control" id="id" name="id" value="<?= $promocao->id ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nome">Data de Início</label>
        <input type="date" class="form-control" id="dataInicio" name="dataInicio" placeholder="Digite a data de início" value="<?= $promocao->dataInicio ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Data de Término</label>
        <input type="date" class="form-control" id="dataFim" name="dataFim" placeholder="Digite a data de término" value="<?= $promocao->dataFim ?>" required>
      </div>
      <div class="form-group">
        <label for="senha">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição" value="<?= $promocao->descricao ?>" required>
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