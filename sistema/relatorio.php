<?php include_once('superior.php');?>


<div class="content">
      <div class="container-fluid">

            <div class="row">

                  <div class="col-lg-12 col-md-12">
                        <div class="card">
                              <div class="header">
                                    <h4 class="title text-center">Pesquisa por Intervalo: </h4>
                              </div>

                              <div class="content">
                                    <div class="col-md-12 text-center">

                                          <div class="radio">
                                            <label>Vencimento</label>
                                            <input type="radio" name="datas" checked>
                                      </div>

                                      <div class="radio">
                                            <label>Pagamento</label>
                                            <input type="radio" name="datas">
                                      </div>

                                      <div class="radio">
                                            <label>Cadastro</label>
                                            <input type="radio" name="datas">
                                      </div>
                                </div>
                                <div class="row text-center">

                                    <div class="col-md-4 col-md-offset-4">
                                          <div class="form-group">
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Data Atual</option>
                                                      <option value="">Semanal</option>
                                                      <option value="">Mensal</option>
                                                      <option value="">Anual</option>
                                                      <option value="">Personalizado</option>
                                                </select>
                                          </div>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                          <div class="form-group">
                                                <label>Data Inicial</label>
                                                <input type="date" class="form-control border-input" >
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <label>Data Final</label>
                                                <input type="date" class="form-control border-input">
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
                                                <label for="">Categoria</label>
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Todas</option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <label for="">Tipo</label>
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Todas</option>

                                                      <option value=""></option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Todas</option>

                                                      <option value=""></option>
                                                </select>
                                          </div>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <label for="">Empresa</label>
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Todas</option>

                                                      <option value=""></option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <label for="">Conta</label>
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Todas</option>

                                                      <option value=""></option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <label for="">Cliente / Fornecedor</label>
                                                <select name="" id="" class="form-control border-input">
                                                      <option value="">Todas</option>

                                                      <option value=""></option>
                                                </select>
                                          </div>
                                    </div>
                              </div>

                              <div class="table-responsive">
                                  <table class="table table-bordered table-striped text-center " width="100%" id="tableEmpresa" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>CNPJ</th>
                                        <th>Status</th>

                                  </tr>
                            </thead>

                            <tbody>

                             <tr>
                                   <td>01</td>
                                   <td>Teste</td>
                                   <td>66.666.666/0001-09</td>
                                   <td>Pago</td>

                             </tr>

                             <tr>
                                   <td>01</td>
                                   <td>Teste</td>
                                   <td>66.666.666/0001-09</td>
                                   <td>Pago</td>
                                   
                             </tr>
                             <tr>
                              <td>01</td>
                              <td>Teste</td>
                              <td>66.666.666/0001-09</td>
                              <td>Pago</td>
                              
                        </tr>
                        <tr>
                              <td>01</td>
                              <td>Teste</td>
                              <td>66.666.666/0001-09</td>
                              <td>Pago</td>
                              
                        </tr>

                  </tbody>
            </table>
      </div>

      <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd" value="1" onclick="" id="">Imprimir</button>

            
      </div>

</div> <!--COntent --> 
</div> <!-- Card -->
</div> <!--COL -->

</div> <!--FINAL ROW -->

</div> <!--FLUID -->
</div> <!--CONTENT -->


<?php include_once('inferior.php');?>
