<?php
	//Conexão com o banco
	$oCon=mysqli_connect('localhost','root','macaco22','BUCKET');


	session_start();

	//Recupera o login

	$login = isset($_GET['usuario']) ? addslashes(trim($_GET['usuario'])) : FALSE;

	//Recupera a senha
	$senha = isset($_GET['senha']) ? trim($_GET['senha']) : FALSE;


	//Validação de usuario

	if(!$login || !$senha){

		echo "Usuário ou senha invalidos";
		exit;
	}
	//INSTRUÇÃO SQL ARMAZENADA NA VARIAVEL
	$cSQL = "SELECT USR_LOGIN,USR_SENHA FROM USUARIO WHERE USR_LOGIN = '$login' AND USR_SENHA = '$senha'";
	//EFETIVANDO O COMANDO SQL
	$cValida = mysqli_query($oCon,$cSQL);

	if ($oReg = mysqli_fetch_assoc($cValida)){

		$_SESSION['login'] = $login['login'];
		$_SESSION['senha'] = stripslashes($senha['senha']);
		header("Location: dashboard.php");
		exit;
	}else{
		header("Location: index.html");
	
		exit;
	}

?>