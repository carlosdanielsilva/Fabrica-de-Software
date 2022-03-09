<?php
	session_start();
	if ($_SESSION['log'] != "ativo")
	{
		session_destroy();
		header("location:../login/index.php");
	}
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<meta charset="utf-8">
	<title>Início</title>

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
		<li class="active"><a href="inicio.php">INÍCIO</a></li>
		<li><a href="registro.php">MINHA SAÚDE</a></li>
		  </ul>
		 <ul class="nav navbar-nav navbar-right" >
		  <li><a href="" onclick="sair()"><i class="fa fa-sign-out" ></i>Sair</a></li>
		 </ul>
    </div>
  </div>
</nav>

  </body>
</html>