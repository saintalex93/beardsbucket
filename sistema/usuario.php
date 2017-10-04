<?php include_once('superior.php');?>



<div class="content">

    <div class="container-fluid" >

        <div class="row">
           <div class="col-lg-4 col-md-5">
            <div class="card card-user" style=" height:295px">
                <div class="image">
                    <img src="assets/img/background.jpg" alt="..."/>
                </div>
                <div class="content">
                    <div class="author">
                      <img class="avatar border-white" src="assets/img/faces/beards.png" alt="..."/>
                      <h4 class="title">Nome</h4>
                  </div>
                  <p class="description text-center">Permissão</p>
              </div>

          </div>
      </div>
      <!-- Fim Perfil Esquerda -->

      <!-- Perfil Cadastro -->
      <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Editar Perfil</h4>
            </div>

            <div class="content">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control border-input" value="Nome">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control border-input" placeholder="Username" value="beardsmaster">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Senha</label>
                                <input type="email" class="form-control border-input" placeholder="****">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border-input" placeholder="alex@beardsweb.com.br" value="alex@beardsweb.com.br">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Permissão</label>
                                <input type="text" class="form-control border-input" value="Administrador">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control border-input" value="Ativo">
                            </div>
                        </div>
                    </div>
                </form>




                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar</button>
                    <br>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>  

    </div> <!-- Fim Form Perfil -->









</div> <!-- Fim ROW Conjunto perfil -->

<div class="row">  <!-- Conta -->

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Conta</h4>
            </div>
            <div class="content">

                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control border-input"  value="Itaú Pessoal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banco</label>
                                <input type="text" class="form-control border-input" value="Itaú">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Agência</label>
                                <input type="email" class="form-control border-input" value="5607">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Conta Corrente</label>
                                <input type="text" class="form-control border-input" value="00657-3">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo</label>
                                <input type="text" class="form-control border-input"  value="Conta Corrente">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Saldo Incial</label>
                                <input type="text" class="form-control border-input" value="R$ 80.000,00">
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>


                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            for($nCont = 0; $nCont<=1; $nCont++){

                                echo "

                                <tr>
                                <td>$nCont</td>
                                <td>Eletropaulo</td>


                                </tr>
                                ";

                            }

                            ?>

                        </tbody>
                    </table>

                </form>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar</button>
                </div>

            </div> 
        </div>
    </div> <!-- Fim Conta -->
</div> <!-- Fim ROW Conta -->


<div class="row">



    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Empresa</h4>
            </div>
            <div class="content">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control border-input"  value="Itaú Pessoal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control border-input" value="Itaú">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Conta</label>
                                <input type="text" class="form-control border-input" value="Itaú">
                            </div>
                        </div>

                    </div>




                    <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Banco</th>


                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            for($nCont = 0; $nCont<=1; $nCont++){

                                echo "

                                <tr>
                                <td>$nCont</td>
                                <td>Eletropaulo</td>
                                <td>R$ 8.000,00</td>
                                </tr>
                                ";

                            }

                            ?>

                        </tbody>
                    </table>

                </form>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar</button>
                </div>

            </div>


        </div>

    </div> 

</div> <!-- Fim ROW Empresa -->

<!-- Administrador -->
<div class="row">

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Administrador</h4>
            </div>
            <div class="content">
               <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control border-input" value="Nome">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control border-input" placeholder="Username" value="beardsmaster">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Senha</label>
                                <input type="email" class="form-control border-input" placeholder="****">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border-input" placeholder="alex@beardsweb.com.br" value="alex@beardsweb.com.br">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Permissão</label>
                                <input type="text" class="form-control border-input" value="Administrador">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control border-input" value="Ativo">
                            </div>
                        </div>
                    </div>
                </form>

                    <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Empresa</th>


                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            for($nCont = 0; $nCont<=1; $nCont++){

                                echo "

                                <tr>
                                <td>$nCont</td>
                                <td>Alex</td>
                                <td>Unas</td>
                                </tr>
                                ";

                            }

                            ?>

                        </tbody>
                    </table>



                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar</button>
                </div>
            </div>
        </div> <!-- Card Administrador-->
    </div>

</div> <!--FINAL ROW Administrador-->









</div> <!-- Container Fluid -->
</div> <!-- Container-->




<?php include_once('inferior.php');?>



