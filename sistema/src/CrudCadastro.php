<?php 
require 'conecta.php';
session_start();
$cod =  $_SESSION['user']['id'];

//INSERE CATEGORIA

if($_GET['funcao'] == 'insereCategoria'){
	$cSql = "INSERT INTO CATEGORIA VALUES (0,'$_GET[categoriaNome]','$_GET[categoriaStatus]','$_GET[cmbEmpresaCat]')";


	$cSql = str_replace("''","NULL", $cSql);

	if(mysqli_query($conecta,$cSql)){

		$cSql = "SELECT DISTINCT EMP_COD,CAT_COD,CAT_NOME, CAT_STATUS, EMP_NOME_EMPRESA, IF(CAT_STATUS = 1,REPLACE(CAT_STATUS,1,'Ativo'),REPLACE(CAT_STATUS,0,'Inativo')) as CAT_STATUSDESC  FROM EMPRESA JOIN CATEGORIA ON COD_EMPRESA = EMP_COD AND EMP_COD IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod)";


		$result = mysqli_query($conecta,$cSql);

		$json_array = array();

		while ($row = mysqli_fetch_assoc($result)){

			$json_array[] = $row;
		}

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

	}
	else
		echo "Erro ao Inserir Categoria";
}
// FIM DO INSERE CATEGORIA

//BUSCA CATEGORIA POR EMPRESA

else if($_GET['funcao']=="buscaCategoriaEmpresa"){

	$cSql ="SELECT DISTINCT CAT_COD, CAT_NOME,EMP_NOME_EMPRESA,EMP_COD,IF(CAT_STATUS = 1,REPLACE(CAT_STATUS,1,'Ativo'),REPLACE(CAT_STATUS,0,'Inativo')) as CAT_STATUSDESC FROM CATEGORIA INNER JOIN EMPRESA ON EMP_COD= COD_EMPRESA WHERE EMP_COD = $_GET[cmbEmpresaCat]";

	$cSql = str_replace("''","NULL", $cSql);

	$result = mysqli_query($conecta,$cSql);

	$json_array = array();

	while($row = mysqli_fetch_assoc($result)){

		$json_array[] = $row;

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
	}


}
//FIM DO BUSCA CATEGORIA POR EMPRESA


//ATUALIZA CATEGORIA
else if($_GET['funcao'] == 'atualizaCategoria'){

	$cSql = "UPDATE CATEGORIA SET CAT_NOME = '$_GET[categoriaNome]' , CAT_STATUS = $_GET[categoriaStatus], COD_EMPRESA = $_GET[cmbEmpresaCat] WHERE CAT_COD = $_GET[categoriaCod]";

	echo $cSql;

}
//FIM DO ATUALIZA CATEGORIA

//COMBO CARREGA EMPRESAS
else if($_GET['funcao'] == 'comboCadastro'){


	
	$cSql = "SELECT DISTINCT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = $cod order by (EMP_NOME_EMPRESA) asc";

	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  


	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              


}    




?>