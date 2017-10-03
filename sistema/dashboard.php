<?php include_once('superior.php');?>


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
                                <div class="numbers">
                                    <p>Receita</p>
                                    <p class="valores" id="receita"></p>
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
                                <div class="numbers">
                                    <p>Despesas</p>
                                    <p class="valores" id="despesas"></p>
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
            
        </div>
    </div>

    <div class="row">

      <div class="row">

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


    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>
        Despesas
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
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
                for($nCont = 0; $nCont<=10; $nCont++){

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
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i>
    Receitas
</div>
<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
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
            for($nCont = 0; $nCont<=10; $nCont++){

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


<!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

<!-- Scroll to Top Button -->






</div>

<script src="js/ajaxConsultaDashboard.js"></script>
<script src="js/ajaxConsultaDespesaDashboard.js"></script>
<script src="js/ajaxConsultaCaixaDashboard.js"></script>




<?php include_once('inferior.php');?>
