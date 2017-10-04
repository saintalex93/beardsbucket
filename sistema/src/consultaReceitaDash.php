<?php   
	session_start();

	$connect = mysqli_connect("localhost", "bucket", "123", "BUCKET");  
	$sql = "SELECT SUM(LCT_VLRPAGO) VALOR FROM LANCAMENTO WHERE CAT_COD = 2";  
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
