

<?php
/*

require 'conecta.php';

$nome = $_GET['nomeCadastro'];
$login = $_GET['loginCadastro'];
$senha = $_GET['senhaCadastro'];
$email = $_GET['emailCadastro'];

$nomeEmpresa = $_GET['nomeEmpresaCadastro'];
$cnpjEmpresa = $_GET['cnpjEmpresaCadastro'];

$nomeConta = $_GET['nomeContaCadastro'];
$bancoConta = $_GET['bancoContaCadastro'];
$bancoAgencia = $_GET['agenciaContaCadastro'];
$numeroConta = $_GET['numeroContaCadastro'];
$tipoConta=$_GET['tipoContaCadastro'];
$saldoConta = $_GET['saldoContaCadastro'];


// echo "Nome ".$nome;
// echo "\n";
// echo "login ".$login;
// echo "\n";

// echo "senha ".$senha;
// echo "\n";

// echo "email ".$email;
// echo "\n";

// echo "nomeEmpresa ".$nomeEmpresa;
// echo "\n";

// echo "cnpjEmpresa ".$cnpjEmpresa;
// echo "\n";

// echo "nomeConta ".$nomeConta;
// echo "\n";

// echo "bancoConta ".$bancoConta;
// echo "\n";

// echo "bancoAgencia ".$bancoAgencia;
// echo "\n";

// echo "numeroConta ".$numeroConta;
// echo "\n";

// echo "tipoConta ".$tipoConta;
// echo "\n";

// echo "saldoConta ".$saldoConta;




$cSQL = "INSERT INTO USUARIO(USR_SENHA,USR_LOGIN,USR_NOME,USR_EMAIL,USR_PERMISSAO,USR_STATUS) VALUES ('$senha','$login','$nome','$email',1,1)";

if (mysqli_query($conecta, $cSQL)){
	$codUsuario = mysqli_insert_id($conecta);


	$cSQL = "INSERT INTO EMPRESA (EMP_COD,EMP_NOME_EMPRESA,EMP_CNPJ,EMP_STATUS) VALUES (0,'$nomeEmpresa', '$cnpjEmpresa',1)";


	if (mysqli_query($conecta, $cSQL)){
		$codEmpresa = mysqli_insert_id($conecta);

		$cSQL = "INSERT INTO USR_EMPR(COD_USR_EMPR,COD_USR,COD_EMPR) VALUES (0,$codUsuario,$codEmpresa)";

		if (mysqli_query($conecta, $cSQL)){

			$cSQL = "INSERT INTO CONTA (CNT_COD,CNT_NOME,CNT_BANCO,CNT_AGNC,CNT_NMCONTA,CNT_TIPO,CNT_STATUS,CNT_SALDOINICIAL,COD_EMPR) VALUES(0, '$nomeConta', '$bancoConta', '$bancoAgencia', '$numeroConta', '$tipoConta',1,$saldoConta,$codEmpresa)";


			if (mysqli_query($conecta, $cSQL)){

				echo "FOI";

			}
			else
				echo "erro na conta".mysqli_error($conecta);

		}
		else
			echo "erro no ÙSUARIOEMPRESA".mysqli_error($conecta);

	}
	else
		echo "erro na Empresa".mysqli_error($conecta);


}

else{

	echo "erro no usuario".mysqli_error($conecta);
}

mysqli_close($conecta);
*/
?>

<?php

require 'conecta.php';

mysqli_autocommit($conecta, FALSE);
$erro = 0;
$codEmpresa = 0;
$codUsuario = 0;

$nome = $_GET['nomeCadastro'];
$login = $_GET['loginCadastro'];
$senha = $_GET['senhaCadastro'];
$email = $_GET['emailCadastro'];

$nomeEmpresa = $_GET['nomeEmpresaCadastro'];
$cnpjEmpresa = $_GET['cnpjEmpresaCadastro'];

$nomeConta = $_GET['nomeContaCadastro'];
$bancoConta = $_GET['bancoContaCadastro'];
$bancoAgencia = $_GET['agenciaContaCadastro'];
$numeroConta = $_GET['numeroContaCadastro'];
$tipoConta=$_GET['tipoContaCadastro'];
$saldoConta = $_GET['saldoContaCadastro'];

$cSQL1 = "INSERT INTO USUARIO(USR_SENHA,USR_LOGIN,USR_NOME,USR_EMAIL,USR_PERMISSAO,USR_STATUS) VALUES ('$senha','$login','$nome','$email',1,1)";

if (mysqli_query($conecta, $cSQL1)){
	$codUsuario = mysqli_insert_id($conecta);
}

else{
	$erro++;
}


$cSQL2 = "INSERT INTO EMPRESA (EMP_COD,EMP_NOME_EMPRESA,EMP_CNPJ,EMP_STATUS) VALUES (0,'$nomeEmpresa', '$cnpjEmpresa',1)";


if (mysqli_query($conecta, $cSQL2)){
	$codEmpresa = mysqli_insert_id($conecta);

}

else{
	$erro++;
}




$cSQL3 = "INSERT INTO USR_EMPR(COD_USR_EMPR,COD_USR,COD_EMPR) VALUES (0,$codUsuario,$codEmpresa)";

if (!mysqli_query($conecta, $cSQL3)){
	$erro++;
}




$cSQL4 = "INSERT INTO CONTA (CNT_COD,CNT_NOME,CNT_BANCO,CNT_AGNC,CNT_NMCONTA,CNT_TIPO,CNT_STATUS,CNT_SALDOINICIAL,COD_EMPR) VALUES(0, '$nomeConta', '$bancoConta', '$bancoAgencia', '$numeroConta', '$tipoConta',1,$saldoConta,$codEmpresa)";


if (!mysqli_query($conecta, $cSQL4)){
	$erro++;
}



if ($erro == 0){
	mysqli_commit($conecta); 
	
	$cSQL = "SELECT USR_LOGIN, USR_SENHA FROM USUARIO WHERE USR_COD = $codUsuario";

	$result = mysqli_query($conecta, $cSQL);

	$json_array = array();

	while($row = mysqli_fetch_assoc($result)){

		$json_array[] = $row;

	}

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
} 
else { 
	
	mysqli_rollback($conecta); 


	echo "RollBack";

}


mysqli_close($conecta);

?>





