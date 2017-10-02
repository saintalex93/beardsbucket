<?php   
	session_start();
	
	$connect = mysqli_connect("localhost", "bucket", "123", "BUCKET");  
	$sql ="SELECT LCT_COD CODIGO, LCT_DESCRICAO DESCRICAO, FRM_PG_DESCRICAO DESCRICAO_PAGAMENTO, LCT_DTCADASTR DATA, LCT_VLRPAGO VALOR, CLI_NOME NomeCliente FROM LANCAMENTO inner join CLIENTE INNER JOIN FORMA_PAGAMENTO where CLIENTE.CLI_COD = LANCAMENTO.LCT_COD";
	 //"SELECT LCT_COD CODIGO, LCT_DESCRI DESCRICAO, LCT_DTCADASTR DATA, LCT_VLRPAGO VALOR, LCT_FRMPAG PAGAMENTO , CLI_NOME NomeCliente FROM LANCAMENTO inner join CLIENTE where CLIENTE.CLI_COD = LANCAMENTO.LCT_COD";  
	// WHERE LCT_DTCADASTR BETWEEN '2017-09-25' AND '2017-09-26'



	$result = mysqli_query($connect, $sql);  


	$json_array = array();  
	while($row = mysqli_fetch_assoc($result))  
	{  
		$json_array[] = $row;  
	}  
	/*echo '<pre>';  
	print_r(json_encode($json_array));  
	echo '</pre>';*/  
	echo json_encode($json_array);

// mysqli_free_result($row);

// mysqli_close($connect);
?>  	