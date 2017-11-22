<?php
session_start();
$cod =  $_SESSION['user']['id'];
$imagem = $_FILES['foto']['name'];


if (move_uploaded_file($_FILES['foto']['tmp_name'], "img/users/" . $cod)){
	echo "Gravou";
}
else{
    echo 'nao gravou';
}



?>
