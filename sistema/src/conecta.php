<?php

// $db_host        = '192.185.176.17';
// $db_user        = 'numbe874_beardsw';
// $db_pass        = 'BeardsWeb666';
// $db_database    = 'numbe874_BUCKET'; 
// $db_port        = '3306';

// $conecta = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port);
	
	// $conecta = mysqli_connect('localhost', 'bucket', '123', 'BUCKET');
	// mysqli_set_charset($conecta, "utf8");


	// $desconecta = mysqli_close($oConn);

$conecta = mysqli_connect("192.185.176.17", "numbe874_beardsw", "BeardsWeb666", "numbe874_BUCKET");

if (!$conecta) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


	mysqli_set_charset($conecta, "utf8");


?>