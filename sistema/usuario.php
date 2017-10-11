<?php include_once('superior.php');
require 'src/conecta.php';


$cod =  $_SESSION['user']['id'];


if($_SESSION['user']['permission'] == 0)
    $permissao = "Usuário";
else if ($_SESSION['user']['permission'] == 1)
    $permissao = "Gerente";
else
    $permissao = "Administrador";


$cSql = "SELECT * FROM USUARIO WHERE USR_COD = ".$cod;


$dataSet = mysqli_query($conecta, $cSql);

if($oDados = mysqli_fetch_assoc($dataSet)){
    $SENHA =  $oDados['USR_SENHA'];
    $EMAIL =  $oDados['USR_EMAIL'];
    $STATUS = $oDados['USR_STATUS'];
}


if($STATUS == 1)
    $STATUS = "Ativo";
else
    $STATUS = "Inativo";

mysqli_free_result($dataSet);
mysqli_close($conecta);




?>





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
                      <h4 class="title"><?php echo $_SESSION['user']['name']?></h4>
                  </div>
                  <p class="description text-center"><?php echo $permissao;?></p>
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
                                <input type="text" class="form-control border-input" value = "<?php echo $_SESSION['user']['name']?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control border-input"  value = "<?php echo $_SESSION['user']['username']?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="password" class="form-control border-input" value = "<?php echo $SENHA?>" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control border-input"  value = "<?php echo $EMAIL?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Permissão</label>
                                <input type="text" class="form-control border-input" disabled value = "<?php echo $permissao?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control border-input" disabled value="<?php echo $STATUS?>" >
                            </div>
                        </div>
                    </div>
                </form>




                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Alterar</button>
                    <br>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>  

    </div> <!-- Fim Form Perfil -->

</div> <!-- Fim ROW Conjunto perfil -->

<?php

if ($permissao == 'Administrador'){

    ?>

    <div class="row" id="rowEmpresa"> <!-- ROW EMPRESA -->

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
                                    <input type="hidden" name="codEmpresa" id="codEmpresa">
                                    <input type="text" class="form-control border-input"  placeholder="Pessoal" name="txtNomeEmpresa" id="txtNomeEmpresa">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CNPJ/CPF</label>
                                    <input type="text" class="form-control border-input" placeholder="04.666.666/00001-6" name="txtCnpj" id="txtCnpj">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control border-input" id="cmbStatusEmpresa" >
                                        <option value="Ativo">Ativo</option>
                                        <option value="Inativo">Inativo</option>
                                    </select>

                                </div>
                            </div>

                        </div>

                    </form>

                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd" value="1" onclick="selecionaAcao(this.value)" id="buttonEmpresa">Inserir</button>

                        <button type="submit" class="btn btn-info btn-fill btn-wd danger" value="2" onclick="selecionaAcao(3)" id="buttonCancelarEmpresa">Cancelar</button>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                           <div class="form-group">
                            <output type="text" class="text-center" id="retornoFormEmpresa"></output>
                        </div>
                    </div>

                </div>


                <table class="table table-bordered table-striped text-center " width="100%" id="tableEmpresa" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Status</th>
                            <th>Ações</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        require 'src/conecta.php';


                        $cSql = "SELECT EMP_COD, EMP_NOME_EMPRESA, EMP_CNPJ,
                        IF(EMP_STATUS = 1,REPLACE( EMP_STATUS,1,'Ativo'),REPLACE( EMP_STATUS,0,'Inativo')) as EMP_STATUS 
                        FROM USUARIO JOIN USR_EMPR ON USR_COD = COD_USR INNER JOIN EMPRESA ON EMP_COD = COD_EMPR WHERE COD_USR = ".$cod;


                        $dataSet = mysqli_query($conecta, $cSql);

                        while($oDados = mysqli_fetch_assoc($dataSet)){
                            echo "

                            <tr>
                            <td name = 'emp".$oDados['EMP_COD']."'>".$oDados['EMP_COD']."</td>
                            <td name = 'emp".$oDados['EMP_COD']."'>".$oDados['EMP_NOME_EMPRESA']."</td>
                            <td name = 'emp".$oDados['EMP_COD']."'>".$oDados['EMP_CNPJ']."</td>
                            <td name = 'emp".$oDados['EMP_COD']."'>".$oDados['EMP_STATUS']."</td>

                            <td><button class = 'btn' id = '".$oDados['EMP_COD']."' onclick = 'selecionaEmpresa(this.id)' >Alterar</button></td>
                            </tr>
                            ";

                        }

                        mysqli_free_result($dataSet);
                        mysqli_close($conecta);  


                        ?>

                    </tbody>
                </table>






            </div>


        </div>

    </div> 

</div> <!-- Fim ROW Empresa -->


<div class="row" id="rowConta">  <!-- Conta -->

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
                                <input type="hidden" name="codConta" id="codConta">
                                <input type="text" class="form-control border-input" id="nomeConta"  name="nomeConta" placeholder="Nome da Conta">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Banco</label>
                                <input type="text" class="form-control border-input" id="nomeBanco" name="nomeBanco" placeholder="Itaú">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                             <label for="">Empresa / Pefil</label>
                             <select placeholder="" class="form-control border-input" id="cmbEmpresa" name="cmbEmpresa">

                             </select>
                         </div>
                     </div>

                 </div>

                 <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Agência</label>
                            <input type="email" class="form-control border-input" id="agenciaConta" name="agenciaConta" placeholder="Agencia">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Conta Corrente</label>
                            <input type="text" class="form-control border-input" id="numeroConta" name="numeroConta" placeholder="Conta">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select placeholder="" class="form-control border-input" id="tipoConta" name="tipoConta">
                                <option value="CC">Conta Corrente</option>
                                <option value="CP">Conta Poupança</option>
                                <option value="CS">Conta Salário</option>
                                <option value="SC">Sem Conta</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Saldo Incial</label>
                            <input type="text" class="form-control border-input" id="saldoInicial" name="saldoInicial" placeholder="R$ 1.000,00">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control border-input" name="cmbStatusConta" id="cmbStatusConta" >
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>


            <div class="text-center">
                <button  class="btn btn-info btn-fill btn-wd" value="1" id ="buttonConta" onclick="selecionaAcaoConta(this.value)">Inserir</button>

                <button type="submit" class="btn btn-info btn-fill btn-wd danger" value="2" onclick="selecionaAcaoConta(3)" id="buttonCancelarConta">Cancelar</button>
            </div>

            <div class="row">

                <div class="col-md-12">
                   <div class="form-group">
                    <output type="text" class="text-center" id="retornoFormConta">COLOCAR RETORNO SENDO POSItiVO OU NEGAtIVO</output>
                </div>
            </div>

        </div>

        <div class="row">

                        <div class="col-md-12">
                           <div class="form-group">
                            <output type="text" class="text-center" id="retornoFormConta"></output>
                        </div>
                    </div>

                </div>

        <table class="table table-bordered table-striped text-center " width="100%"  name="tableConta" id="tableConta" cellspacing="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Banco</th>
                    <th>Empresa</th>
                    <th>Saldo Inicial</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php
                require 'src/conecta.php';


                $cSql = "SELECT CNT_COD, CNT_NOME, CNT_BANCO, CNT_AGNC, CNT_NMCONTA, CNT_TIPO, CNT_TIPO, CNT_SALDOINICIAL, EMP_NOME_EMPRESA, IF(CNT_STATUS = 1,REPLACE( CNT_STATUS,1,'Ativo'),REPLACE( CNT_STATUS,0,'Inativo')) as CNT_STATUS  FROM CONTA INNER JOIN
                EMPRESA ON EMPRESA.EMP_COD = CONTA.COD_EMPR INNER JOIN USR_EMPR ON USR_EMPR.COD_EMPR = EMPRESA.EMP_COD WHERE COD_USR = ".$cod." order by CNT_COD";


                $dataSet = mysqli_query($conecta, $cSql);

                while($oDados = mysqli_fetch_assoc($dataSet)){
                    echo "

                    <tr>
                    <td name = 'conta".$oDados['CNT_COD']."'>".$oDados['CNT_COD']."</td>
                    <td name = 'conta".$oDados['CNT_COD']."'>".$oDados['CNT_NOME']."</td>
                    <td name = 'conta".$oDados['CNT_COD']."'>".$oDados['CNT_BANCO']."</td>
                    <td name = 'conta".$oDados['CNT_COD']."'>".$oDados['EMP_NOME_EMPRESA']."</td>
                    <td name = 'conta".$oDados['CNT_COD']."'>"."R$".number_format($oDados['CNT_SALDOINICIAL'],2,",",".")."</td>
                    <td name = 'conta".$oDados['CNT_COD']."'>".$oDados['CNT_STATUS']."</td>

                    <td><button class = 'btn' id = '".$oDados['CNT_COD']."' onclick = 'selecionaConta(this.id)' >Alterar</button></td>
                    </tr>
                    ";

                    // for(var i = 0; i<document.getElementById('".$oDados['CNT_COD']."').length;i++){alert(document.getElementById('".$oDados['CNT_COD']."')[i].innerTEXT);}

                }

                mysqli_free_result($dataSet);
                mysqli_close($conecta);  


                ?>



            </tbody>
        </table>




    </div> 
</div>
</div> <!-- Fim Conta -->
</div> <!-- Fim ROW Conta -->




<!-- Administrador -->
<div class="row" id="rowAdminstrador">

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
                            <select placeholder="" class="form-control border-input">
                                <option value="">Selecione...</option>
                                <option value="2">Administrador</option>
                                <option value="1">Gerente</option>
                                <option value="0">Usuário</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select placeholder="" class="form-control border-input">
                                <option value="">Selecione...</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <div class="text-center">
                <button type="submit" class="btn btn-info btn-fill btn-wd">Inserir</button>
            </div>

            <div class="row">

                <div class="col-md-12">
                   <div class="form-group">
                    <output type="text" class="text-center" id="retornoFormConta">OI</output>
                </div>
            </div>

        </div>

        <table class="table table-bordered table-striped text-center " width="100%" id="dataTable" cellspacing="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Permissão</th>

                    <th>Ações</th>



                </tr>
            </thead>

            <tbody>

               <?php

               require 'src/conecta.php';


               $cSql = "SELECT DISTINCT USR_COD, USR_NOME, USR_LOGIN, USR_PERMISSAO FROM USR_EMPR INNER JOIN USUARIO ON USUARIO.USR_COD = USR_EMPR.COD_USR WHERE
               COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod)";


               $dataSet = mysqli_query($conecta, $cSql);

               while($oDados = mysqli_fetch_assoc($dataSet)){
                echo "

                <tr>
                <td>".$oDados['USR_COD']."</td>
                <td>".$oDados['USR_NOME']."</td>
                <td>".$oDados['USR_LOGIN']."</td>

                
                ";

                if($oDados['USR_PERMISSAO'] == 0)
                    $permissao = "Usuário";
                else if ($oDados['USR_PERMISSAO'] == 1)
                    $permissao = "Gerente";
                else
                    $permissao = "Administrador";

                echo"
                <td>".$permissao."</td>";


                if($permissao != "Administrador"){
                    echo "<td><button class = 'btn' id = '".$oDados['USR_COD']."' onclick = 'alert(this.id)'>Alterar</button></td>
                    </tr>
                    ";
                }
                else{
                    echo "<td><button class = 'btn' id = '".$oDados['USR_COD']."' onclick = 'alert(this.id)' disabled>Alterar</button></td>
                    </tr>
                    ";
                }


            }

            mysqli_free_result($dataSet);
            mysqli_close($conecta);  



            ?>

        </tbody>
    </table>

</div>
</div> <!-- Card Administrador-->
</div>

</div> <!--FINAL ROW Administrador-->



<?php

}
?>






</div> <!-- Container Fluid -->
</div> <!-- Container-->




<?php include_once('inferior.php');?>
<script src = "js/crudAjaxUsuario.js"></script>


