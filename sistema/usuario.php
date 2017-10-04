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
                                <input type="text" class="form-control border-input" placeholder="Nome">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control border-input"  placeholder="beardsmaster">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="email" class="form-control border-input" placeholder="****">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border-input"  placeholder="alex@beardsweb.com.br">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Permissão</label>
                                <input type="text" class="form-control border-input" placeholder="Administrador">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control border-input" placeholder="Ativo">
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



<div class="row"> <!-- ROW EMPRESA -->

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Empresa / Perfil</h4>
            </div>
            <div class="content">
                <form>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control border-input"  placeholder="Pessoal">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control border-input" placeholder="04.666.666/00001-6">
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
                                <td>Pessoal</td>
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
                                <input type="text" class="form-control border-input"  placeholder="Itaú">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Banco</label>
                                <input type="text" class="form-control border-input" placeholder="Itaú">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               <label for="">Empresa / Pefil</label>
                               <select placeholder="" class="form-control border-input">
                                <option name="" id="">Selecione...</option>
                                <option name="" id="">Pessoal</option>
                                <option name="" id="">Albroz</option>
                                <option name="" id="">Unas</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Agência</label>
                            <input type="email" class="form-control border-input" placeholder="5607">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Conta Corrente</label>
                            <input type="text" class="form-control border-input" placeholder="00657-3">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" class="form-control border-input"  placeholder="Conta Corrente">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Saldo Incial</label>
                            <input type="text" class="form-control border-input" placeholder="R$ 80.000,00">
                        </div>
                    </div>
                </div>

                <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Banco</th>
                            <th>Empresa</th>



                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        for($nCont = 0; $nCont<=1; $nCont++){

                            echo "

                            <tr>
                            <td>$nCont</td>
                            <td>Pessoal</td>
                            <td>Itaú</td>
                            <td>Pessoal</td>

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


<div class="row"> <!-- ROW EMPRESA COLABORADOR -->

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Veincular Colaboradores</h4>
            </div>
            <div class="content">
                <form>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                             <label for="">Empresa / Pefil</label>
                             <select placeholder="" class="form-control border-input">
                                <option name="" id="">Selecione...</option>
                                <option name="" id="">Pessoal</option>
                                <option name="" id="">Albroz</option>
                                <option name="" id="">Unas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                         <label for="">Colaborador</label>
                         <select placeholder="" class="form-control border-input">
                            <option name="" id="">Selecione...</option>
                            <option name="" id="">Alex</option>
                            <option name="" id="">Gustavo</option>
                            <option name="" id="">Diego</option>
                        </select>
                    </div>
                </div>

            </div>
            
            

        </form>

        <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd">Veincular</button>
        </div>

        <div class="content">
            <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Empresa</th>
                        <th>Colaborador</th>

                    </tr>
                </thead>

                <tbody>

                    <?php
                    for($nCont = 0; $nCont<=1; $nCont++){

                        echo "

                        <tr>
                        <td>$nCont</td>
                        <td>BeardsWeb</td>
                        <td>Alex</td>

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

</div> <!-- Fim ROW Empresa COLABORADOR-->


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
                            <input type="text" class="form-control border-input" placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" class="form-control border-input"  placeholder="beardsmaster">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Senha</label>
                            <input type="email" class="form-control border-input" placeholder="****">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control border-input" placeholder="alex@beardsweb.com.br">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Permissão</label>
                            <input type="text" class="form-control border-input" placeholder="Administrador">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control border-input" placeholder="Ativo">
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Login</th>


                    </tr>
                </thead>

                <tbody>

                    <?php
                    for($nCont = 0; $nCont<=1; $nCont++){

                        echo "

                        <tr>
                        <td>$nCont</td>
                        <td>Alex Santos</td>
                        <td>Alex</td>
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



