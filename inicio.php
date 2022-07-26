<?php include("cabecalho.php"); ?>
<?php include("conexao.php"); ?>
<head>
    <title>Página inicial</title>
    <div class="menu">
<nav>
    <ul> 
        <li> <a href="index.php"> Login</a></li>
        <li> <a href="cadastroUsuario.php"> Cadastro </a></li>
    </ul>
</nav>
</div>
<style>
    .fundo{
        background-color: rgb(193, 147, 245);
        margin: 10px 10px 10px 10px;
        display:flex;
        flex-direction: row;
    }
    h2{
    font-family:Verdana, Tahoma, sans-serif;
    font-size: 20px;
	text-decoration: none;
    font-weight:500;
    color:#2a056ee3;
	margin-top: 40px;
	margin-bottom: 30px;
}
.para{
	font-family:Verdana, Tahoma, sans-serif;
    font-size: 15px;
    font-weight:500;
    color:#2a056ee3;
	margin-top: 5px;
	margin-bottom: 30px;
}
    .fig{
        position: relative;
        background-color: #fff;
        width: 24%;
        margin-left: 10px;
        margin-top: 10px;
        padding-left: 50px;
        padding-top: 10px;
    }
}
</style>
</head>

<section>
    <div>
        <h1 class="titulo"> Bem-vindo ao e-commerce de DS! </h1>
    </div>
    <div>
        <p class="paragrafo">Acesse seu login ou cadastre-se no site para tornar-se um administrador!</p>
        
    </div>
    </section>
    
    <h1 class="titulo">Possíveis produtos da nossa loja: </h1>
    <div class="fundo">
    <?php 
      try{
      $stmt = $pdo->prepare("select img, produto, valor from tbProduto order by idProduto ");	
      $stmt ->execute();
      while($row = $stmt ->fetch(PDO::FETCH_BOTH)){	 ?>
        <figure class="fig">
            <img src= <?php echo $row['img']?> width="150" height="150" />
        <figcaption>
        <h2><?php echo $row['produto']?></h2>
        <p class="para"><?php echo "R$ ".$row['valor']?></p>
        </figcaption>
        </figure>
        
      <?php 
      }
        }
        catch(PDOException $e){
            echo "Erro: ". $e ->getMeesage();
        }
      ?>
      </div>	
        <h1 class="titulo"> Contato </h1>
        <section>
    
    <form action="" method="post">
        <div class ="espaco">
            <input class="form-control" type="text" placeholder="Nome" name="nome" >
        </div>

        <div class ="espaco">
            <input  class="form-control" type="text" placeholder="Email" name="email"/>
        </div>

        <div class ="espaco">
            <input  class="form-control" type="textarea" placeholder="Mensagem" name="msg"/>
        </div>

        <div class ="espaco">
            <input class="btn btn-danger" type="submit" value="Salvar"/>
        </div>

    </form>
</section>

