<?php include_once('superior.php');
require "src/conecta.php";

$cod =  $_SESSION['user']['id'];

?>
<div class="col-md-6 col-md-offset-3 text-center">
    <div class="form-group">

        <select class="form-control border-input" id="cmbEmpresaSelecao" name="cmbEmpresaSelecao" onchange="buscaReceita(this.value,<?php echo $cod;?>);buscaDespesa(this.value,<?php echo $cod;?>);caixaDash(this.value,<?php echo $cod;?>)">
            <label for=""><span id = "cmpObrgt">* </span>Empresa</label>
            <option value="">Selecione...</option>

            <!-- ///////////////////////////////////////////////////// CARREGA EMPRESAS //////////////////////////////////////////////////////// -->
            <?php 
            $cSql = "SELECT DISTINCT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ FROM USUARIO INNER JOIN USR_EMPR ON USUARIO.USR_COD = USR_EMPR.COD_USR INNER JOIN EMPRESA ON EMPRESA.EMP_COD = USR_EMPR.COD_EMPR WHERE COD_USR = $cod order by (EMP_NOME_EMPRESA) asc";


            $result = mysqli_query($conecta, $cSql);
            while($row = mysqli_fetch_assoc($result)){

                ?>
                <!-- ////////////////////////////////// METADE DO WHILE ////////////////////////////////////////////// -->

                <option value="<?php echo $row['EMP_COD'];?>"><?php echo $row['EMP_NOME_EMPRESA'];?></option>

                <!-- ////////////////////////////////////////////CONTINUANDO WHILE ////////////////////////////////////////////////-->      
                <?php
            }

            ?>
            <!-- ////////////////////////////////////////////FIM DO CARREGA EMPRESA ////////////////////////////////////////////////-->      

        </select>
        
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-center">
                                    <i class="ti-server"></i>
                                </div>
                            </div>

                            <div class="col-xs-7">

                                <div class="numbers" id="receita">
                                    <p >Receita</p>
                                    


                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-reload"></i> Relatório
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-wallet"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers" id="despesa">
                                <p>Despesas</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-calendar"></i> Relatório
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-pulse"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Caixa</p>
                                <p class="valores" id="caixa"></p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="ti-timer"></i> Relatório
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ROW DASHCAIXAS -->

    <div class="row">

        <div class="content">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Demonstrativos</h4>
                        <p class="category">Gráfico de recebimentos</p>
                    </div>
                    <div class="content">
                        <p>Gráfico</p>
                        <div id="chartHours" class="ct-chart"></div>
                        <div class="footer">
                            <div class="chart-legend">
                                <i class="fa fa-circle text-info"></i> Receitas
                                <i class="fa fa-circle text-danger"></i> Despesas
                                <!-- <i class="fa fa-circle text-warning"></i> Click Second Time -->
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="ti-reload"></i> Atualizado há 3 minutos
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--ROW GRÁFICO-->

    <div class="row"> <!-- DESPESAS -->

        <div class="content">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Despesas</h4>
                    </div>
                    <div class="content">
                       <div class="table-responsive">
                          <table class="table table-bordered table-striped text-center " width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                    <th>Data Vencimento</th>
                                    <th>Juros</th>
                                    <th>Valor Atual</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                for($nCont = 0; $nCont<=5; $nCont++){

                                    echo "

                                    <tr>
                                    <td>$nCont</td>
                                    <td>Eletropaulo</td>
                                    <td>R$ 8.000,00</td>
                                    <td>21/02/2017</td>
                                    <td>0.1%</td>
                                    <td>8.010,00</td>
                                    </tr>
                                    ";

                                }

                                ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!--ROW DESPESAS -->

<div class="row">

    <div class="content">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Receitas</h4>
                </div>
                <div class="content">
                   <div class="table-responsive">
                      <table class="table table-bordered table-striped text-center " width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Data Vencimento</th>
                                <th>Juros</th>
                                <th>Valor Atual</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            for($nCont = 0; $nCont<=5; $nCont++){

                                echo "

                                <tr>
                                <td>$nCont</td>
                                <td>Eletropaulo</td>
                                <td>R$ 8.000,00</td>
                                <td>21/02/2017</td>
                                <td>0.1%</td>
                                <td>8.010,00</td>
                                </tr>
                                ";

                            }

                            ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!--ROW DESPESAS -->


</div> <!-- CONTENT -->
</div> <!-- FLUID -->



<!-- <script src="js/ajaxConsultaDashboard.js"></script>
<script src="js/ajaxConsultaDespesaDashboard.js"></script>
<script src="js/ajaxConsultaCaixaDashboard.js"></script> -->

<script src="js/CrudAjaxDashboard.js"></script>
<script src = "js/jquery.maskMoney.min.js"></script>
<script>
    $("#vlrDespesa").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
</script>
<script>
    $("#vlrReceita").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
    
</script>
<script>
    $("#vlrCaixa").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});    
</script>



<?php include_once('inferior.php');?>
