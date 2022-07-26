<?php
    $idcat = $_POST['txidCategoria'];
    $categoria = $_POST['txCategoria'];

    include("conexao.php");

    $stmt = $pdo->prepare("select count(*) from tbCategoria WHERE idCategoria='$idcat'");	
    $stmt->execute();
    $row = $stmt ->fetch(PDO::FETCH_NUM);
        
    if(($row[0]) < 1){ 

    //para inserir
    $stmt = $pdo->prepare("insert into tbCategoria values(null, '$categoria')");
    $stmt->execute();
    header("location:categoria.php");
    }
    else{
    //para alterar
    try{
        $stmt = $pdo->prepare("update tbCategoria set categoria= '$categoria' where idCategoria ='$idcat' ");
        $stmt->execute();
        echo "<script> alert (Dados alterados com sucesso!);</script>";
        header("location:categoria.php");
    }
    catch(PDOException $e){
        echo "Erro: ". $e ->getMeesage();
    }
}
?>