<?php

	$texto = $_POST['textperfil'];
	


	$oCon =mysqli_connect("localhost","bucket","123","PERFIS");

	$cSQL = "INSERT INTO CONTEUDO VALUES (0,1,'".$_FILES['fotoperfil']['type']."','$texto',NOW())";
	mysqli_query($oCon,$cSQL);

	mysqli_close($oCon);
?>