<?php

require 'conecta.php';

 session_start();
 $cod =  $_SESSION['user']['id'];
 $dataInicial = "CURRENT_DATE()";
 $dataFinal = "CURRENT_DATE()";
 $intervaloData = "LCT_DTVENC";
 $empresa = "";
 

 $cData = " AND DATE_FORMAT($intervaloData, '%Y-%m-%d') BETWEEN $dataInicial AND $dataFinal ";

 $cSql = "SELECT LCT_COD, EMP_NOME_EMPRESA, CNT_NOME, CLI_NOME, CLI_BANCO, CLI_AGENCIA, CLI_CONTA, CLI_TIPOCONTA, LCT_DESCRICAO, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') AS LCT_DTVENC,
               DATE_FORMAT(LCT_DTCADASTR, '%d/%m/%Y') AS LCT_DTCADASTR, IFNULL(DATE_FORMAT(LCT_DTPAG, '%d/%m/%Y'),'') AS LCT_DTPAG,CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, 
               IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) , 'R$ 0,00' ) AS LCT_VLRPAGO, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, CAT_NOME, USR_NOME, 
               LCT_NPARC, IFNULL(LCT_JUROSDIA, 0) AS LCT_JUROSDIA
               FROM LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR
               INNER JOIN CATEGORIA ON CATEGORIA.CAT_COD = LANCAMENTO.CAT_COD INNER JOIN CLIENTE ON CLIENTE.CLI_COD = LANCAMENTO.CLI_COD
               INNER JOIN USUARIO ON USUARIO.USR_COD = LANCAMENTO.USR_COD 
               WHERE EMPRESA.EMP_COD IN (SELECT USR_EMPR.COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod) $cData ORDER BY EMP_NOME_EMPRESA ASC, LCT_DTVENC DESC";


               $dataSet = mysqli_query($conecta, $cSql);

               while($oDados = mysqli_fetch_assoc($dataSet)){
                echo "

                <tr>
                <td hidden>".$oDados['LCT_COD']."</td>
                <td>".$oDados['EMP_NOME_EMPRESA']."</td>
                <td id='relatorio'>".$oDados['CNT_NOME']."</td>
                <td>".$oDados['CLI_NOME']."</td>
                <td id='relatorio'>".$oDados['CLI_BANCO']."</td>
                <td id='relatorio'>".$oDados['CLI_AGENCIA']."</td>
                <td id='relatorio'>".$oDados['CLI_CONTA']."</td>
                <td id='relatorio'>".$oDados['CLI_TIPOCONTA']."</td>
                <td>".$oDados['LCT_DESCRICAO']."</td>
                <td>".$oDados['LCT_TIPO']."</td>
                <td>".$oDados['CAT_NOME']."</td>
                <td id='relatorio'>".$oDados['LCT_FRMPAG']."</td>
                <td>".$oDados['LCT_DTVENC']."</td>
                <td id='relatorio'>".$oDados['LCT_DTPAG']."</td>
                <td id='relatorio'>".$oDados['LCT_DTCADASTR']."</td>
                <td>".$oDados['LCT_VLRTITULO']."</td>
                <td>".$oDados['LCT_VLRPAGO']."</td>
                <td>".$oDados['LCT_STATUSLANC']."</td>
                <td>".$oDados['USR_NOME']."</td>

                </tr>
                ";

              }

              mysqli_free_result($dataSet);
              mysqli_close($conecta);  




              ?>