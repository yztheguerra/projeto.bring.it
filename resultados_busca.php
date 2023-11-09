<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Busca</title>
    <style>
        * {
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .main {
            width: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.5)50%, rgba(0,0,0,0.5)50%), url(1.jpg);
            background-position: center;
            background-size: cover;
            height: 100vh;
            color: white;
        }

        .navbar {
            width: 1200px;
            height: 75px;
            margin: auto;
        }

        .icon {
            width: 200px;
            float: left;
            height: 70px;
        }

        .logo {
            color: #ff7200;
            font-size: 35px;
            font-family: Arial;
            padding-left: 20px;
            float: left;
            padding-top: 10px;
        }

        .menu {
            width: 400px;
            float: left;
            height: 70px;
        }

        ul {
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li {
            list-style: none;
            margin-left: 80px;
            margin-top: 25px;
            font-size: 15px;
        }

        ul li a {
            text-decoration: none;
            color: #fff;
            font-family: Arial;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        ul li a:hover {
            color: #ff7200;
        }

        h2 {
            text-align: center;
            color: #fff;
        }

        .result {
            text-align: center;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            color: #333;
            margin: 20px auto;
            width: 80%; 
        }

        .result p {
            color: #555;
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Bring.It</h2>
            </div>
            <div class="menu">
                <ul>
                <li><a href="index.html">INÍCIO</a></li>
                    <li><a href="sobre.html">SOBRE</a></li>
                    <li><a href="serviços.html">SERVIÇOS</a></li>
                    <li><a href="formulario.php">CADASTRO CLIENTES</a></li>
                    <li><a href="imovel.php">CADASTRO IMÓVEL</a></li>
                    <li><a href="busca.html">BUSCA</a></li>
                </ul>
            </div>
        </div>
    <h2>Resultados da Busca</h2>
    <?php
    include_once('config.php');

    if (isset($_POST['termo']) || isset($_POST['cidade']) || isset($_POST['bairro'])) {
        $termo = isset($_POST['termo']) ? $_POST['termo'] : '';
        $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';

        
        $conditions = [];

        if (!empty($termo)) {
            $conditions[] = "nome LIKE '%$termo%'";
        }
        if (!empty($cidade)) {
            $conditions[] = "cidade LIKE '%$cidade%'";
        }
        if (!empty($bairro)) {
            $conditions[] = "estado LIKE '%$bairro%'";
        }

        
        if (!empty($conditions)) {
            $query = "SELECT * FROM usuarios WHERE " . implode(" OR ", $conditions);
            $resultado = $conexao->query($query);

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    echo "Nome: " . $row["nome"] . "<br><br>";
                    echo "Email: " . $row["email"] . "<br><br>";
                    echo "Cidade: " . $row["cidade"] . "<br><br>";
                    echo "Bairro: " . $row["bairro"] . "<br><br>";
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            echo "Por favor, preencha pelo menos um campo para realizar a busca.";
        }
    }
?>
</body>
</html>