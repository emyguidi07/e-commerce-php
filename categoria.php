<?php include("cabecalho.php"); ?>
<?php include("conexao.php"); ?>
<?php  include("menu.php"); ?>
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
		<h1 class="titulo"> Exibir categoria </h1>
	</div>
</section>
<section>
    <form action="categoria-salvar.php" method="post">
        
    <div class="espaco">
            <input  class="form-control" type="hidden" placeholder="IdCategoria" name="txidCategoria" value="<?php echo @$_GET['idcat']?>"/>
    </div>
        <div class="espaco">
            <input  class="form-control" type="text" placeholder="Categoria" name="txCategoria" value="<?php echo @$_GET['cat']?>"/>
        </div>

        <div class="espaco">
            <input class="btn btn-danger" type="submit" value="Salvar"/>
        </div>

    </form>
</section>
<section>
    <div >
    <table  class="table" >

            <thead>
                <th> Id </th>
                <th> Categoria</th>
            </thead>
    
    <?php
			$stmt = $pdo->prepare("select * from tbCategoria");	
			$stmt ->execute();				
		?>
        <tbody>
    <?php 
        while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
            echo "<tr>";
            echo "<td> $row[0] </td>";
            echo "<td>".utf8_encode($row[1])."</td>";
            echo "<td>";
                echo "<a href='categoria-excluir.php?id=$row[0]'> Excluir </a>";
            echo "</td>";
            echo "<td>";
                echo "<a href='?idcat=$row[0]&cat=$row[1]'> Alterar </a>";
            echo "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>

    </table>
    </div>
</section>


    
<?php include("rodape.php"); ?>