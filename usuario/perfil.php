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
	<link rel="stylesheet" type="text/css" href="estilo-perfil.css">
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

                    <div class="perfil">
                        <span>editar</span> <!--transformar para um botão de editar-->
                        <div class="secao-usuario">

                        <div>

                        <div class="foto-perfil">
                        </div>
                    </div>

                    <div class="secao-email">

                    </div>

                    <div class="secao-dn">

                    </div>

                    <div class="secao-genero">

                    </div>

                    <div class="secao-diabetes">

                    </div>

                    <div class="secao-telefone">

                    </div>

                    <div class="secao-data">

                    </div>

                    <div class="secao-tipo">

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