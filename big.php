<html>
<head>
  <title>Filtro de dados</title>
</head>
<body>
  <h1>Filtro de dados</h1>

  <form action="index.php" method="post">
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="cidade" placeholder="Cidade">
    <input type="text" name="bairro" placeholder="Bairro">
    <input type="submit" value="Filtrar">
  </form>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome = $_POST['nome'];
      $cidade = $_POST['cidade'];
      $bairro = $_POST['bairro'];

      // Filtra os dados do banco de dados
      $dados = filtrar($nome, $cidade, $bairro);

      // Mostra o total de cadastros por nome
      echo '<h2>Total de cadastros por nome</h2>';
      echo '<ul>';
      foreach ($total as $nome => $quantidade) {
        echo '<li>Existem ' . $quantidade . ' cadastros com o nome "' . $nome . '"</li>';
      }
      echo '</ul>';
    }
  ?>
</body>
</html>