<?php
    if(isset($_POST['botao'])){
        //print_r($_POST['usuario']);
        //print_r("<br>");
        //print_r($_POST['senha']);
        include_once('conexao.php');
        $usuario=$_POST['usuario'] ;
        $senha= $_POST['senha'];
        $csenha=$_POST['csenha'];
        $stmt = $pdo->prepare("INSERT INTO tbUsuario(usuario, senha) values ('$usuario', '$senha')");	
        $stmt->execute();

        if ($senha == $csenha){
        header('Location:index.php');
        }
        else{
        header('Location:cadastroUsuario.php');
        }
    }
?>

<head>
    <title>Tela de cadastro</title>
    <style>
        body{
            font-family: Arial, Helvetica;
            background-image: linear-gradient(45deg, rgb(193, 147, 245), rgb(61, 6, 124));
        }
        section{
            background-color: rgba(0,0,0,0.8);
            position: absolute;
            margin-top: 10%;
            margin-left: 37%;
            padding: 50px;
            border-radius: 15px;
            color: white;
        }
        input{
            padding: 15px;
            border: none;
            border-radius: 10px;
            outline: none;
            margin-top: 10px;
            font-size:15px;
        }
        .botao{
            background-color:dodgerblue;
            border:none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
            color: white;
        }
        .botao:hover{
            background-color: rgb(61, 6, 124);
        }
    </style>
</head>
<body>
<div>
    <a href="inicio.php"><Button class="botao"> Voltar</Button></a> 
    </div>
<section>
    <div>
        <h1> Cadastro </h1>
    </div>
    <form action="cadastroUsuario.php" method="POST">
    <div>
        <input type="text" placeholder ="Digite seu usuário:" name="usuario"/>
    </div>
    <div>
        <input type="password" placeholder ="Digite sua senha:" name="senha"/>
    </div>
    <div>
        <input type="password" placeholder ="Confirme sua senha:" name="csenha"/>
    </div>
        <input class="botao" type="submit" name="botao" id="submit">
    </form>
</section>
</body>