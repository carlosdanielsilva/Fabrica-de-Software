<?php
session_start();
	if ($_SESSION['log'] != "ativo")
	{
		session_destroy();
		header("location: index.php");
	}
	else
	{
		header("location:../usuario/inicio.php");
	}
?>