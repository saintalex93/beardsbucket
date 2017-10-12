<?php 
require 'conecta.php';
session_start();
$cod =  $_SESSION['user']['id'];

//INSERE CATEGORIA

if($_GET['funcao'] == 'insereCategoria'){
	$cSql = "INSERT INTO CATEGORIA VALUES (0,'$_GET[categoriaNome]',$_GET[categoriaStatus],$_GET[cmbEmpresa])";

	$cSql = str_replace("''","NULL", $cSql);

	echo $cSql;

	if(mysqli_query($conecta,$cSql)){

		$cSql = "SELECT DISTINCT CAT_NOME,CAT_COD, CAT_STATUS, EMP_NOME_EMPRESA  FROM EMPRESA JOIN CATEGORIA ON COD_EMPRESA = EMP_COD AND EMP_COD IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod)";

		$result = mysqli_query($conecta,$cSql);

		$json_array = array();

		while ($row = mysqli_fetch_assoc($result)){

			$json_array[] = $row;
		}

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

	}
	else
		echo "Erro ao inserir categoria";
}
else if($_GET['funcao'] == 'comboConta'){


	$cSql = "SELECT DISTINCT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN
	EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = $cod order by (EMP_NOME_EMPRESA) asc;";

	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  


	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              


}



?>