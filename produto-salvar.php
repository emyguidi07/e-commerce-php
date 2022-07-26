<?php
    $id= $_POST['txidProduto'];
    $produto = $_POST['txProduto'];
    $idCat = $_POST['txIdCategoria'];
    $valor = $_POST['txValor'];

    //echo = "$produto $idCat $valor";
    include("conexao.php");
    $stmt = $pdo->prepare("select count(*) from tbProduto WHERE idProduto='$id'");	
    $stmt->execute();
    $row = $stmt ->fetch(PDO::FETCH_NUM);
        
    if(($row[0]) < 1){
    //para inserir
    
    $stmt = $pdo->prepare("insert into tbProduto(idProduto, produto, idCategoria, valor) values(null, '$produto', $idCat, $valor)");
    $stmt->execute();
    header("location:produto.php");
    }
    else{
    //para alterar
    try{
        $stmt = $pdo->prepare("update tbProduto set produto= '$produto', idCategoria='$idCat', valor='$valor' where idProduto ='$id' ");
        $stmt->execute();
        echo "<script> alert (Dados alterados com sucesso!);</script>";
        header("location:produto.php");
    }
    catch(PDOException $e){
        echo "Erro: ". $e ->getMeesage();
    }
    }
    
?>