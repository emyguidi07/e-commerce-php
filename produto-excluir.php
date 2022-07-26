<?php
    $id =$_GET['id'];
     //echo "$id";

     include("conexao.php");
     $stmt = $pdo->prepare("Delete from tbProduto where idProduto='$id'");	
			$stmt ->execute();	

    header("location:produto.php");
?>