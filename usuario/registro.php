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
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Minha Saúde</title>

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
		<li><a href="inicio.php">INÍCIO</a></li>
		<li class="active"><a href="registro.php">MINHA SAÚDE</a></li>
		  </ul>
		 <ul class="nav navbar-nav navbar-right" >
		  <li><a href="" onclick="sair()"><i class="fa fa-sign-out" ></i>Sair</a></li>
		 </ul>
    </div>
  </div>
</nav>

		<h1> MINHA SAÚDE </h1>
		<?php

			if (isset($_GET['confirm']))
			{
				$string = "SELECT id FROM monitoramento ORDER BY id";
				$query = mysqli_query($conexao, $string);
				$i = 0;

				while($linha = mysqli_fetch_assoc($query))
				{
					if(isset($_GET['id'.$linha['id']]))
					{
						$queries[$i] = mysqli_query($conexao, "DELETE FROM monitoramento WHERE id = ".$linha['id']);
					}

					$i++;	
				}

				echo "<script>window.location = 'registro.php'</script>";
			}

			$query = mysqli_query($conexao, "SELECT * FROM monitoramento ORDER BY id");

			if (isset($_GET['apagar']))
			{
				echo "<h3>Excluir produtos</h3>";
				echo "<form id='apagar' action='registro.php'>";
				echo "<table>";
				echo "<tr>".
						"<td style='background-color:lightblue;'><b>Glicemia</b></td>".
						"<td style='background-color:lightblue;'><b>Cafe</b></td>".
						"<td style='background-color:lightblue;'><b>Almoço</b></td>".
						"<td style='background-color:lightblue;'><b>Lanche</b></td>".
						"<td style='background-color:lightblue;'><b>Janta</b></td>".
						"<td style='background-color:lightblue;'><b>Exercicio</b></td>".
						"<td style='background-color:lightblue;'><b>Agua</b></td>".
						"<td style='background-color:lightblue;'><b>Peso</b></td>".
						"<td style='background-color:lightblue;'><b>Selecionado</b></td>".
					 "</tr>";

				while($linha = mysqli_fetch_assoc($query))
				{
					echo "<tr>".
							"<td>".$linha['glicemia']."</td>".
							"<td>".$linha['cafe']."</td>".
							"<td>".$linha['almoco']."</td>".
							"<td>".$linha['lanche']."</td>".
							"<td>".$linha['janta']."</td>".
							"<td>".$linha['exercicio']."</td>".
							"<td>".$linha['agua']."</td>".
							"<td>".$linha['peso']."</td>".
							"<td><input type='checkbox' name='id".$linha['id']."'></td>".
						 "</tr>";
				}

				echo "</table><br>";
				echo 	"<input type='submit' value='Confirmar' name='verificar'><br><br>".
						"<input type='button' onclick='javascript:window.history.go(-1)';' value='Voltar'>";
				echo "</form>";
			}
			elseif (isset($_GET['verificar']))
			{
				$string = "SELECT id FROM monitoramento ORDER BY id";
				$query = mysqli_query($conexao, $string);

				echo "<form action='registro.php'>";

				while($linha = mysqli_fetch_assoc($query))
				{
					if(isset($_GET['id'.$linha['id']]))
					{
						echo "<input type='hidden' name='id".$linha['id']."' value='on'>";
					}
				}

				echo "<div class='form'> <h3>Confirmação de exclusão de dados</h3>".
					 "<input type='submit' name='confirm' value='Confirmar'></div>";
			}
			else
			{
				echo "<table>";
				echo "<tr>".
							"<td style='background-color:lightblue;'><b>Glicemia</b></td>".
							"<td style='background-color:lightblue;'><b>Cafe</b></td>".
							"<td style='background-color:lightblue;'><b>Almoço</b></td>".
							"<td style='background-color:lightblue;'><b>Lanche</b></td>".
							"<td style='background-color:lightblue;'><b>Janta</b></td>".
							"<td style='background-color:lightblue;'><b>Exercicio</b></td>".
							"<td style='background-color:lightblue;'><b>Agua</b></td>".
							"<td style='background-color:lightblue;'><b>Peso</b></td>".
					 "</tr>";

				while($linha = mysqli_fetch_assoc($query))
				{
					echo "<tr>".
							"<td>".$linha['glicemia']."</td>".
							"<td>".$linha['cafe']."</td>".
							"<td>".$linha['almoco']."</td>".
							"<td>".$linha['lanche']."</td>".
							"<td>".$linha['janta']."</td>".
							"<td>".$linha['exercicio']."</td>".
							"<td>".$linha['agua']."</td>".
							"<td>".$linha['peso']."</td>".
						 "</tr>";
				}

				echo "</table><br>";
				echo "<button class='button' onclick=\"window.location='addRegistro.php';\">Adicionar Registros</button>
					  <button class='button' onclick=\"window.location='registro.php?apagar=yes';\">Excluir Registros</button>
					  <button class='button' onclick=\"window.location='inicio.php';\">Voltar</button>";
			}

			mysqli_close($conexao);
		?>
  </body>
</html>