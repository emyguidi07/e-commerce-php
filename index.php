<?php
session_start();

?>
<?php include("cabecalho.php"); ?>
<head>
    <title>Tela de Login</title>
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
            outline: none;
            margin-top: 10px;
            font-size:15px;
            border-radius: 10px;
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
        <h1> Login </h1>
    </div>
                <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div>
                      <p>Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
    <form action="testelogin.php" method="POST">
    <div>
        <input type="text" placeholder ="Digite seu usuário:" name="usuario"/>
    </div>
    <div>
        <input type="password" placeholder ="Digite sua senha:" name="senha"/>
    </div>

    <input class="botao" type="submit" name="botao" id="submit" value="Entrar">
    </form>
</section>

</body>