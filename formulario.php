<?php

    if(isset($_POST['submit']))  
    {

    include_once('config.php');
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $imovel = $_POST['imovel'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,imovel,cidade,bairro,estado,endereco) 
    VALUES('$nome','$email','$telefone','$imovel','$cidade','$bairro','$estado','$endereco')");
    
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
            border-radius: 10px;
            width: 60%;
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
    <form action="formulario.php" method="post">
        <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome do Cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Tipo de imóvel</p>
                <br>
                <input type="radio" id="Casa" name="imovel" value="casa" required>
                <label for="casa">Casa</label>
                <br>
                <input type="radio" id="apartamento" name="imovel" value="apartamento" required>
                <label for="apartamento">Apartamento</label>
                <br>
                <input type="radio" id="outros" name="imovel" value="outros" required>
                <label for="outros">Outros</label>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>