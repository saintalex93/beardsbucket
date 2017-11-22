<?php 
session_start();
require 'conecta.php';
$cod =  $_SESSION['user']['id'];

//INSERE CATEGORIA
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CATEGORIA///////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

if($_GET['funcao'] == 'insereCategoria'){
	$cSql = "INSERT INTO CATEGORIA VALUES (0,'$_GET[categoriaNome]','$_GET[categoriaStatus]','$_GET[cmbEmpresaCat]')";


	$cSql = str_replace("''","NULL", $cSql);

	if(mysqli_query($conecta,$cSql)){

		$codCategoria = mysqli_insert_id($conecta);


		$cSql = "SELECT DISTINCT CAT_NOME,EMP_COD,CAT_COD, CAT_STATUS, EMP_NOME_EMPRESA, 
		IF(CAT_STATUS = 1,REPLACE(CAT_STATUS,1,'Ativo'),REPLACE(CAT_STATUS,0,'Inativo')) as CAT_STATUSDESC 
		FROM EMPRESA JOIN CATEGORIA ON COD_EMPRESA = EMP_COD where CAT_COD = $codCategoria";




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
//ATUALIZA CATEGORIA
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CATEGORIAS///////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //


else if($_GET['funcao'] == 'atualizaCategoria'){

	$cSql = "UPDATE CATEGORIA SET CAT_NOME = '$_GET[categoriaNome]' , CAT_STATUS = $_GET[categoriaStatus], COD_EMPRESA = $_GET[cmbEmpresaCat] WHERE CAT_COD = $_GET[categoriaCod]";

	$cSql = str_replace("''","NULL", $cSql);

	
	if(mysqli_query($conecta,$cSql)){
		

		$cSql = "SELECT DISTINCT CAT_NOME,CAT_COD,EMP_NOME_EMPRESA,CAT_STATUS,EMP_COD,IF(CAT_STATUS = 1,REPLACE(CAT_STATUS,1,'Ativo'),REPLACE(CAT_STATUS,0,'Inativo')) as CAT_STATUSDESC FROM CATEGORIA INNER JOIN EMPRESA ON EMP_COD= COD_EMPRESA WHERE EMP_COD = $_GET[cmbEmpresaCat] and CAT_COD = $_GET[categoriaCod]";

		$result = mysqli_query($conecta,$cSql);

		$json_array = array();

		while ($row = mysqli_fetch_assoc($result)){

			$json_array[] = $row;
		}

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              

	}
	else
		echo "Erro ao Atualizar";
}




//FIM DO ATUALIZA CATEGORIA



//BUSCA CATEGORIA POR EMPRESA
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ////////////////////////////////BUSCA CATEGORIAS DE DETERMINADAS EMPRESA/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

else if($_GET['funcao']=="buscaCategoriaEmpresa"){

	$cSql ="SELECT DISTINCT CAT_NOME,CAT_COD,EMP_NOME_EMPRESA,CAT_STATUS,EMP_COD,IF(CAT_STATUS = 1,REPLACE(CAT_STATUS,1,'Ativo'),REPLACE(CAT_STATUS,0,'Inativo')) as CAT_STATUSDESC FROM CATEGORIA INNER JOIN EMPRESA ON EMP_COD= COD_EMPRESA WHERE EMP_COD = $_GET[cmbEmpresaCat]";

	$cSql = str_replace("''","NULL", $cSql);

	$result = mysqli_query($conecta,$cSql);

	$json_array = array();

	while($row = mysqli_fetch_assoc($result)){

		$json_array[] = $row;

	}
	
	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
	


}
//FIM DO BUSCA CATEGORIA POR EMPRESA




//COMBO CARREGA EMPRESAS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////COMBO DE EMPRESAS/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if($_GET['funcao'] == 'comboCadastro'){


	
	$cSql = "SELECT DISTINCT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = $cod AND EMP_STATUS = 1 order by (EMP_NOME_EMPRESA) asc";

	
	$result = mysqli_query($conecta, $cSql);

	while($row = mysqli_fetch_assoc($result))
	{  
		$json_array[] = $row;  
	}  


	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);              


}
//INSERE CLIENTE E FORNECEDOR
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CLIENTES FORNECEDOR/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if ($_GET['funcao'] == 'insereCliForn'){

	$cSql = "INSERT INTO CLIENTE VALUES (0, '$_GET[cadCliFornName]', '$_GET[cadCliFornTipo]', '$_GET[cadCliFornCNPJCPF]', '$_GET[cadCliFornTel]', '$_GET[cadCliFornEmail]','$_GET[cadCliFornBanco]','$_GET[cadCliFornAg]','$_GET[cadCliFornConta]','$_GET[cadCliFornTipoConta]', $_GET[cadCliFornStatus], $_GET[cmbEmpresaSelecao])";


	
	$cSql = str_replace("''","NULL", $cSql);

	if(mysqli_query($conecta,$cSql)){
		$codCliente = mysqli_insert_id($conecta);

		$cSql = "SELECT DISTINCT CLI_NOME,CLI_COD, IFNULL(CLI_TIPO, '') AS CLI_TIPO , IFNULL(CLI_CPF_CNPJ, '') AS  CLI_CPF_CNPJ, IFNULL(CLI_TELEFONE, '') AS CLI_TELEFONE, IFNULL(CLI_EMAIL, '') AS  CLI_EMAIL, IFNULL(CLI_BANCO, '') AS  CLI_BANCO, IFNULL(CLI_AGENCIA, '') AS  CLI_AGENCIA, IFNULL(CLI_CONTA, '') AS  CLI_CONTA,CLI_TIPOCONTA,IF(CLI_STATUS = 1,REPLACE( CLI_STATUS,1,'Ativo'),REPLACE( CLI_STATUS,0,'Inativo')) as CLI_STATUSDESC,CLI_STATUS,EMP_COD,EMP_NOME_EMPRESA FROM CLIENTE INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE CLI_COD = $codCliente";

		$result = mysqli_query($conecta,$cSql);

		$json_array = array();

		while ($row = mysqli_fetch_assoc($result)) {

			$json_array[] = $row;	

		}

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
	}
	
	else
		echo "Erro ao inserir Cliente ou Fornecedor";

}    
//FIM DO INSERE CLIENTE E FORNECEDOR

//ATUALIZA DADOS CLIENTE FORNECEDOR
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CLIENTES FORNECEDOR/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

else if ($_GET['funcao'] == 'atualizaClientesFornecedor'){

	$cSql = "UPDATE CLIENTE SET CLI_NOME = '$_GET[cadCliFornName]',CLI_TIPO = '$_GET[cadCliFornTipo]', CLI_CPF_CNPJ = '$_GET[cadCliFornCNPJCPF]',CLI_TELEFONE = '$_GET[cadCliFornTel]',CLI_EMAIL = '$_GET[cadCliFornEmail]', CLI_BANCO = '$_GET[cadCliFornBanco]', CLI_AGENCIA = '$_GET[cadCliFornAg]', CLI_CONTA = '$_GET[cadCliFornConta]', CLI_TIPOCONTA = '$_GET[cadCliFornTipoConta]', CLI_STATUS = $_GET[cadCliFornStatus], COD_EMPR = $_GET[cmbEmpresaSelecao] WHERE CLI_COD = $_GET[cadastroCliFornCod]";

	$cSql = str_replace("''","NULL", $cSql);

	if (mysqli_query($conecta,$cSql)) {

		$cSql = "SELECT DISTINCT CLI_NOME,CLI_COD, IFNULL(CLI_TIPO, '') AS CLI_TIPO , IFNULL(CLI_CPF_CNPJ, '') AS  CLI_CPF_CNPJ, IFNULL(CLI_TELEFONE, '') AS CLI_TELEFONE, IFNULL(CLI_EMAIL, '') AS  CLI_EMAIL, IFNULL(CLI_BANCO, '') AS  CLI_BANCO, IFNULL(CLI_AGENCIA, '') AS  CLI_AGENCIA, IFNULL(CLI_CONTA, '') AS  CLI_CONTA,CLI_TIPOCONTA,IF(CLI_STATUS = 1,REPLACE( CLI_STATUS,1,'Ativo'),REPLACE( CLI_STATUS,0,'Inativo')) as CLI_STATUSDESC,CLI_STATUS,EMP_COD,EMP_NOME_EMPRESA FROM CLIENTE INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE CLI_COD = $_GET[cadastroCliFornCod]";

		$result = mysqli_query($conecta,$cSql);

		$json_array = array();

		while ($row = mysqli_fetch_assoc($result)){

			$json_array[]=$row;

		}

		echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
	}
	else{
		echo "Erro ao Atualizar";
	}
}

//FIM DO ATUALIZA DADOS CLIENTE FORNECEDOR


//BUSCA CLIENTE FORNECEDOR
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////BUSCA CLIENTE FORNECEDOR/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if($_GET['funcao'] == 'buscaClienteFornecedor'){

	$cSql = "SELECT DISTINCT CLI_NOME,CLI_COD, IFNULL(CLI_TIPO, '') AS CLI_TIPO , IFNULL(CLI_CPF_CNPJ, '') AS  CLI_CPF_CNPJ, IFNULL(CLI_TELEFONE, '') AS CLI_TELEFONE, IFNULL(CLI_EMAIL, '') AS  CLI_EMAIL, IFNULL(CLI_BANCO, '') AS  CLI_BANCO, IFNULL(CLI_AGENCIA, '') AS  CLI_AGENCIA, IFNULL(CLI_CONTA, '') AS  CLI_CONTA,CLI_TIPOCONTA,IF(CLI_STATUS = 1,REPLACE( CLI_STATUS,1,'Ativo'),REPLACE( CLI_STATUS,0,'Inativo')) as CLI_STATUSDESC,CLI_STATUS,EMP_COD,EMP_NOME_EMPRESA FROM CLIENTE INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE EMP_COD = $_GET[cmbEmpresaFiltro]";


	$result = mysqli_query($conecta,$cSql);

	$json_array = array();

	while ($row = mysqli_fetch_assoc($result)) {
		
		$json_array[] = $row;

	}

	echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
}

//FIM DO BUSCA CLIENTE FORNECEDOR

?>