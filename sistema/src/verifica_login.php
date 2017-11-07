<?php 
session_start();

// header('Access-Control-Allow-Origin: *');

// header("Content-type: text/html; charset=utf-8"); 


// session_start(): Cannot send session cookie - headers already sent by (output started at /home/numbe874/beardsweb.com.br/sistema/superior.php:2) in /home/numbe874/beardsweb.com.br/sistema/superior.php on line 5

// Warning: session_start(): Cannot send session cache limiter - headers already sent (output started at /home/numbe874/beardsweb.com.br/sistema/superior.php:2) in /home/numbe874/beardsweb.com.br/sistema/superior.php on line 5

// Warning: Cannot modify header information - headers already sent by (output started at /home/numbe874/beardsweb.com.br/sistema/superior.php:2) in /home/numbe874/beardsweb.com.br/sistema/superior.php on line 9

// responseText.charAt(responseText.length-15)

require 'conecta.php';

$login = $_GET['usuario'];

		//Recupera a senha
$senha = $_GET['senha'];



$sql = "SELECT * FROM USUARIO WHERE USR_LOGIN = '$login'"; 


$result = mysqli_query($conecta, $sql);  
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

		else if (str_replace(['"'], "",json_encode($json_array[0]['USR_STATUS'])) != 1)
			echo $response["fail"] = -2;

		else if(str_replace(['"'], "",json_encode($json_array[0]['USR_SENHA'])) == $senha && str_replace(['"'], "",json_encode($json_array[0]['USR_LOGIN'])) == $login){


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




		mysqli_close($conecta);


		


		