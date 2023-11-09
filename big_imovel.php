<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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

// Execute a consulta SQL para obter os dados
$sql = "SELECT * FROM imoveis";
$resultado = mysqli_query($conexao, $sql);

// Verifique se a consulta foi bem-sucedida
if (!$resultado) {
    die("Não foi possível executar a consulta: " . mysqli_error($conexao));
}

// Obtenha os dados da consulta
$dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// Feche a conexão com o banco de dados
mysqli_close($conexao);

// Inicialize contadores
$codImovelCount = array();
$quartosCount = array();
$banheirosCount = array();
$areaConstruidaCount = array();
$areaTerrenoCount = array();
$enderecoCount = array();
$contatoCount = array();

foreach ($dados as $imovel) {
    // Contagem de 'Cód. do Imóvel'
    $codImovel = $imovel['cod_imovel'];
    if (isset($codImovelCount[$codImovel])) {
        $codImovelCount[$codImovel]++;
    } else {
        $codImovelCount[$codImovel] = 1;
    }

    // Contagem de 'Quartos'
    $quartos = $imovel['quartos'];
    if (isset($quartosCount[$quartos])) {
        $quartosCount[$quartos]++;
    } else {
        $quartosCount[$quartos] = 1;
    }

    // Contagem de 'Banheiros'
    $banheiros = $imovel['banheiros'];
    if (isset($banheirosCount[$banheiros])) {
        $banheirosCount[$banheiros]++;
    } else {
        $banheirosCount[$banheiros] = 1;
    }

    // Contagem de 'Área Construída'
    $areaConstruida = $imovel['area_construida'];
    if (isset($areaConstruidaCount[$areaConstruida])) {
        $areaConstruidaCount[$areaConstruida]++;
    } else {
        $areaConstruidaCount[$areaConstruida] = 1;
    }

    // Contagem de 'Área Terreno'
    $areaTerreno = $imovel['area_terreno'];
    if (isset($areaTerrenoCount[$areaTerreno])) {
        $areaTerrenoCount[$areaTerreno]++;
    } else {
        $areaTerrenoCount[$areaTerreno] = 1;
    }

    // Contagem de 'Endereço'
    $endereco = $imovel['endereco'];
    if (isset($enderecoCount[$endereco])) {
        $enderecoCount[$endereco]++;
    } else {
        $enderecoCount[$endereco] = 1;
    }

    // Contagem de 'Contato'
    $contato = $imovel['contato'];
    if (isset($contatoCount[$contato])) {
        $contatoCount[$contato]++;
    } else {
        $contatoCount[$contato] = 1;
    }
}

// Função para exibir os resultados em uma tabela
function exibirResultados($titulo, $dadosCount) {
    echo "<h2>$titulo:</h2>";
    echo "<table>";
    echo "<tr><th>$titulo</th><th>Quantidade</th></tr>";
    foreach ($dadosCount as $item => $quantidade) {
        echo "<tr><td>$item</td><td>$quantidade</td></tr>";
    }
    echo "</table>";
}

// Exibir os resultados para cada categoria
exibirResultados('Cód. do Imóvel', $codImovelCount);
exibirResultados('Quartos', $quartosCount);
exibirResultados('Banheiros', $banheirosCount);
exibirResultados('Área Construída', $areaConstruidaCount);
exibirResultados('Área Terreno', $areaTerrenoCount);
exibirResultados('Endereço', $enderecoCount);
exibirResultados('Contato', $contatoCount);

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
echo "        labels: ['Cód. do Imóvel', 'Quartos', 'Banheiros', 'Área Construída', 'Área Terreno', 'Endereço', 'Contato'],";
echo "        datasets: [{";
echo "            label: 'Quantidade',";
echo "            data: [" . count($codImovelCount) . ", " . count($quartosCount) . ", " . count($banheirosCount) . ", " . count($areaConstruidaCount) . ", " . count($areaTerrenoCount) . ", " . count($enderecoCount) . ", " . count($contatoCount) . "],";
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
