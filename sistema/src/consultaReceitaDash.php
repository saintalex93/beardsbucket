<?php   
	session_start();

	$connect = mysqli_connect("localhost", "root", "123", "BUCKET");  
	$sql = "SELECT LCT_VLRPAGO FROM LANCAMENTO WHERE LCT_TIPO = 'RECEITA'";  
	// WHERE LCT_DTCADASTR BETWEEN '2017-09-25' AND '2017-09-26'

	$result = mysqli_query($connect, $sql); 
	
	$json_array = array();  
	while($row = mysqli_fetch_assoc($result))  
	{  
		$json_array[] = $row;  
	}  


	echo json_encode($json_array);

// mysqli_free_result($row);

// mysqli_close($connect);
?>  	
