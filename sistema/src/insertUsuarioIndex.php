<?php

require 'conecta.php';



mysqli_query($conecta, $cSql);



CONEXAO

PEGAR OS VALORES

INSERIR / Retorna o código


CONSULTAR o código retornado.


$ultimoCodigoInserido = mysqli_insert_id($conecta);

$csql= INSERT INTO uSUARIO VALUES (0, 'Diego', 'loginDiego', 'senhaDiego', 'emailDiego',2,1);

if(mysqli_query($conecta, $cSql)){

	$ultimoCodigoInserido = mysqli_insert_id($conecta);


	header('location: index2.php?cod='.$ultimoCodigoInserido);


}
else
	echo mysqli_error($conecta);







// 
// 
// 
// 




$codUsuario = $_get['cod'];





insert into empresa values(0,0,0,0,0,0,0,0,$cod)

$ultimoCodigoInseridoEmpresa = mysqli_insert_id($conecta);

insert into conta values(0,0,0,0,0,0,0,0,$ultimoCodigoInseridoEmpresa)

?>