<?php

require 'conecta.php';
session_start();
$cod =  $_SESSION['user']['id'];



// 1 Inserir Empresa

if ($_GET['funcao'] == 'insereEmpresa'){



	$cSql = "INSERT INTO EMPRESA  VALUES (0, '$_GET[empresa]', '$_GET[cnpj]')";
	
	$cSql = str_replace("''","NULL", $cSql);

	
	if (mysqli_query($conecta, $cSql)){


		$codEmpresa = mysqli_insert_id($conecta);


		$cSql = "INSERT INTO USR_EMPR  values (0, $cod, $codEmpresa)";



		mysqli_query($conecta, $cSql);


		$cSql = "SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = ".$cod;


	// echo $cSql;

		$result = mysqli_query($conecta, $cSql); 

		$json_array = array();  
		while($row = mysqli_fetch_assoc($result))  
		{  
			$json_array[] = $row;  
		}  


		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);                          

	}

	else
		echo "Erro ao Inserir";

}


// Seleciona Empresa

else if($_GET['funcao'] == 'selecionaEmpresa'){



	$cSql = "SELECT * FROM EMPRESA WHERE EMP_COD = $_GET[codEmpresa]";



	$json_array = array(); 
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  


	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              


}


// ATUALIZA EMPRESA

else if($_GET['funcao'] == 'atualizaEmpresa'){

	$cSql = "UPDATE EMPRESA SET EMP_NOME_EMPRESA = $_GET[empresa], EMP_CNPJ = $_GET[cnpj] WHERE EMP_COD = $_GET[codEmpresa]";


	$json_array = array(); 

	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  



	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              



}

else if($_GET['funcao'] == 'comboConta'){


	$cSql = "SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN
	EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = $cod";

	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  


	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              


}

else if($_GET['funcao'] == 'atualizaTabela'){


$cSql = "SELECT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_NOME_EMPRESA  FROM CONTA INNER JOIN
EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD WHERE COD_USR = ".$cod;


$dataSet = mysqli_query($conecta, $cSql);

while($oDados = mysqli_fetch_assoc($dataSet)){
	echo "

	<tr>
	<td>".$oDados['CNT_COD']."</td>
	<td>".$oDados['CNT_NOME']."</td>
	<td>".$oDados['CNT_BANCO']."</td>
	<td>".$oDados['EMP_NOME_EMPRESA']."</td>
	<td>".$oDados['CNT_SALDOINICIAL']."</td>

	<td><button class = 'btn' id = '".$oDados['CNT_COD']."' onclick = 'alert(this.id)'>Alterar</button></td>
	</tr>
	";

}

mysqli_free_result($dataSet);
mysqli_close($conecta);  






}







?>