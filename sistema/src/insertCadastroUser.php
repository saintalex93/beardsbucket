<?php

$nome = $_POST['nomeCadastro'];
$login = $_POST['loginCadastro'];
$senha = $_POST['senhaCadastro'];
$email = $_POST['emailCadastro'];

$nomeEmpresa = $_POST['nomeEmpresaCadastro'];
$cnpjEmpresa = $_POST['cnpjEmpresaCadastro'];

$nomeConta = $_POST['nomeContaCadastro'];
$bancoConta = $_POST['bancoContaCadastro'];
$bancoConta = $_POST['agenciaContaCadastro'];
$numeroConta = $_POST['numeroContaCadastro'];
$tipoConta=$_POST['tipoContaCadastro'];
$saldoConta = $_POST['saldoContaCadastro'];

$conecta = mysqli_connect('localhost', 'bucket', '123', 'BUCKET');
mysqli_set_charset($conecta, "utf8");

$cSQL = "insert into USUARIO(USR_COD,USR_SENHA,USR_LOGIN,USR_NOME,USR_EMAIL,USR_PERMISSAO,USR_STATUS)values(0,'$senha','$login','$nome','$email',1,1)";

echo $oSQL . '</br>';

$Dados = mysqli_query($conecta,$oSQL);

$oSQL = "INSERT INTO EMPRESA (EMP_COD,EMP_NOME_EMPRESA,EMP_CNPJ,EMP_STATUS)VALUES(0,'$nomeEmpresa', '$cnpjEmpresa',2)";

echo $oSQL . '</br>';

$Dados = mysqli_query($conecta,$oSQL);

$oSQL = "INSERT INTO CONTA (CNT_COD,CNT_NOME,CNT_BANCO,CNT_AGNC,CNT_NMCONTA,CNT_TIPO,CNT_STATUS,CNT_SALDOINICIAL,COD_EMPR) VALUES(0, '$nomeConta', '$bancoConta', '$bancoConta', '$numeroConta', '$tipoConta',$saldoConta,1)";

echo $oSQL;

$Dados = mysqli_query($conecta,$oSQL);

mysqli_close($conecta);

?>