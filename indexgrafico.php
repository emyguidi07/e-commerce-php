
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="espaco">
<?php
    $f=6;
    $m=33;
?>
<h1 class="titulo">Gráfico de gênero da sala e de horas técnicas por semana</h1>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Qtd", { role: "style" } ],
        ["Masculino", <?php echo $m; ?>, "#6495ED"],
        ["Feminino", <?php echo $f; ?>, "#4169E1"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Gênero alunos 3DA",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Matérias', 'Aulas por semana'],
          ['DTCC',     3],
          ['PWIII',      2],
          ['SE',  2],
          ['IPSSI',  2],
          ['PAM', 2]
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>


<div id="columnchart_values" style="width: 900px; height: 300px;">
</div>
</section>
<section class= "espaco">
    <div id="donutchart" style="width: 600px; height: 300px;"></div>
    </section>
    <?php include("rodape.php");?>
</body>
</html>

