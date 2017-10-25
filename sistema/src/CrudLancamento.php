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


	$cSql = "SELECT CLI_COD, CLI_NOME FROM CLIENTE WHERE COD_EMPR = $_GET[CODEMPRESA] AND CLI_STATUS = 1 ORDER BY (CLI_NOME) ASC";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}

else if($_GET['funcao'] == 'insereLancamento'){


	$cSql = "INSERT INTO LANCAMENTO VALUES (0,'$_GET[LCT_DESCRICAO]',NOW(),'$_GET[LCT_DTPAG]',$_GET[LCT_VLRPAGO],$_GET[LCT_VLRTITULO],$_GET[LCT_JUROSDIA],$_GET[LCT_NPARC],'$_GET[LCT_STATUSLANC]','$_GET[LCT_TIPO]','$_GET[LCT_FRMPAG]',$_GET[CAT_COD],$_GET[CLI_COD],$_GET[CNT_COD],$cod)";

		// LCT_DESCRICAO=Teste&LCT_DTPAG=2017-01-01&LCT_VLRPAGO=20.00&LCT_VLRTITULO=20.00&LCT_JUROSDIA=null&LCT_NPARC=null&LCT_STATUSLANC=0&LCT_TIPO=Despesa&LCT_FRMPAG=dinheiro&CAT_COD=1&CLI_COD=1&CNT_COD=1

	if (mysqli_query($conecta, $cSql)){

		$cSql = "SELECT * from LANCAMENTO";


		$result = mysqli_query($conecta, $cSql); 

		$json_array = array();  
		while($row = mysqli_fetch_assoc($result))  
		{  
			$json_array[] = $row;  
		}  


		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);                          

	}

	else{
		echo mysqli_error($conecta);
	}	     

}

// ?funcao=insereLancamento&LCT_DESCRICAO=Teste&LCT_DTPAG=2017-01-01&LCT_VLRPAGO=1.00&LCT_VLRTITULO=1.00&LCT_JUROSDIA=NULL&LCT_NPARC=0&LCT_STATUSLANC=Pago&LCT_TIPO=Despesa&LCT_FRMPAG=Dinheiro&CAT_COD=1&CLI_COD=1&CNT_COD=1


?>