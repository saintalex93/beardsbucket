<?php
require 'conecta.php';
session_start();
$cod =  $_SESSION['user']['id'];


if($_GET['funcao'] == 'comboCategoria'){


	$cSql = "SELECT CAT_COD, CAT_NOME  FROM CATEGORIA WHERE COD_EMPRESA = $_GET[CODEMPRESA] AND CAT_STATUS = 1 order by (CAT_NOME) asc";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}

else if($_GET['funcao'] == 'comboConta'){


	$cSql = "SELECT CNT_COD, CNT_NOME FROM CONTA WHERE COD_EMPR = $_GET[CODEMPRESA] AND CNT_STATUS = 1 ORDER BY (CNT_NOME) ASC";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}


else if($_GET['funcao'] == 'comboCliente'){


	$cSql = "SELECT CLI_COD, CLI_NOME FROM CLIENTE WHERE COD_EMPR = $_GET[CODEMPRESA] AND CLI_STATUS = 1 ORDER BY (CLI_NOME) ASC;";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}



?>