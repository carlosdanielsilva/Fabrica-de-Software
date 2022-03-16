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
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>

<body>

	<div class="logo">
			
	</div>


	<div class="container">
		
		<p class = "titulo">Login</p>
	
		<br>
		<form name="login" method="POST" action="index.php" class="login-dados" >
			<div class="campo-login">
				<span class="texto-login" ><label for="nickname"> login:</label><br> <input type="text" name="nickname" placeholder="username@email.com" autocomplete="off" maxlength="12" required>
			</div>
			<br>
			<div class="campo-senha">
				<label for="password">senha:</label><br> <input type="password" placeholder="password" name="senha" id ="senha" onkeypress="capsLock(event)" maxlength="12" required><br>
			</div>
			<div id="caps" style="visibility:hidden" class="texto">Caps Lock Ativado!</div><br></p>
			<button class="entrar" type="submit"><span style="font-size:85%;">entrar</span></button><br><br>
		</form>

		<span class="entre-com">ou entre com</span>

		<div class="login-redes">


		<button class="button-fb" type="button"><span style="font-size:85%;">Logar com Facebook</span></button><br><br>
		<button class="button-google" type="button"><span style="font-size:85%;">Logar com Google</span></button><br><br>

		</div>
	</div>


	<div class="rodape">
		<p class="direitos">@copyright todos os direitor reservados</p>
		<p>designed by TECHUMAN</p>
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
					header("location:../usuario/dashboard.php");
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