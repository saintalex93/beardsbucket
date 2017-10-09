<?php

	$nome = $_GET['nome'];
	$apelido = $_GET['apelido'];
	$usuario = $_GET['login'];
	$senha = $_GET['senha'];
	$email = $_GET['email'];
	

	$oCon = mysqli_connect('localhost','bucket','123','PERFIS');

	$cSQL = "INSERT INTO PERFIS VALUES(0,'$nome','$apelido','$usuario','$senha',NULL,'$email',
NOW(),NULL)";
	
	if(mysqli_query($oCon,$cSQL)){

		header("Location: index.php");
	}else{
		
		header("Location: cadastro.php");
	}

	mysqli_close($oCon);

?>