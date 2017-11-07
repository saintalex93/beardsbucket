<?php 
session_start();
include_once('superior.php');

require 'src/conecta.php';

$cod =  $_SESSION['user']['id'];

?>


<div class="content">
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-12 col-md-12">
        <div class="card">
         <div class="text-center">
          <img src="img/beards.png" alt="" id="imagemRelatório">
        </div>
        <div class="header">
          <h4 class="title text-center">Pesquisa por Intervalo: </h4>
        </div>

        <div class="content">
          <div class="pesquisa">

            <div class="col-md-12 text-center">
              <div class="radio">
                <label>Vencimento</label>
                <input type="radio" name="RdDatas" id="RdDatas" value="LCT_DTVENC" checked>
              </div>

              <div class="radio">
                <label>Pagamento / Recebimento</label>
                <input type="radio" name="RdDatas" id="RdDatas" value="LCT_DTPAG">
              </div>

              <div class="radio">
                <label>Cadastro</label>
                <input type="radio" name="RdDatas" id="RdDatas" value="LCT_DTCADASTR">
              </div>
            </div>
            <div class="row text-center">

              <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                  <select name="" id="intervaloPesquisa" class="form-control border-input" onchange="datas(this.selectedIndex)">
                    <option value="atual">Data Atual</option>
                    <option value="semanal">Semanal</option>
                    <option value="mensal">Mensal</option>
                    <option value="anual">Anual</option>
                    <option value="personalizado">Personalizado</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row" id="datas">
              <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                  <label>Data Inicial</label>
                  <input type="date" class="form-control border-input" id="dataInicialRelatorio">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Data Final</label>
                  <input type="date" class="form-control border-input" id="dataFinalRelatorio">
                </div>
              </div>

            </div>

            <div class="row">
              <div class="header">
                <h4 class="title text-center">
                  Filtros
                </h4>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Empresa</label>
                  <select name="" id="cmbEmpresa" class="form-control border-input" onchange="atualizaCombos(this.value)">
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Conta</label>
                  <select name="" id="cmbConta" class="form-control border-input" >
                    <option value="">Todas</option>

                    <option value=""></option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Cliente / Fornecedor</label>
                  <select name="" id="cmbCliente" class="form-control border-input">
                    <option value="">Todas</option>

                    <option value=""></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Categoria</label>
                  <select name="" id="cmbCategoria" class="form-control border-input">
                    <option value="">Todas</option>
                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Tipo</label>
                  <select name="" id="cmbTipo" class="form-control border-input">
                    <option value="null">Todas</option>
                    <option value="Despesa">Despesa</option>
                    <option value="Receita">Receitas</option>

                  </select>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="" id="cmbStatus" class="form-control border-input">
                    <option value="null">Todas</option>
                    <option value="Pago - Recebido">Pagas - Recebidas</option>
                    <option value="A Pagar - Receber">A Pagar - A Receber</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="text-center">
                <button type="submit" class="btn btn-info btn-fill btn-wd" value="1" id="" onclick="consultar()">Consultar</button>
              </div>

              <div class="form-group">
                <output type="text" class="text-center" id="retornoFormRelatorio">Teste</output>
              </div>
            </div>
          </div>

          

          <div class="table-responsive">
            <table class="table table-bordered table-striped text-center "  id="tableRelatorio" cellspacing="0">
              <thead>
                <tr>
                  <th hidden>Código</th>
                  <th>Empresa</th>
                  <th id='relatorio'>Conta</th>
                  <th>Cliente</th>
                  <th id='relatorio'>Banco</th>
                  <th id='relatorio'>Agência</th>
                  <th id='relatorio'>Conta</th>
                  <th id='relatorio'>Tipo</th>
                  

                  <th>Descrição</th>
                  <th>Tipo</th>
                  <th>Categoria</th>
                  <th id='relatorio' >Forma</th>
                  <th>Vencimento</th>
                  <th id='relatorio'>Pagamento</th>
                  <th id='relatorio' >Cadastro</th>
                  <th>Valor Título</th>
                  <th>Valor Pago</th>
                  <th>Status</th>
                  <th>Usuário</th>

                </tr>
              </thead>

              <tbody id="tbodyRelatorio">

               <?php


               $cSql = "SELECT LCT_COD, EMP_NOME_EMPRESA, CNT_NOME, CLI_NOME, CLI_BANCO, CLI_AGENCIA, CLI_CONTA, CLI_TIPOCONTA, LCT_DESCRICAO, DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') AS LCT_DTVENC,
               DATE_FORMAT(LCT_DTCADASTR, '%d/%m/%Y') AS LCT_DTCADASTR, IFNULL(DATE_FORMAT(LCT_DTPAG, '%d/%m/%Y'),'') AS LCT_DTPAG,CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, 
               IFNULL(CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) , 'R$ 0,00' ) AS LCT_VLRPAGO, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, CAT_NOME, USR_NOME, 
               LCT_NPARC, IFNULL(LCT_JUROSDIA, 0) AS LCT_JUROSDIA
               FROM LANCAMENTO INNER JOIN CONTA ON LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR
               INNER JOIN CATEGORIA ON CATEGORIA.CAT_COD = LANCAMENTO.CAT_COD INNER JOIN CLIENTE ON CLIENTE.CLI_COD = LANCAMENTO.CLI_COD
               INNER JOIN USUARIO ON USUARIO.USR_COD = LANCAMENTO.USR_COD 
               WHERE EMPRESA.EMP_COD IN (SELECT USR_EMPR.COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod) AND DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d') = CURRENT_DATE() ORDER BY EMP_NOME_EMPRESA ASC, LCT_DTVENC DESC";


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
              
            </tbody>
          </table>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd" value="1" id="btnImprimir" onclick="window.print()">Imprimir</button>
        </div>

      </div> <!--COntent --> 
    </div> <!-- Card -->
  </div> <!--COL -->

</div> <!--FINAL ROW -->

</div> <!--FLUID -->
</div> <!--CONTENT -->


<?php include_once('inferior.php');?>
<script src = 'js/CrudAjaxRelatorio.js'></script>