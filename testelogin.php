<?php include("cabecalho.php"); ?>
<?php
session_start();
    //print_r($_REQUEST);
    if(isset($_POST['botao']) && !empty($_POST['usuario']) && !empty($_POST['senha'])){
        //Acessa o sistema
        include_once('conexao.php');
        $usuario=$_POST['usuario'] ;
        $senha= $_POST['senha'];
        $stmt = $pdo->prepare("select count(*) from tbUsuario WHERE usuario = '$usuario' and senha= '$senha'");	
        $stmt->execute();
        $row = $stmt ->fetch(PDO::FETCH_NUM);
        
        if(($row[0]) < 1){
            $_SESSION['nao_autenticado'] = true;
            header('Location:index.php');
            exit();
        }
        else{
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location:pgControle.php');
            exit();
        }
    }
    else{
        header('Location:index.php');
    }

?>