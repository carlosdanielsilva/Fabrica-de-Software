<!DOCTYPE html>
<html lang="pt-br">
<head>
	<script type="text/javascript">
		function capsLock(e)
		{
			kc = e.keyCode?e.keyCode:e.which;
			sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);

			if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
				document.getElementById('caps').style.visibility = 'visible';
			else
				document.getElementById('caps').style.visibility = 'hidden';
		}
	</script>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="loginnn.css">
	<title>Login</title>
</head>
<body>

	<div class="container">
    <header>
		<p class = "titulo">Login</p>
		<div align="center" class="transparent">
	
		<br>
		<form name="login" method="POST" action="index.php" >
			<p class="texto" ><label for="nickname"> Nickname:</label> <input type="text" name="nickname" autocomplete="off" maxlength="12" required><br><br>
			<label for="password">Senha:</label> <input type="password" name="senha" id ="senha" onkeypress="capsLock(event)" maxlength="12" required><br>
			<div id="caps" style="visibility:hidden" class="texto">Caps Lock Ativado!</div><br></p>
			<button class="button1" type="submit"><span style="font-size:85%;">Confirmar</span></button><br><br>
		</form>
	</header>
	</div>
	</div>

</body>
</html>
<?php
	include_once('conexao.php');

	if(mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM users")) == 0)
	{
		mysqli_query($conexao, "INSERT INTO users (nickname, senha, nome, email, data_nascimento, tipo_diabete, ativo) values ('admin', '".md5("admin")."', 'Administrador', 'admin@admin', 01/01/2001, 2, 1)");
		mysqli_close($conexao);
		header("location:index.php");
	}

	if(isset($_POST['nickname'])) 
	{
		$nickname = $_POST['nickname'];
		$senha = $_POST['senha'];

		$sqlstring = "SELECT * FROM users WHERE nickname = '$nickname' AND senha = '".md5($senha)."'";
		$info = @mysqli_query($conexao, $sqlstring);

		if (!$info) 
		{ 
			die('<b>Query Inválida: </b>' . mysqli_error($conexao));
		}

		$registro = mysqli_num_rows($info);	

		if($registro != 1)
		{
			echo "<script>alert('Login ou senha errada!');</script>";
		}
		else
		{
			$string = "SELECT ativo, senha FROM users WHERE nickname = '$nickname'";
			$query = mysqli_query($conexao, $string);
			$linha = mysqli_fetch_assoc($query);

			$dados = mysqli_fetch_array($info);	
		
			session_start();
			$_SESSION['id'] = $dados['id'];
			$_SESSION['cargo'] = $dados['cargo'];
			$_SESSION['log'] = 'ativo';	
				
			if ($linha['ativo'] == 1)
			{
					header("location:../usuario/inicio.php");
			}
			elseif ($linha['ativo'] == 0)
			{
				echo "<script>
						alert('Usuários inativos não podem logar!');
						window.location = 'index.php';
					  </script>";
			}
			else
			{
				echo "<script>
						alert('Erro!');
						window.location = 'index.php';
					  </script>";
			}
		}
	}

	mysqli_close($conexao);
?>