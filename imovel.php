<?php

    if(isset($_POST['submit']))  
    {

    include_once('config.php');
    
    $cod_imovel = $_POST['cod_imovel'];
    $quartos = $_POST['quartos'];
    $banheiros = $_POST['banheiros'];
    $area_construida = $_POST['area_construida'];
    $area_terreno = $_POST['area_terreno'];
    $endereco = $_POST['endereco'];
    $contato = $_POST['contato'];

    $result = mysqli_query($conexao, "INSERT INTO imoveis(cod_imovel,quartos,banheiros,area_construida,area_terreno,endereco,contato) 
    VALUES('$cod_imovel','$quartos','$banheiros','$area_construida','$area_terreno','$endereco','$contato')");
    
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
*{
    margin: 0;
    padding: 0;
}

.main{
    width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%, rgba(0,0,0,0.5)50%), url(1.jpg);
    background-position: center;
    background-size: cover;
    height: 100vh;
}
        body{
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
        }
        .box{
            position: relative;
            top: 45%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: white;
            background-color: rgba(0, 0, 0, 0.9);
            padding: 1%;
            border-radius: 15px;
            width: 80%;
            max-width: 500px;
        }
        fieldset{
            border: 3px solid #ff7200;
            padding: 10px;
        }
        legend{
            border: 1px solid #ff7200;
            padding: 10px;
            text-align: center;
            background-color: rgb(220, 90, 0);
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 1.5vw;
            width: 100%;
            letter-spacing: 0.2vw;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #ff7200;
        }
#data_nasc{
    border: none;
    padding: 8px;
    border-radius: 10px;
    outline: none;
    font-size: 15px;
}
#submit{
    background-image: linear-gradient(to right, rgb(255, 114, 0), rgb(225, 180, 90));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    border-radius: 10px;
    cursor: pointer;
}
#submit:hover{
    background-image: linear-gradient(to right, rgb(220, 90, 0), rgb(215, 165, 75));
}
.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width: 200px;
    float: left;
    height: 70px;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
}

.menu{
    width: 400px;
    float: left;
    height: 70px;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 80px;
    margin-top: 25px;
    font-size: 15px;
}

ul li a{
    text-decoration: none;
    color: #fff;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
    color: #ff7200;
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
    <div class="box">
    <form action="imovel.php" method="post">
        <fieldset>
                <legend><b>Cadastro de Imóveis</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="cod_imovel" id="cod_imovel" class="inputUser" required>
                    <label for="cod_imovel" class="labelInput">Cód. do Imóvel</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="quartos" id="quartos" class="inputUser" required>
                    <label for="quartos" class="labelInput">Quartos</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="banheiros" id="banheiros" class="inputUser" required>
                    <label for="banheiros" class="labelInput">Banheiros</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="area_construida" id="area_construida" class="inputUser" required>
                    <label for="area_construida" class="labelInput">Área Construída</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="area_terreno" id="area_terreno" class="inputUser" required>
                    <label for="area_terreno" class="labelInput">Área Terreno</label>
                </div>
                <br><br>
                <div class="inputBox">
                <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="contato" id="contato" class="inputUser" required>
                    <label for="contato" class="labelInput">Contato</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>