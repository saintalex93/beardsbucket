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

	$dataPagamento = $_GET["LCT_DTPAG"];
	$dataPagamento = date('Y-m-d', strtotime($dataPagamento));

	$dataVencimento = $_GET["LCT_DTVENC"];
	$dataVencimento = date('Y-m-d', strtotime($dataVencimento));


	$valorPago = $_GET['LCT_VLRPAGO'];
	$valorTitulo = $_GET['LCT_VLRTITULO'];
	$parcelas = $_GET['LCT_NPARC'];

	if($parcelas > 1){

		$codigosRegistros = array();

		$valorTitulo = $valorTitulo / $parcelas;


		for($nCont = 1; $nCont<=$parcelas; $nCont++){

			if($nCont != 1)
				$dataVencimento = date('Y-m-d',strtotime('+30 days', strtotime($dataVencimento)));	

			$cSql = "INSERT INTO LANCAMENTO VALUES (0,'$_GET[LCT_DESCRICAO] $nCont/$parcelas',NOW(),'$dataPagamento', '$dataVencimento', $valorPago,$valorTitulo,$_GET[LCT_JUROSDIA],$parcelas,'$_GET[LCT_STATUSLANC]','$_GET[LCT_TIPO]','$_GET[LCT_FRMPAG]',$_GET[CAT_COD],$_GET[CLI_COD],$_GET[CNT_COD],$cod)";
			
			$cSql = str_replace("''","NULL", $cSql);

			mysqli_query($conecta, $cSql);

			$codigosRegistros[] = mysqli_insert_id($conecta);

		}

		$codigosConcatenados = implode(",", $codigosRegistros);



		$cSql = "SELECT * FROM LANCAMENTO WHERE LCT_COD IN ($codigosConcatenados)";


		if($result = mysqli_query($conecta, $cSql)){ 

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

	else{

		$cSql = "INSERT INTO LANCAMENTO VALUES (0,'$_GET[LCT_DESCRICAO]',NOW(),'$dataPagamento', '$dataVencimento', $valorPago,$valorTitulo,$_GET[LCT_JUROSDIA],$parcelas,'$_GET[LCT_STATUSLANC]','$_GET[LCT_TIPO]','$_GET[LCT_FRMPAG]',$_GET[CAT_COD],$_GET[CLI_COD],$_GET[CNT_COD],$cod)";

		if (mysqli_query($conecta, $cSql)){

			$cSql = "SELECT * from LANCAMENTO WHERE LCT_COD = ".mysqli_insert_id($conecta);

			$cSql = str_replace("''","NULL", $cSql);

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

		mysqli_free_result($result);
		mysqli_close($conecta);


	}


	

//localhost/beardsbucket/sistema/src/CrudLancamento.php?funcao=insereLancamento&LCT_DESCRICAO=Teste&LCT_DTPAG=2017-01-01&LCT_DTVENC=2017-01-01&LCT_VLRPAGO=20.00&LCT_VLRTITULO=20.00&LCT_JUROSDIA=null&LCT_NPARC=5&LCT_STATUSLANC=Pago&LCT_TIPO=Despesa&LCT_FRMPAG=Dinheiro&CAT_COD=1&CLI_COD=1&CNT_COD=1

}

?>