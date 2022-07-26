<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<section class="paragrafo">
    <h1 class="titulo">Array da tabela Categoria</h1>
<?php

    include("conexao.php");

    $stmt = $pdo->prepare("select * from tbCategoria");	
    $stmt ->execute();

    $data = array();
    while($row = $stmt ->fetch(PDO::FETCH_ASSOC)){        
        $data[] = $row;            					
    }	

    echo json_encode($data);
?>
</section>