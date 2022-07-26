<?php 
	include("cabecalho.php");
	include("conexao.php");
   include("menu.php"); 
?>
<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location:index.php');
    }
    $logado = ($_SESSION['usuario']);
?>

<section>
    <div>
		<h1 class="titulo"> Exibir produtos </h1>
	</div>
</section>

<section>
    
    <form action="produto-salvar.php" method="post">
        <div class ="espaco">
            <input class="form-control" type="hidden" placeholder="IdProduto" name="txidProduto" value="<?php echo @$_GET['id']?>">
        </div>
        <div class ="espaco">
            <input class="form-control" type="text" placeholder="Produto" name="txProduto" value="<?php echo @$_GET['produto']?>">
        </div>

        <div class ="espaco">
            <input  class="form-control" type="text" placeholder="Id Categoria" name="txIdCategoria" value="<?php echo @$_GET['idcat']?>"/>
        </div>

        <div class ="espaco">
            <input  class="form-control" type="text" placeholder="Valor" name="txValor" value="<?php echo @$_GET['valor']?>"/>
        </div>

        <div class ="espaco">
            <input class="btn btn-danger" type="submit" value="Salvar"/>
        </div>

    </form>
</section>


<section>
    <div class="espaco">
    <table  class="table">
            <thead class= "thead-dark">
                <th > Id </th>
                <th > Produto </th>
                <th > Id Categoria </th>
                <th > Valor</th>
                <th > &nbsp; </th>
            </thead>
    
    <?php
			$stmt = $pdo->prepare("select idProduto, produto, idCategoria, valor from tbProduto");	
			$stmt ->execute();				
		?>
        <tbody>
    <?php 
        while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
            echo "<tr>";
            echo "<td> $row[0] </td>";
            echo "<td> $row[1] </td>";
            echo "<td> $row[2] </td>";
            echo "<td> $row[3] </td>";
            echo "<td>";
                echo "<a href='produto-excluir.php?id=$row[0]'> Excluir </a>";
            echo "</td>";
            echo "<td>";
                echo "<a href='?id=$row[idProduto]&produto=$row[produto]&idcat=$row[idCategoria]&valor=$row[valor]'> Alterar </a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </div>
    </table>
</section>

<?php include("rodape.php"); ?>
