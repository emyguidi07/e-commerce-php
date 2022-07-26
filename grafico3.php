<?php include("conexao.php");?>

<?php
    $stmt = $pdo->prepare("select sum(valor) from tbProduto where idCategoria='2'");	
    $stmt ->execute();			
    $row = $stmt ->fetch(PDO::FETCH_NUM);			
?>
<?php
    $stmt = $pdo->prepare("select sum(valor) from tbProduto where idCategoria='3'");	
    $stmt ->execute();			
    $row1 = $stmt ->fetch(PDO::FETCH_NUM);			
?>
<?php
    $stmt = $pdo->prepare("select sum(valor) from tbProduto where idCategoria='4'");	
    $stmt ->execute();			
    $row2 = $stmt ->fetch(PDO::FETCH_NUM);			
?>
<?php
    $stmt = $pdo->prepare("select sum(valor) from tbProduto where idCategoria='1'");	
    $stmt ->execute();			
    $row3 = $stmt ->fetch(PDO::FETCH_NUM);			
?>
<html>
  <head>
  <link rel="stylesheet" href="css/style.css">
    <script src='https://www.gstatic.com/charts/loader.js'></script>
    <script>
      google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

      function drawChart() {
        const dataTable = new google.visualization.DataTable();
        dataTable.addColumn({type: 'string', 'id': 'category'});
        dataTable.addColumn({type: 'number', 'id': 'amount'});
        dataTable.addRows([
          ['Alimentação', <?php echo $row3[0]; ?>],
          ['Tecnologia', <?php echo $row[0]; ?>],
          ['Limpeza', <?php echo $row1[0]; ?> ],
          ['Brinquedos', <?php echo $row2[0]; ?>],
        ]);

        const options = {
          "vega": {
            "$schema": "https://vega.github.io/schema/vega/v4.json",
            "width": 500,
            "height": 200,
            "padding": 5,

            'data': [{'name': 'table', 'source': 'datatable'}],

            "signals": [
              {
                "name": "tooltip",
                "value": {},
                "on": [
                  {"events": "rect:mouseover", "update": "datum"},
                  {"events": "rect:mouseout",  "update": "{}"}
                ]
              }
            ],

            "scales": [
              {
                "name": "xscale",
                "type": "band",
                "domain": {"data": "table", "field": "category"},
                "range": "width",
                "padding": 0.05,
                "round": true
              },
              {
                "name": "yscale",
                "domain": {"data": "table", "field": "amount"},
                "nice": true,
                "range": "height"
              }
            ],

            "axes": [
              { "orient": "bottom", "scale": "xscale" },
              { "orient": "left", "scale": "yscale" }
            ],

            "marks": [
              {
                "type": "rect",
                "from": {"data":"table"},
                "encode": {
                  "enter": {
                    "x": {"scale": "xscale", "field": "category"},
                    "width": {"scale": "xscale", "band": 1},
                    "y": {"scale": "yscale", "field": "amount"},
                    "y2": {"scale": "yscale", "value": 0}
                  },
                  "update": {
                    "fill": {"value": "steelblue"}
                  },
                  "hover": {
                    "fill": {"value": "red"}
                  }
                }
              },
              {
                "type": "text",
                "encode": {
                  "enter": {
                    "align": {"value": "center"},
                    "baseline": {"value": "bottom"},
                    "fill": {"value": "#333"}
                  },
                  "update": {
                    "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
                    "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
                    "text": {"signal": "tooltip.amount"},
                    "fillOpacity": [
                      {"test": "datum === tooltip", "value": 0},
                      {"value": 1}
                    ]
                  }
                }
              }
            ]
          }
        };

        const chart = new google.visualization.VegaChart(document.getElementById('chart-div'));
        chart.draw(dataTable, options);
      }
    </script>
  </head>

  <body>
      <section class="espaco">
      <h1 class="titulo">Soma dos valores do produtos por categoria</h1>
    <div id="chart-div" style="width: 700px; height: 250px;"></div>
    </section>
  </body>

</html>
