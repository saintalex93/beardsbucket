<?php

	session_start();

	$usuario = $_GET['login'];
	$senha = $_GET['senha'];
	$oCon = mysqli_connect('localhost','root','macaco22','PERFIS');

	$cSQL = "SELECT PRF_LOGIN,PRF_SENHA FROM PERFIS WHERE PRF_LOGIN = '$usuario' and PRF_SENHA = '$senha'";

	$Valida = mysqli_query($oCon,$cSQL);
	echo $cSQL;

	if($oReg = mysqli_fetch_assoc($Valida)){

		header("Location: index.php");
	}else{

		header("Location: PERFIS.php");
	}
?>