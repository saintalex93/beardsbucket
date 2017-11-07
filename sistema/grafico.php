<?php 
  session_start();

  if( !isset($_SESSION['user']) )
  {

    exit;
  }
  require "src/conecta.php";

  $cod =  $_SESSION['user']['id'];

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Grafico Beards</title>
</head>
<body>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Mês', 'Receitas', 'Despesas'],

        <?php
        $cod_emp = $_GET['codEmpresa'];
        $anoAtual = date('Y');

        $mes = array();
        $mes[] = "Mes";

        $mes[] = "Jan";
        $mes[] = 'Fev';
        $mes[] = 'Mar';
        $mes[] ='Abr';
        $mes[] ='Mai';
        $mes[] ='Jun';
        $mes[] ='Jul';
        $mes[] ='Ago';
        $mes[] ='Set';
        $mes[] ='Out';
        $mes[] ='Nov';
        $mes[] ='Dez';
        


        for($i=1; $i<13; $i++){



        if(isset($cod_emp) && $cod_emp == 0 ){

          $cSql = "SELECT (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 'Receita' AND  DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')
          BETWEEN '$anoAtual-$i-01' AND '$anoAtual-$i-31') AS RECEITA, 
          (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO  INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 'Despesa' AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')
          BETWEEN '$anoAtual-$i-01' AND '$anoAtual-$i-31') AS DESPESA";

        }

        else{

          $cSql = "SELECT (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 'Receita' AND COD_EMPR = $cod_emp AND  DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')
          BETWEEN '$anoAtual-$i-01' AND '$anoAtual-$i-31') AS RECEITA, 
          (SELECT SUM(LCT_VLRTITULO) from LANCAMENTO  INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMP_COD = COD_EMPR  WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND LCT_TIPO = 'Despesa' AND COD_EMPR = $cod_emp AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d')
          BETWEEN '$anoAtual-$i-01' AND '$anoAtual-$i-31') AS DESPESA";
          
        }

          $result = mysqli_query($conecta, $cSql);

          while($row = mysqli_fetch_assoc($result))
          {  
           if($row['DESPESA'] == "")
             $desp = 0.00;
           else 
            $desp = $row['DESPESA'];

          if($row['RECEITA'] == "")
            $recei = 0.00;
          else 
            $recei = $row['RECEITA'];



          echo "['$mes[$i]',   $recei,      $desp],";


        }  

      }

      ?>




      ]);

      var options = {
        title: 'Detalhes Anuais',
        hAxis: {title: 'Mês',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
      };

      var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>



  <div id="chart_div" style="width: 100%; height: 500px;"></div>

</body>
</html>