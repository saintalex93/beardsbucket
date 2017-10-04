<?php   


$connect = mysqli_connect("localhost", "bucket", "123", "BUCKET");  

mysqli_set_charset($connect, "utf8");
$sql = "SELECT LCT_COD CODIGO, LCT_DESCRICAO DESCRICAO, LCT_VLRPAGO VALOR, CLI_NOME NomeCliente,
FRM_PG_DESCRICAO FROM LANCAMENTO AS LANC INNER JOIN CLIENTE AS CLI ON CLI.CLI_COD = LANC.CLI_COD INNER JOIN FORMA_PAGAMENTO AS FRMPAG ON FRMPAG.FRM_PG_COD = LANC.FORMA_PAGAMENTO";  
	

$result = mysqli_query($connect, $sql); 

$json_array = array();  
while($row = mysqli_fetch_assoc($result))  
{  
	$json_array[] = $row;  
}  


echo json_encode($json_array, JSON_UNESCAPED_UNICODE);

// mysqli_free_result($row);

// mysqli_close($connect);
?>  	

