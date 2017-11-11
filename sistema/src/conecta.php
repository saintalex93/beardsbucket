<?php

$conecta = mysqli_connect('localhost', 'bucket', '123', 'BUCKET');

// $conecta = mysqli_connect("192.185.176.17", "numbe874_beardsw", "BeardsWeb666", "numbe874_BUCKET");

// if (!$conecta) {
// 	echo "Erro ao conectar com o Banco de Dados: " . mysqli_connect_error() . PHP_EOL;
// 	exit;
// }


mysqli_set_charset($conecta, "utf8");


?>