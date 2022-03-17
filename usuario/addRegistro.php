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
<link rel="icon" href="img/avatar.png"/>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Cadastro</title>
</head>
<body>
	<div align="center">
		
			<h2>Cadastro do Monitoramento</h2>
			<div class="form"><form action="addRegistro.php" method="post" enctype="multipart/form-data" id="info">
				Valor glicemia: <input type="number" name="glicemia" min="0.25" max="99999.99" step="0.01" autocomplete="off" required><br><br>
				Cafe: <input type="text" name="cafe" maxlength="200" autocomplete="off" required><br><br>
				Almoco: <input type="text" name="almoco" maxlength="200" autocomplete="off" required><br><br>
				Lanche: <input type="text" name="lanche" maxlength="200" autocomplete="off" required><br><br>
				Janta: <input type="text" name="janta" maxlength="200" autocomplete="off" required><br><br>
				Exercicio: <input type="text" name="exercicio" maxlength="300" autocomplete="off" required><br><br>
				Água (ml): <input type="number" name="agua" min='1' max='9999' step='1' autocomplete='off' required><br><br>
				Peso: <input type="number" name="peso" min='1' max='9999' step='1' autocomplete='off' required><br><br>
				<input type="submit" value="Confirmar">
				<input type="button" value="Apagar" onclick="if(confirm('Deseja realmente apagar estes dados?')){document.getElementById('info').reset();};">
				<br><button class="button" onclick="if(confirm('Deseja sair sem salvar?')){window.location='registro.php';}">Voltar</button>
			</form></div>
	</div>
</body>
</html>
<?php
	if (isset($_POST['glicemia']))
	{
		$glicemia = $_POST['glicemia'];
		$cafe = $_POST['cafe'];
		$almoco = $_POST['almoco'];
		$lanche = $_POST['lanche'];
		$janta = $_POST['janta'];
		$exercicio = $_POST['exercicio'];
		$agua = $_POST['agua'];
		$peso = $_POST['peso'];

		$query = "INSERT INTO monitoramento (glicemia, cafe, almoco, lanche, janta, exercicio, agua, peso) VALUES ('{$glicemia}', '{$cafe}', '{$almoco}', '{$lanche}', '{$janta}', '{$exercicio}', '{$agua}', '{$peso}')";

		$conexao = mysqli_connect('localhost', 'root', '', 'glic');

		if(mysqli_query($conexao, $query)){
			if($glicemia < 70) {
				echo "<script>
							alert('ALERTA! Sua glicose está inferior a taxa miníma aceitável, que é de 70mg/dl');
							window.location='registro.php';
					  </script>";
			} else if ($glicemia > 125){
				echo "<script>
							alert('ALERTA! Sua glicose está superior a taxa máxima aceitável, que é de 125mg/dl');
							window.location='registro.php';
					  </script>";
			} else {
				echo "<script>
							alert('Sua glicose está normal.');
							window.location='registro.php';
					  </script>";
			}	
		} else{
			echo "<script>
							alert('Erro ao cadastrar no sistema.');
							window.location='registro.php';
					  </script>";
		}
	
	}
?>