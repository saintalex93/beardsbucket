
<script>
        function loginsuccessfally(){
            setTimeout("window.location='.././index.htm'", 0);
        }
   
    
    </script>


<?php

require 'conecta.php';

$nome = $_POST['nomeCadastro'];
$login = $_POST['loginCadastro'];
$senha = $_POST['senhaCadastro'];
$email = $_POST['emailCadastro'];

$nomeEmpresa = $_POST['nomeEmpresaCadastro'];
$cnpjEmpresa = $_POST['cnpjEmpresaCadastro'];

$nomeConta = $_POST['nomeContaCadastro'];
$bancoConta = $_POST['bancoContaCadastro'];
$bancoAgencia = $_POST['agenciaContaCadastro'];
$numeroConta = $_POST['numeroContaCadastro'];
$tipoConta=$_POST['tipoContaCadastro'];
$saldoConta = $_POST['saldoContaCadastro'];

$cSQL = "INSERT into USUARIO(USR_SENHA,USR_LOGIN,USR_NOME,USR_EMAIL,USR_PERMISSAO,USR_STATUS)values('$senha','$login','$nome','$email',1,1)";

/*echo $cSQL . '</br>';*/


$dados= mysqli_query($conecta, $cSQL);
$codUsuario = mysqli_insert_id($conecta);
/*echo $codUsuario . '</br>';*/



$cSQL = "INSERT INTO EMPRESA (EMP_COD,EMP_NOME_EMPRESA,EMP_CNPJ,EMP_STATUS)VALUES(0,'$nomeEmpresa', '$cnpjEmpresa',1)";

/*echo $cSQL . '</br>';*/
$dados= mysqli_query($conecta, $cSQL);
$codEmpresa = mysqli_insert_id($conecta);
/*echo $codEmpresa . '</br>';*/



$cSQL = "INSERT INTO USR_EMPR(COD_USR_EMPR,COD_USR,COD_EMPR) VALUES(0,$codUsuario,$codEmpresa)";
//FOREIGN KEY(COD_USR) REFERENCES USUARIO (USR_COD),
//FOREIGN KEY(COD_EMPR) REFERENCES EMPRESA (EMP_COD)
$dados= mysqli_query($conecta, $cSQL);


$saldoConta = str_replace("R$","", $saldoConta);
$saldoConta = str_replace(".","", $saldoConta);
$saldoConta = str_replace(",",".", $saldoConta);
$cSQL = "INSERT INTO CONTA (CNT_COD,CNT_NOME,CNT_BANCO,CNT_AGNC,CNT_NMCONTA,CNT_TIPO,CNT_STATUS,CNT_SALDOINICIAL,COD_EMPR) VALUES(0, '$nomeConta', '$bancoConta', '$bancoAgencia', '$numeroConta', '$tipoConta',1,$saldoConta,$codEmpresa)";

echo $cSQL;

/*echo $cSQL . '</br>';*/
$dados= mysqli_query($conecta, $cSQL);

// $codConta = mysqli_insert_id($conecta);
/*echo $codConta . '</br>';*/
// echo $cSQL;
echo "<script>loginsuccessfally()</script>";
mysqli_close($conecta);

?>


