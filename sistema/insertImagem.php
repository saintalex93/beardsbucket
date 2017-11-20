<?php
session_start();
include_once('superior.php');
require 'src/conecta.php';


$cod =  $_SESSION['user']['id'];


$cSql = "SELECT USR_COD, USR_SENHA, USR_LOGIN, USR_NOME, USR_EMAIL, IF(USR_STATUS = 1, REPLACE(1, USR_STATUS, 'Ativo'), REPLACE(0, USR_STATUS, 'INATIVO')) AS  USR_STATUS,
IF(USR_PERMISSAO = 0, REPLACE(0, USR_PERMISSAO, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USUARIO where USR_COD =".$cod;


$dataSet = mysqli_query($conecta, $cSql);

if($oDados = mysqli_fetch_assoc($dataSet)){
    $SENHA =  $oDados['USR_SENHA'];
    $PERMISSAO =  $oDados['USR_PERMISSAO'];
    $NOME =  $oDados['USR_NOME'];
    $LOGIN =  $oDados['USR_LOGIN'];
    $EMAIL =  $oDados['USR_EMAIL'];
    $STATUS = $oDados['USR_STATUS'];
    
}

?>
    <?php
    
    $imagem = $_FILES['foto']['name'];
    $codigo = $_POST['codigo'];
    
     $oConn = mysqli_connect('localhost', 'bucket', '123', 'BUCKET') or die ('Deu ruim');    
    
    $cSQL ="update USUARIO set USR_FOTO = '".$imagem."' where USR_COD =". $codigo ;
   
  
    
    if(mysqli_query($oConn, $cSQL))
{

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $_FILES['foto']['name'])){
       // echo 'ok';
        echo "('<script>document.location.href=\"usuario.php\"</script>')";
    }
    else{
        echo 'nao gravou';
    }
        
}
    else{
        echo 'não funcionou nada';
    }
            mysqli_close($oConn); 
    
    
     ?>
</body>

</html>
