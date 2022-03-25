<?php
	session_start();
	if ($_SESSION['log'] != "ativo")
	{
		session_destroy();
		header("location:../login/index.php");
	}

	include_once("../login/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="estilo-registro.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;700&display=swap" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Minha Saúde</title>

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
								<a href="perfil.php"><li class="list-item" id="menu-item2">PERFIL</li></a>
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

					<h1 class="titulo"> Minha Saúde </h1>


					<?php

						$sql = "SELECT * FROM monitoramento";
						$buscar = mysqli_query($conexao, $sql);
						while ($dados = mysqli_fetch_array($buscar)){
							$data = $dados['data'];
							$glicemia = $dados['glicemia'];
							$exercicio = $dados['exercicio'];
							$agua = $dados['agua'];
							$peso = $dados['peso'];
							$cafe = $dados['cafe'];
							$almoco = $dados['almoco'];
							$lanche = $dados['lanche'];
							$janta = $dados['janta'];
						}
					?>

							<div class="busca">
							<?php

							echo "<form action='registro.php'>";
							echo "<input type='text' placeholder='Insira a data que deseja buscar' name='valor' maxlenght='15' autocomplete='off' required><br><br>";
							echo "<input type='submit' name='buscar' value='Buscar'>";
							echo "<input type='button'  onclick=\"window.location='registro.php';\" value='Apagar filtro'>";
							echo "</form>";

							?>
							</div>

							<div class="bloco-glicemia">

								<span>Nível Atual:</span>

								<div class="valores">
									<p class="glicemia"> Glicemia </p>

									<div class="valor-atual">
										<div class="valor-glicemia">
											<?php echo $glicemia ?>
										</div>
										<p class="medidas">mg/dL</p>
									</div>
					
								</div>

								<div class="novo-registro">
									<button class="add">novo registro</button>
																		
								</div>

							</div>

							<div class="bloco-exercicio">

								<span>Exercício Físico:</span>

								<div class="registro-exercicio">
									<div class="exercicio">
										<?php echo $exercicio ?>
									</div>
								</div>
							</div>

							<div class="bloco-alimentacao">
							
							<p>Alimentação:</p>

							<div class="cafe">
								<span>Café da manhã:</span>
								<div class="campo-cafe">
									<div class="registro-cafe">
										<?php echo $cafe ?>
									</div>
								</div>

							</div>

							<div class="almoco">
								<span>Almoço:</span>
								<div class="campo-almoco">
									<div class="registro-almoco">
										<?php echo $almoco ?>
									</div>
								</div>	
							</div>

							<div class="lanche">
								<span>Lanche:</span>
								<div class="campo-lanche">
									<div class="registro-lanche">
										<?php echo $lanche ?>
									</div>
								</div>
							</div>

							<div class="janta">
								<span>Jantar:</span>
								<div class="campo-jantar">
									<div class="registro-janta">
										<?php echo $janta ?>
									</div>
								</div>
							</div>

							</div>

							<div class="bloco-agua">
								<div class="registro-agua">
									<span>Água:</span>
									<div class="agua">
										<span><?php echo $agua ?></span>
									</div>
									<p class="medidas">mL</p>
								</div>

								<div class="registro-peso">
									<span>Peso:</span>
									<div class="peso">
										<span><?php echo $peso ?></span>
									</div>
									<p class="medidas">kg</p>

								</div>
							</div>


							<?php 
										mysqli_close($conexao);

							?>

				</div>
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
  </body>
</html>