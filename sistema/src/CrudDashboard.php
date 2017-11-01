 <?php
 require "conecta.php";
 session_start();
 $cod =  $_SESSION['user']['id'];


 if($_GET['funcao'] == 'atualizaDash'){
        $primeiroDia = date('Y-m-01');
        $UltimoDia = date('Y-m-31');



        $codEmpresa = $_GET['cmbEmpresaSelecao'];
// TODOS
        if($codEmpresa==0){
                $cSql = " SELECT (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD 
                INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 
                'Receita'  AND  DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')
                BETWEEN '$primeiroDia' AND '$UltimoDia') AS RECEITA, 
                (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO  INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA 
                ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 'Despesa'  AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d') BETWEEN '$primeiroDia'
                AND '$UltimoDia') AS DESPESA, (SELECT SUM(CNT_SALDOINICIAL) FROM CONTA WHERE COD_EMPR IN 
                (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod)) AS CAIXA";

        }
        else{

// POR EMPRESA

                $cSql = " SELECT (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD 
                INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 
                'Receita'  AND COD_EMPR = $codEmpresa AND  DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')
                BETWEEN '$primeiroDia' AND '$UltimoDia') AS RECEITA, 
                (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO  INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA 
                ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 'Despesa'  AND COD_EMPR = $codEmpresa AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d') BETWEEN '$primeiroDia' AND '$UltimoDia') AS DESPESA, (SELECT SUM(CNT_SALDOINICIAL) FROM CONTA WHERE COD_EMPR =$codEmpresa) AS CAIXA;";

                

        }

        $result = mysqli_query($conecta,$cSql);



        $json_array = array();

        while($row = mysqli_fetch_assoc($result)){

                $json_array[] = $row;

        }

        echo json_encode($json_array, JSON_UNESCAPED_UNICODE);

}


?>