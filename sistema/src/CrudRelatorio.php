<?php

require 'conecta.php';

session_start();

$cod =  $_SESSION['user']['id'];

if($_GET['funcao'] == 'relatorio'){

	$intervaloData = "LCT_DTCADASTR";
	$cEmpresa = "";
	$cConta = "";
	$cCliente = "";
	$cCategoria = "";
	$cTipo="";
	$cStatus="";

	if($_GET['intervaloPesquisa'] == 'atual'){
		$dataInicial = date('Y-m-d');
		$dataFinal = date('Y-m-d');	
	}

	else if($_GET['intervaloPesquisa'] == 'semanal'){
		$dataInicial = date('Y-m-d');
		$dataFinal = date($dataInicial, strtotime("+7 days"));

	}

	else if($_GET['intervaloPesquisa'] == 'mensal'){
		$dataInicial = date('Y-m-01');
		$dataFinal = date('Y-m-31');

	}

	else if($_GET['intervaloPesquisa'] == 'anual'){
		$dataInicial = date('Y-1-01');
		$dataFinal = date('Y-12-31');	
	}

	else if($_GET['intervaloPesquisa'] == 'personalizado'){
		$dataInicial =  $_GET['dataInicial'];
		$dataFinal =  $_GET['dataFinal'];

	}

	if(isset($_GET['intervaloData'])){
		$intervaloData =  $_GET['intervaloData'];
	}

	if(isset($_GET['dataInicial'])){
		$dataInicial =  $_GET['dataInicial'];
	}
	if(isset($_GET['dataFinal'])){
		$dataFinal =  $_GET['dataFinal'];
	}
	if(isset($_GET['intervaloData'])){
		$intervaloData = $_GET['intervaloData'];
	}

	if(isset($_GET['empresa'])){
		$cEmpresa = " AND EMP_COD =".$_GET['empresa'];
	}
	if($_GET['empresa'] == 'null')
		$cEmpresa = "";

	if($cEmpresa == " AND EMP_COD =")
		$cEmpresa = "";

	if(isset($_GET['conta'])){
		$cConta = " AND LANCAMENTO.CNT_COD =".$_GET['conta'];
	}
	if($_GET['conta'] == 'null')
		$cConta = "";

	if($cConta == " AND LANCAMENTO.CNT_COD =")
		$cConta = "";

	if(isset($_GET['cliente'])){
		$cCliente =" AND LANCAMENTO.CLI_COD=".$_GET['cliente'];
	}

	if($_GET['cliente'] == 'null')
		$cCliente = "";

	if($cCliente == " AND LANCAMENTO.CLI_COD=")
		$cCliente = "";

	if(isset($_GET['categoria'])){
		$cCategoria = " AND LANCAMENTO.CAT_COD=".$_GET['categoria'];
	}
	if($_GET['categoria'] == 'null')
		$cCategoria = "";
	
	if($cCategoria == " AND LANCAMENTO.CAT_COD=")
		$cCategoria = "";

	if(isset($_GET['tipo'])){
		$cTipo =" AND LCT_TIPO='".$_GET['tipo']."'";
	}
	if($_GET['tipo'] == 'null')
		$cTipo = "";

	if($cTipo == " AND LCT_TIPO=")
		$cTipo = "";

	if(isset($_GET['statusPagamento'])){
		$cStatus =" AND LCT_STATUSLANC='".$_GET['statusPagamento']."'";
	}

	if($_GET['statusPagamento'] == 'null')
		$cStatus = "";

	if($cStatus == " AND LCT_STATUSLANC=")
		$cStatus = "";


	$cData = " AND DATE_FORMAT($intervaloData, '%Y-%m-%d') BETWEEN '$dataInicial' AND '$dataFinal'";

	$cSql = "SELECT LCT_COD, EMP_NOME_EMPRESA, CNT_NOME, CLI_NOME, CLI_BANCO, CLI_AGENCIA, CLI_CONTA, CLI_TIPOCONTA, LCT_DESCRICAO, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') AS LCT_DTVENC,
	DATE_FORMAT(LCT_DTCADASTR, '%d/%m/%Y') AS LCT_DTCADASTR, IFNULL(DATE_FORMAT(LCT_DTPAG, '%d/%m/%Y'),'') AS LCT_DTPAG,CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, 
	IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) , 'R$ 0,00' ) AS LCT_VLRPAGO, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, CAT_NOME, USR_NOME, 
	LCT_NPARC, IFNULL(LCT_JUROSDIA, 0) AS LCT_JUROSDIA
	FROM LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR
	INNER JOIN CATEGORIA ON CATEGORIA.CAT_COD = LANCAMENTO.CAT_COD INNER JOIN CLIENTE ON CLIENTE.CLI_COD = LANCAMENTO.CLI_COD
	INNER JOIN USUARIO ON USUARIO.USR_COD = LANCAMENTO.USR_COD 
	WHERE EMPRESA.EMP_COD IN (SELECT USR_EMPR.COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod) $cData $cEmpresa $cConta $cCliente $cCategoria $cTipo $cStatus ORDER BY EMP_NOME_EMPRESA ASC, LCT_DTVENC DESC";

	$result = mysqli_query($conecta, $cSql);

	if (!$result || mysqli_num_rows($result) == 0){
		echo "sem registros";
	}

	else{

		while($row = mysqli_fetch_assoc($result))
		{  
			$json_array[] = $row;  
		}  

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE); 
	}

}
if($_GET['funcao'] == 'comboCategoria'){


	$cSql = "SELECT CAT_COD, CAT_NOME  FROM CATEGORIA WHERE COD_EMPRESA = $_GET[CODEMPRESA] order by (CAT_NOME) asc";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}

else if($_GET['funcao'] == 'comboConta'){


	$cSql = "SELECT CNT_COD, CNT_NOME FROM CONTA WHERE COD_EMPR = $_GET[CODEMPRESA] ORDER BY (CNT_NOME) ASC";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}


else if($_GET['funcao'] == 'comboCliente'){


	$cSql = "SELECT CLI_COD, CLI_NOME FROM CLIENTE WHERE COD_EMPR = $_GET[CODEMPRESA] ORDER BY (CLI_NOME) ASC";
	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

}


?>