<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
        }
        #barChart {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php

// Conecte-se ao banco de dados
$conexao = mysqli_connect("localhost", "root", "", "formulario");

// Verifique se a conexão foi bem-sucedida
if (!$conexao) {
    die("Não foi possível conectar ao banco de dados: " . mysqli_connect_error());
}

// Crie um array para armazenar os dados do formulário
$filtros = array();

// Obtenha os dados do formulário
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$cidade = isset($_POST["cidade"]) ? $_POST["cidade"] : "";
$bairro = isset($_POST["bairro"]) ? $_POST["bairro"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";

// Adicione os dados do formulário ao array
$filtros["nome"] = $nome;
$filtros["cidade"] = $cidade;
$filtros["bairro"] = $bairro;
$filtros["email"] = $email;
$filtros["telefone"] = $telefone;


// Crie a consulta SQL
$sql = "SELECT * FROM usuarios WHERE";

// Adicione os filtros à consulta SQL
foreach ($filtros as $campo => $valor) {
    if ($valor != "") {
        $sql .= " $campo = '$valor' AND";
    }
}

// Remova o último "AND" da consulta SQL
$sql = substr($sql, 0, -4);

// Execute a consulta SQL
$resultado = mysqli_query($conexao, $sql);

// Verifique se a consulta foi bem-sucedida
if (!$resultado) {
    die("Não foi possível executar a consulta: " . mysqli_error($conexao));
}

// Obtenha os dados da consulta
$dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Feche a conexão com o banco de dados
mysqli_close($conexao);

// Contagem de categorias
$cidadesCount = array();
$nomesCount = array();
$bairrosCount = array();
$emailsCount = array();
$telefonesCount = array();

foreach ($dados as $linha) {
    // Contagem de 'cidades'
    $cidade = $linha['cidade'];
    if (isset($cidadesCount[$cidade])) {
        $cidadesCount[$cidade]++;
    } else {
        $cidadesCount[$cidade] = 1;
    }

    // Contagem de 'nomes'
    $nome = $linha['nome'];
    if (isset($nomesCount[$nome])) {
        $nomesCount[$nome]++;
    } else {
        $nomesCount[$nome] = 1;
    }

    // Contagem de 'bairros'
    $bairro = $linha['bairro'];
    if (isset($bairrosCount[$bairro])) {
        $bairrosCount[$bairro]++;
    } else {
        $bairrosCount[$bairro] = 1;
    }

    // Contagem de 'e-mails'
    $email = $linha['email'];
    if (isset($emailsCount[$email])) {
        $emailsCount[$email]++;
    } else {
        $emailsCount[$email] = 1;
    }

    // Contagem de 'telefones'
    $telefone = $linha['telefone'];
    if (isset($telefonesCount[$telefone])) {
        $telefonesCount[$telefone]++;
    } else {
        $telefonesCount[$telefone] = 1;
    }
}

// Exiba os dados em uma tabela
echo "<h2>Cidades:</h2>";
echo "<table>";
echo "<tr><th>Cidade</th><th>Quantidade</th></tr>";
foreach ($cidadesCount as $cidade => $quantidade) {
    echo "<tr><td>$cidade</td><td>$quantidade</td></tr>";
}
echo "</table>";

echo "<h2>Nomes:</h2>";
echo "<table>";
echo "<tr><th>Nome</th><th>Quantidade</th></tr>";
foreach ($nomesCount as $nome => $quantidade) {
    echo "<tr><td>$nome</td><td>$quantidade</td></tr>";
}
echo "</table>";

echo "<h2>Bairros:</h2>";
echo "<table>";
echo "<tr><th>Bairro</th><th>Quantidade</th></tr>";
foreach ($bairrosCount as $bairro => $quantidade) {
    echo "<tr><td>$bairro</td><td>$quantidade</td></tr>";
}
echo "</table>";

echo "<h2>E-mails:</h2>";
echo "<table>";
echo "<tr><th>E-mail</th><th>Quantidade</th></tr>";
foreach ($emailsCount as $email => $quantidade) {
    echo "<tr><td>$email</td><td>$quantidade</td></tr>";
}
echo "</table>";

echo "<h2>Telefones:</h2>";
echo "<table>";
echo "<tr><th>Telefone</th><th>Quantidade</th></tr>";
foreach ($telefonesCount as $telefone => $quantidade) {
    echo "<tr><td>$telefone</td><td>$quantidade</td></tr>";
}
echo "</table>";

// Gráfico de barras
echo "<h2>Gráfico de Barras:</h2>";
echo "<div style='width: 500px;'>";
echo "<canvas id='barChart'></canvas>";
echo "</div>";

// JavaScript para criar o gráfico de barras
echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
echo "<script>";
echo "var ctx = document.getElementById('barChart').getContext('2d');";
echo "var myChart = new Chart(ctx, {";
echo "    type: 'bar',";
echo "    data: {";
echo "        labels: ['Cidades', 'Nomes', 'Bairros', 'E-mails', 'Telefones'],";
echo "        datasets: [{";
echo "            label: 'Quantidade',";
echo "            data: [" . count($cidadesCount) . ", " . count($nomesCount) . ", " . count($bairrosCount) . ", " . count($emailsCount) . ", " . count($telefonesCount) . "],";
echo "            backgroundColor: 'rgba(75, 192, 192, 0.2)',";
echo "            borderColor: 'rgba(75, 192, 192, 1)',";
echo "            borderWidth: 1";
echo "        }]";
echo "    },";
echo "    options: {";
echo "        scales: {";
echo "            y: {";
echo "                beginAtZero: true";
echo "            }";
echo "        }";
echo "    }";
echo "});";
echo "</script>";
?>

</body>
</html>
