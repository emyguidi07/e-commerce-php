<?php include("cabecalho.php"); ?>
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
    <div class="titulo"> 
            <h1> Home </h1>
    <?php
        echo "<h1 class='paragrafo'> Bem vindo, <u>$logado</u> </h1>"
    ?>
    <div>
        <a href="logout.php" class="btn btn-danger"> Sair </a>
    </div>
    </div>
    <div class="paragrafo"> 
    <p> <a href="indexgrafico.php"> Gráfico Index</a></p>
    </div>
    <div class="paragrafo"> 
        <p> <a href="grafico3.php"> Gráfico com BD</a></p>
    </div>
    </section>

<?php include("rodape.php"); ?>