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
		LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) AS LCT_VLRPAGO,
		CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
		LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA, EMP_NOME_EMPRESA 
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
			LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) AS LCT_VLRPAGO,
			CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
			LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA, EMP_NOME_EMPRESA 
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

else if($_GET['funcao'] == 'excluiLancamento'){

	$cSql = "DELETE FROM LANCAMENTO WHERE LCT_COD = $_GET[CODLANCAMENTO]";

	if (mysqli_query($conecta, $cSql)){

		echo "Deletado";

	}
	else
		echo "Deu ruim";

}


else if($_GET['funcao'] == 'alteraLancamento'){

	// UPDATE LANCAMENTO SET LCT_DESCRICAO = '', LCT_DTPAG = '', LCT_DTVENC = '', LCT_VLRPAGO = 0.00, LCT_VLRTITULO = 0.00, LCT_JUROSDIA =0, 
 //    LCT_STATUSLANC = '', LCT_TIPO = '', LCT_FRMPAG = '', CAT_COD = 0, CLI_COD = 0, CNT_COD = 0, USR_COD = 0; 
}


?>