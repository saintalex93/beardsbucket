<?php

require 'conecta.php';
session_start();
$cod =  $_SESSION['user']['id'];


// NSERT INTO CONTA VALUES (0,'teste','Itaubis','1234','123','CC',12000,'1',1)

// 1 Inserir Empresa

if ($_GET['funcao'] == 'insereEmpresa'){



	$cSql = "INSERT INTO EMPRESA  VALUES (0, '$_GET[empresa]', '$_GET[cnpj]',1)";
	
	$cSql = str_replace("''","NULL", $cSql);

	
	if (mysqli_query($conecta, $cSql)){


		$codEmpresa = mysqli_insert_id($conecta);


		$cSql = "INSERT INTO USR_EMPR  values (0, $cod, $codEmpresa)";



		mysqli_query($conecta, $cSql);


		$cSql = "SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ, IF(EMP_STATUS = 1,REPLACE( EMP_STATUS,1,'Ativo'),REPLACE( EMP_STATUS,0,'Inativo')) as EMP_STATUS FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = ".$cod;


		$result = mysqli_query($conecta, $cSql); 

		$json_array = array();  
		while($row = mysqli_fetch_assoc($result))  
		{  
			$json_array[] = $row;  
		}  


		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);                          

	}

	else{
		echo "Erro ao Inserir";
	}	
}
// ATUALIZA EMPRESA

else if($_GET['funcao'] == 'atualizaEmpresa'){

	$status = $_GET['status'];

	if($status == "Ativo")
		$status = 1;
	else
		$status = 0;



	$cSql = "UPDATE EMPRESA SET EMP_NOME_EMPRESA = '$_GET[empresa]', EMP_CNPJ = '$_GET[cnpj]', EMP_STATUS = $status WHERE EMP_COD = $_GET[codEmpresa]";



	if($result = mysqli_query($conecta, $cSql)){

		$cSql = "SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ,
		IF(EMP_STATUS = 1,REPLACE( EMP_STATUS,1,'Ativo'),REPLACE( EMP_STATUS,0,'Inativo')) as EMP_STATUS 
		FROM USUARIO JOIN USR_EMPR ON USR_COD = COD_USR INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE EMP_COD = $_GET[codEmpresa]";

		$result = mysqli_query($conecta, $cSql);

		if($row = mysqli_fetch_assoc($result))
		{  
			$json_array[] = $row;  
		}  


		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

	}

	else
		echo "Erro ao Atualizar";
	

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


else if($_GET['funcao'] == 'insereConta'){


	$cSql = "INSERT INTO CONTA VALUES(0, '$_GET[nomeConta]', '$_GET[nomeBanco]', '$_GET[agenciaConta]', '$_GET[numeroConta]','$_GET[tipoConta]',$_GET[cmbStatusConta],$_GET[saldoInicial],$_GET[cmbEmpresa])";


	$cSql = str_replace("''","NULL", $cSql);

	
	if (mysqli_query($conecta, $cSql)){

		$cSql = "SELECT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_NOME_EMPRESA  FROM CONTA INNER JOIN
		EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD WHERE COD_USR = ".$cod;

		$result = mysqli_query($conecta, $cSql); 

		$json_array = array();  
		while($row = mysqli_fetch_assoc($result))  
		{  
			$json_array[] = $row;  
		}  


		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);                          

	}

	else
		echo "Erro ao Inserir!";      


}




