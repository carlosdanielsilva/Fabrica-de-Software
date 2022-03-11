<?php
	session_start();
	if ($_SESSION['log'] != "ativo")
	{
		session_destroy();
		header("location:../login/index.php");
	}
    
    include_once("../login/conexao.php");

?>

<html>
  <head>

  <script type="text/javascript">
		function sair()
		{
			if (confirm("Deseja realmente sair?"))
			{
				setTimeout(function() {
				    window.location.href = "../login/logout.php?destroy=yes";
				}, 1);
			}
		}
	</script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="utf-8">
	<title>Teste</title>
    
  </head>
  <body>

    <div align="center" style="margin-top: 100px;">
	
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
    </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
		<li class="active"><a href="dashboard.php">DASHBOARD</a></li>
		<li><a href="registro.php">MINHA SAÚDE</a></li>

		  </ul>
		 <ul class="nav navbar-nav navbar-right" >
		  <li><a href="" onclick="sair()"><i class="fa fa-sign-out" ></i>Sair</a></li>
		 </ul>
    </div>
  </div>
</nav>

<h1>DASHBOARD DE ACOMPANHAMENTO</h1>

<p>Nessa área você poderá acompanhar todos os registros de glicemia já registrados de uma maneira mais fácil de visualizar. </p>
        
<div class="grafico">

	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" id="grafico-teste">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Glicemia'],
          
          <?php

				$sql = "SELECT * FROM monitoramento";
				$buscar = mysqli_query($conexao, $sql);

				while ($dados = mysqli_fetch_array($buscar)){
					$data = $dados['data'];
					$glicemia = $dados['glicemia'];
                
			?>

           
          ['<?php echo $data ?>', <?php echo $glicemia ?>],
          <?php } ?>
        ]);

        var options = {
            title: 'Monitoramento da Glicemia',
            curveType: 'function',
            legend: { position: 'bottom' },
            width:1000,
            height:800,

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>

</div>



  </body>
</html>
