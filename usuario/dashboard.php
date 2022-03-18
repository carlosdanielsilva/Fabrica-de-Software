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
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
		<link rel="stylesheet" type="text/css" href="estilo-dash.css">
		<meta charset="utf-8">
		<title>Dashboard</title>
    
	</head>

	<body>
		
		<div class="logo">
			<img src="img/Logo_GLIC_branco.png" width="232px">
		</div>

		<div style="margin-top: 100px;" class="all">
			<div class="container">
				<nav class="navbar">
					<div class="navbar-inner">
						<div class="profile-picture">
							<!--pegar imagem cadastrada no perfil-->
						</div>
						<div class="navbar-user-dados">
							<p class="navbar-name">Usuario</p> <br> <!--pegar nome cadastrado no perfil-->
							<p class="navbar-username">@username</p> <!--pegar username cadastrado no perfil-->
						</div>
						<div class="navbar-list">
							<ul>
								<a href="dashboard.php"><li class="list-item" id="menu-item1">DASHBOARD</li></a>
								<a href="dashboard.php"><li class="list-item" id="menu-item2">PERFIL</li></a>
								<a href="registro.php"><li class="list-item" id="menu-item3">MINHA SAÚDE</li></a>
								<a href="registro.php"><li class="list-item" id="menu-item4">MURAL</li></a>
							</ul>
						</div>
						<div class="navbar-sair">
							<a href="" onclick="sair()"><li class="button-sign-out">SAIR</li></a>
						</div>
					</div>
				</nav>

				<div class="container-tela">
					
					<div class="cabecalho-container">
						<h1 class="titulo-page">Dashboard</h1>
						<p class="descricao-dash">Nessa área você poderá acompanhar todos os registros de glicemia já registrados de uma maneira mais fácil de visualizar. </p>
					</div>

					<div class="container-glicemia">
						<div class="container-glicemia-valor">
							<div class="glicemia-icone">
								<img src="img/icone_medidor.png" class="icone-medidor" style="width: 70px; height: 70px;">
							</div>
							<div class="glicemia-valor">
								<p class="valor">XX</p> <!-- puxar ultimo registro do BD -->
								<p class="medida">mg/dL</p>
							</div>
							<div class="glicemia-legendas">
								<p class="legenda-titulo">GLICEMIA</p>
								<p class="legenda-subtitulo">(valor atual)</p>
							</div>
						</div>
						
						<div class="container-grafico">
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
									width:500,
									height:350,
									
								};

								var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

								chart.draw(data, options);
							}
							</script>
							<div id="curve_chart" style="width: 900px; height: 500px;"></div>
						</div>
					</div>
					
					<div class="container-propensao"></div>

					<div class="botoes-grafico">
						
					</div>
				</div>

				<div class="rodape">
					<div class="icones">
						<img src="img/facebook-branco.png" width="27px">
						<img src="img/instagram-branco.png" width="27px">
						<img src="img/linkedin-branco.png" width="27px">
					</div>

					<p class="direitos">@copyright todos os direitor reservados</p>
					<p>designed by TECHUMAN</p>
				</div>
			</div>
		</div>
	</body>
</html>