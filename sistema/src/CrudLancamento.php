<?php
session_start();
require 'conecta.php';
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

	// Verificar Isso...

	if($_GET["LCT_DTPAG"] != "NULL"){
		$dataPagamento = $_GET["LCT_DTPAG"];
		$dataPagamento = "'".date('Y-m-d', strtotime($dataPagamento))."'";
	}

	else{
		$dataPagamento = 'NULL';
	}



	$dataVencimento = $_GET["LCT_DTVENC"];
	$dataVencimento = date('Y-m-d', strtotime($dataVencimento));

	// $dataPagamento = $_GET["LCT_DTPAG"];
	// $dataPagamento = date('Y-m-d', strtotime($dataPagamento));

	$valorPago = $_GET['LCT_VLRPAGO'];
	$valorTitulo = $_GET['LCT_VLRTITULO'];
	$parcelas = $_GET['LCT_NPARC'];
	$status = $_GET['LCT_STATUSLANC'];


	if($parcelas > 1){

		$codigosRegistros = array();

		$valorTitulo = $valorTitulo / $parcelas;


		for($nCont = 1; $nCont<=$parcelas; $nCont++){

			if($nCont != 1)
				$dataVencimento = date('Y-m-d',strtotime('+30 days', strtotime($dataVencimento)));	

			$cSql = "INSERT INTO LANCAMENTO VALUES (0,'$_GET[LCT_DESCRICAO] $nCont/$parcelas',NOW(),$dataPagamento, '$dataVencimento', $valorPago,$valorTitulo,$_GET[LCT_JUROSDIA],$parcelas,'$status','$_GET[LCT_TIPO]','$_GET[LCT_FRMPAG]',$_GET[CAT_COD],$_GET[CLI_COD],$_GET[CNT_COD],$cod)";
			
			$cSql = str_replace("''","NULL", $cSql);

			if(mysqli_query($conecta, $cSql)){

				$codigosRegistros[] = mysqli_insert_id($conecta);
			}

			else
				echo "erro ao lancar";


		}

		$codigosConcatenados = implode(",", $codigosRegistros);



		$cSql = "SELECT
		LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') as Vencimento, IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')),'R$ 0,00') AS LCT_VLRPAGO,
		CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
		LANCAMENTO.CAT_COD, CLI_COD, LANCAMENTO.CNT_COD, LANCAMENTO.USR_COD, USR_NOME, LANCAMENTO.CAT_COD, CAT_NOME, EMP_COD, EMP_NOME_EMPRESA 
		FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
		INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE LCT_COD IN ($codigosConcatenados)";


		if($result = mysqli_query($conecta, $cSql)){ 

			$json_array = array();  
			while($row = mysqli_fetch_assoc($result))  
			{  
				$json_array[] = $row;  
			}  

			echo json_encode($json_array, JSON_UNESCAPED_UNICODE);   

			$cSql = "UPDATE USUARIO SET USR_PONTUACAO = USR_PONTUACAO + 10 WHERE USR_COD = $cod";

			mysqli_query($conecta, $cSql);                      

		}
		else{
			echo "erro ao lancar";
			
		}	     

	}

	else{

		$cSql = "INSERT INTO LANCAMENTO VALUES (0,'$_GET[LCT_DESCRICAO]',NOW(),$dataPagamento, '$dataVencimento', $valorPago,$valorTitulo,$_GET[LCT_JUROSDIA],$parcelas,'$status','$_GET[LCT_TIPO]','$_GET[LCT_FRMPAG]',$_GET[CAT_COD],$_GET[CLI_COD],$_GET[CNT_COD],$cod)";

		if (mysqli_query($conecta, $cSql)){

			$cSql = "SELECT
			LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') as Vencimento, IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')),'R$ 0,00') AS LCT_VLRPAGO,
			CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
			LANCAMENTO.CAT_COD, CLI_COD, LANCAMENTO.CNT_COD, LANCAMENTO.USR_COD, USR_NOME, LANCAMENTO.CAT_COD, CAT_NOME, EMP_COD, EMP_NOME_EMPRESA
			FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
			INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE LCT_COD = ".mysqli_insert_id($conecta);

			$cSql = str_replace("''","NULL", $cSql);

			$result = mysqli_query($conecta, $cSql); 

			$json_array = array();  
			while($row = mysqli_fetch_assoc($result))  
			{  
				$json_array[] = $row;  
			}  

			echo json_encode($json_array, JSON_UNESCAPED_UNICODE); 

			$cSql = "UPDATE USUARIO SET USR_PONTUACAO = USR_PONTUACAO + 10 WHERE USR_COD = $cod";

			mysqli_query($conecta, $cSql);  

		}

		else{
			echo "erro ao lancar";
		}

		mysqli_free_result($result);
		mysqli_close($conecta);


	}


	

//localhost/beardsbucket/sistema/src/CrudLancamento.php?funcao=insereLancamento&LCT_DESCRICAO=Teste&LCT_DTPAG=2017-01-01&LCT_DTVENC=2017-01-01&LCT_VLRPAGO=20.00&LCT_VLRTITULO=20.00&LCT_JUROSDIA=null&LCT_NPARC=5&LCT_STATUSLANC=Pago&LCT_TIPO=Despesa&LCT_FRMPAG=Dinheiro&CAT_COD=1&CLI_COD=1&CNT_COD=1

}
// DELETA LANÇAMENTO

else if($_GET['funcao'] == 'excluiLancamento'){

	$cSql = "DELETE FROM LANCAMENTO WHERE LCT_COD = $_GET[CODLANCAMENTO]";

	if (mysqli_query($conecta, $cSql)){

		echo "Deletado";

	}
	else
		echo "Deu ruim";

}

// ALTERA LANÇAMENTO
else if($_GET['funcao'] == 'alteraLancamento'){

	if($_GET["LCT_DTPAG"] != "NULL"){
		$dataPagamento = $_GET["LCT_DTPAG"];
		$dataPagamento = "'".date('Y-m-d', strtotime($dataPagamento))."'";
	}

	else{
		$dataPagamento = 'NULL';
	}


	$dataVencimento = $_GET["LCT_DTVENC"];
	$dataVencimento = "'".date('Y-m-d', strtotime($dataVencimento))."'";

	$descrição = $_GET['TXTDESCRICAO'];
	$juros = $_GET['LCT_JUROSDIA'];
	$valorPago = $_GET['LCT_VLRPAGO'];
	$valorTitulo = $_GET['LCT_VLRTITULO'];
	$status = $_GET['LCT_STATUSLANC'];
	$tipo = $_GET['LCT_TIPO'];
	$formaPagamento = $_GET['LCT_FORMAPAGAMENTO'];
	$codCliente = $_GET['txtCliente'];
	$codConta = $_GET['txtConta'];
	$codCategoria = $_GET['txtCategoria'];

	$codLancamento = $_GET['CODLANCAMENTO'];



	$cSql = "UPDATE LANCAMENTO SET LCT_DESCRICAO = '$descrição', LCT_DTPAG = $dataPagamento, LCT_DTVENC = $dataVencimento, LCT_VLRPAGO = $valorPago, LCT_VLRTITULO = $valorTitulo, LCT_JUROSDIA =$juros, LCT_STATUSLANC = '$status', LCT_TIPO = '$tipo', LCT_FRMPAG = '$formaPagamento', CAT_COD = $codCategoria, CLI_COD = $codCliente, CNT_COD = $codConta, USR_COD = $cod WHERE LCT_COD = $codLancamento";

	if (mysqli_query($conecta, $cSql)){

		echo "Alterado";

	}
	else
		echo "Deu ruim";

}

else if($_GET['funcao'] == 'buscaLancamento'){

	$EmpresaConsulta = $_GET['empConsulta'];
	$dataInicial = $_GET['dataInicial'];
	$dataFinal = $_GET['dataFinal'];

	if($EmpresaConsulta == 0){

		$cSql = "SELECT
		LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') as Vencimento, IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')),'R$ 0,00') AS LCT_VLRPAGO,
		CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
		LANCAMENTO.CAT_COD, CLI_COD, LANCAMENTO.CNT_COD, LANCAMENTO.USR_COD, USR_NOME, LANCAMENTO.CAT_COD, CAT_NOME, EMP_COD, EMP_NOME_EMPRESA
		FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
		INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE COD_EMPRESA IN
		(SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod) AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')  BETWEEN DATE_FORMAT('$dataInicial', '%Y-%m-%d') AND DATE_FORMAT('$dataFinal', '%Y-%m-%d');
		";


		$result = mysqli_query($conecta, $cSql);
		if(mysqli_num_rows($result) >= 1){

			$json_array = array();  
			while($row = mysqli_fetch_assoc($result))  
			{  
				$json_array[] = $row;  
			}  

			echo json_encode($json_array, JSON_UNESCAPED_UNICODE); 

			mysqli_free_result($result);
			mysqli_close($conecta);
		}

		else{
			echo "erro ao consultar";
		}
	}

	else{

		$cSql = "SELECT
		LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') as Vencimento, IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')),'R$ 0,00') AS LCT_VLRPAGO,
		CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
		LANCAMENTO.CAT_COD, CLI_COD, LANCAMENTO.CNT_COD, LANCAMENTO.USR_COD, USR_NOME, LANCAMENTO.CAT_COD, CAT_NOME, EMP_COD, EMP_NOME_EMPRESA
		FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
		INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE COD_EMPRESA = $EmpresaConsulta AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')  BETWEEN DATE_FORMAT('$dataInicial', '%Y-%m-%d') AND DATE_FORMAT('$dataFinal', '%Y-%m-%d')";

		$result = mysqli_query($conecta, $cSql);
		if(mysqli_num_rows($result) >= 1){

			$json_array = array();  
			while($row = mysqli_fetch_assoc($result))  
			{  
				$json_array[] = $row;  
			}  

			echo json_encode($json_array, JSON_UNESCAPED_UNICODE); 

			mysqli_free_result($result);
			mysqli_close($conecta);
		}
		else{
			echo "erro ao consultar";

		}

	}

}


// funcao=alteraLancamento&LCT_DTPAG=01-01-2017&LCT_DTVENC=01-01-2017&TXTDESCRICAO=Teste&LCT_JUROSDIA=0&LCT_VLRPAGO=20.00&LCT_VLRTITULO=20.00&LCT_STATUSLANC=Pago&LCT_TIPO=Desp&LCT_FORMAPAGAMENTO=Dinehi&txtCliente=1&txtConta=1&txtCategoria=1&CODLANCAMENTO=1


?>