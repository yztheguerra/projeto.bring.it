<?php
include_once('config.php');

if (isset($_POST['termo']) || isset($_POST['cidade']) || isset($_POST['cod_imovel'])) {
    $termo = isset($_POST['termo']) ? $_POST['termo'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $bairro = isset($_POST['cod_imovel']) ? $_POST['cod_imovel'] : '';

    $query = "SELECT * FROM usuarios WHERE 1 = 1";

    if (!empty($termo)) {
        $query .= " AND nome LIKE '%$termo%'";
    }
    if (!empty($cidade)) {
        $query .= " AND cidade LIKE '%$cidade%'";
    }

    $query = "SELECT * FROM imoveis WHERE 1 = 1";
    if (!empty($cod_imovel)) {
        $query .= " AND cod_imovel LIKE '%$cod_imovel%'";
    }

    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "Nome: " . $row["nome"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Cidade: " . $row["cidade"] . "<br>";
            echo "cod_imovel: " . $row["cod_imovel"] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>