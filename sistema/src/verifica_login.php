

<?php   

$login = $_GET['usuario'];

		//Recupera a senha
$senha = $_GET['senha'];


$connect = mysqli_connect("localhost", "root", "123", "BUCKET");  
$sql = "SELECT USR_LOGIN,USR_SENHA FROM USUARIO WHERE USR_LOGIN = '$login' AND USR_SENHA = '$senha'"; 

echo $sql; 
$result = mysqli_query($connect, $sql);  
$json_array = array(); 

if($row = mysqli_fetch_assoc($result))  
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


		