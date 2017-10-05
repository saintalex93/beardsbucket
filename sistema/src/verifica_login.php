

<?php   

header("Content-type: text/html; charset=utf-8"); 

$login = $_GET['usuario'];

		//Recupera a senha
$senha = $_GET['senha'];


$connect = mysqli_connect("localhost", "bucket", "123", "BUCKET");  
mysqli_set_charset($connect, "utf8");
$sql = "SELECT * FROM USUARIO WHERE USR_LOGIN = '$login'"; 


$result = mysqli_query($connect, $sql);  
$json_array = array(); 

if($row = mysqli_fetch_assoc($result))  
{  
	$json_array[] = $row;  
}  

// echo json_encode($json_array);

		/*echo '<pre>';  
		print_r(json_encode($json_array));  
		echo '</pre>';*/ 

		if (sizeof($json_array)<1){
			
			echo $response["fail"] = 0;
		}

		else if (str_replace(['"'], "",json_encode($json_array[0]['USR_SENHA'])) != $senha)
			echo $response["fail"] = -1;	

		else if(str_replace(['"'], "",json_encode($json_array[0]['USR_SENHA'])) == $senha && str_replace(['"'], "",json_encode($json_array[0]['USR_LOGIN'])) == $login){

			session_start();

			$user = (object)[
				'id' => $json_array[0]['USR_COD'],
				'name' => $json_array[0]['USR_NOME'],
				'username' => $json_array[0]['USR_LOGIN'],
				'permission' => $json_array[0]['USR_PERMISSAO'],
				'password' => password_hash($json_array[0]['USR_SENHA'], PASSWORD_DEFAULT)
			];

			$_SESSION['user'] = [
				'id' => $user->id,
				'name' => $user->name,
				'username' => $user->username,
				'permission' => $user->permission

			];

			
			
			echo $response["success"] = 1;
			
		}




		mysqli_close($connect);


		?>


		