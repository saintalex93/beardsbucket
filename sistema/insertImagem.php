<?php
session_start();
$cod =  $_SESSION['user']['id'];
$imagem = $_FILES['foto']['name'];


if (move_uploaded_file($_FILES['foto']['tmp_name'], "img/users/" . $cod)){
    echo "<script>document.location.href='usuario.php'</script>";
}
else{
    echo 'nao gravou';
}



?>
