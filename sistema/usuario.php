<?php
session_start();
include_once('superior.php');
require 'src/conecta.php';

$cAlterar="";
$cod =  $_SESSION['user']['id'];


$cSql = "SELECT USR_COD, USR_SENHA, USR_LOGIN, USR_NOME, USR_EMAIL, IF(USR_STATUS = 1, REPLACE(1, USR_STATUS, 'Ativo'), REPLACE(0, USR_STATUS, 'INATIVO')) AS  USR_STATUS,
IF(USR_PERMISSAO = 0, REPLACE(0, USR_PERMISSAO, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USUARIO where USR_COD =".$cod;


$dataSet = mysqli_query($conecta, $cSql);

if($oDados = mysqli_fetch_assoc($dataSet)){
    $SENHA =  $oDados['USR_SENHA'];
    $PERMISSAO =  $oDados['USR_PERMISSAO'];
    $NOME =  $oDados['USR_NOME'];
    $LOGIN =  $oDados['USR_LOGIN'];
    $EMAIL =  $oDados['USR_EMAIL'];
    $STATUS = $oDados['USR_STATUS'];
    $cAlterar='onclick="document.all.foto.click()';
}

?>

<style>
.olho {
    padding-right: 3px;
}

</style>


<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user" style=" height:318px">
                    <div class="image">

                        <div class="trofeu" rel="" title="Nível do Usuário!">

                            <?php
                            $cSQL ="SELECT USR_PONTUACAO FROM USUARIO WHERE USR_COD =".$cod;
                            $dataSet = mysqli_query($conecta, $cSQL);
                            if($oDados = mysqli_fetch_assoc($dataSet)){
                                $pontuacao = $oDados['USR_PONTUACAO'];
                            }

                            if($pontuacao <= 100){
                                echo '<img src="img/1.png" >';
                            }
                            else if($pontuacao <= 200){
                                echo '<img src="img/2.png" >';
                            }
                            else if($pontuacao <= 300){
                                echo '<img src="img/3.png" >';
                            }
                            else if($pontuacao <= 400){
                                echo '<img src="img/4.png" >';
                            }
                            else if($pontuacao <= 500){
                                echo '<img src="img/5.png" >';
                            }
                            else if($pontuacao <= 600){
                                echo '<img src="img/6.png" >';
                            }
                            else if($pontuacao <= 700){
                                echo '<img src="img/7.png" >';
                            }
                            else if($pontuacao <= 800){
                                echo '<img src="img/8.png" >';
                            }    
                            else if($pontuacao <= 900){
                                echo '<img src="img/9.png" >';
                            }  
                            else if($pontuacao >= 900){
                                echo '<img src="img/10.png" >';
                            }

                            mysqli_close($conecta);

                            ?>

                        </div>
                        <!-- <img src="assets/img/background.jpg" alt="..."/> -->

                    </div>
                    <form action="insertImagem.php" method="post" enctype="multipart/form-data" id="frmTrocar" target = "gravaImagem" style="display:none"><br>
                        <input name="codigo" value="0"> <br>
                        <input type="file" name="foto" onchange="document.all.frmTrocar.submit(); trocaImagem();"><br>
                    </form>

                    <iframe src="" frameborder="0" name="gravaImagem" style="display: none;"></iframe>


                    <div class="content">
                        <div class="author">



                            <?php

                            
                            echo  '<div class="camera1  border-white" ' .$cAlterar. '"> <img src="img/users/' . $cod . '"  class=" avatar border-white" id = "usrImg" onerror=\'this.src="img/users/erro.png"\') ></div><br>'
                            ?>

                            <h4 class="title" id="nomePagina">
                                <?php echo $NOME?>
                            </h4>
                        </div>
                        <p class="description text-center" id="permissaoPagina">
                            <?php echo $PERMISSAO;?>
                        </p>
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
                        <form name="usuarioPerfil" id="usuarioPerfil">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control border-input" value="<?php echo $NOME?>" name="txtNomeUsr">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Login</label>
                                        <input type="text" class="form-control border-input" value="<?php echo $LOGIN?>" name="txtLoginUsr">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Senha</label>
                                        <input type="password" class="form-control border-input" value="<?php echo $SENHA?>" name="txtSenhaUsr" id="senha">
                                        <img src="img/olho1.png" id="olho" class="olho">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control border-input" value="<?php echo $EMAIL?>" name="txtEmailUsr">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Permissão</label>
                                        <input type="text" class="form-control border-input" readonly value="<?php echo $PERMISSAO?>" name="txtPermissaoUsr">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control border-input" readonly value="<?php echo $STATUS?>" name="txtStatusUsr">
                                    </div>
                                </div>
                            </div>
                        </form>




                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" onclick="alteraUsuario()">Alterar</button>
                            <br>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <output type="text" class="text-center" id="retornoFormUsuario"></output>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Fim Form Perfil -->

            </div>
            <!-- Fim ROW Conjunto perfil -->
        </div>

        <?php

        if ($PERMISSAO == 'Administrador'){

            ?>

            <div class="row" id="rowEmpresa">
                <!-- ROW EMPRESA -->

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
                                            <label><span id = "cmpObrgt">* </span>Nome</label>
                                            <input type="hidden" name="codEmpresa" id="codEmpresa">
                                            <input type="text" class="form-control border-input" placeholder="Pessoal" name="txtNomeEmpresa" id="txtNomeEmpresa">
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
                                            <select class="form-control border-input" id="cmbStatusEmpresa" disabled>
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

                            <div class="table-responsive">
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

                </div>

            </div>
            <!-- Fim ROW Empresa -->


            <div class="row" id="rowConta">
                <!-- Conta -->

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
                                            <label><span id = "cmpObrgt">* </span>Nome</label>
                                            <input type="hidden" name="codConta" id="codConta">
                                            <input type="text" class="form-control border-input" id="nomeConta" name="nomeConta" placeholder="Nome da Conta">
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
                                            <label for=""><span id = "cmpObrgt">* </span>Empresa / Pefil</label>
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
                                                <option value="">Selecione...</option>
                                                <option value="CC">Conta Corrente</option>
                                                <option value="CP">Conta Poupança</option>
                                                <option value="CS">Conta Salário</option>
                                                <option value="SC">Sem Conta</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label><span id = "cmpObrgt">* </span>Saldo Incial</label>
                                            <input type="text" class="form-control border-input" id="saldoInicial" name="saldoInicial" placeholder="R$ 1.000,00">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control border-input" name="cmbStatusConta" id="cmbStatusConta" disabled>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <div class="text-center">
                                <button class="btn btn-info btn-fill btn-wd" value="1" id="buttonConta" onclick="selecionaAcaoConta(this.value)">Inserir</button>

                                <button type="submit" class="btn btn-info btn-fill btn-wd danger" value="2" onclick="selecionaAcaoConta(3)" id="buttonCancelarConta">Cancelar</button>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <output type="text" class="text-center" id="retornoFormConta"></output>
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
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped text-center " width="100%" name="tableConta" id="tableConta" cellspacing="0">
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
                    </div>
                </div>
                <!-- Fim Conta -->
            </div>
            <!-- Fim ROW Conta -->




            <!-- Administrador -->

            <ul class="nav nav-pills " style="
            padding-bottom: 20px">
            <li class="active" id="cadastro" onclick="fnBotoes(this)">
                <a href="#"><span class="ti-user"></span> Cadastrar</a>
            </li>

            <li class="" id="vinculo" onclick="fnBotoes(this)">
                <a href="#"><span class="ti-link"></span> Vincular</a>
            </li>

        </ul>

        <div class="row" id="rowCadastro">
            <div class="col-lg-12 col-md-12">
                <div class="card">



                    <div class="header">
                        <h4 class="title">Usuários</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span id = "cmpObrgt">* </span>Nome</label>
                                        <input type="hidden" class="form-control border-input" id="administradorCod" name="administradorCod">

                                        <input type="text" class="form-control border-input" id="administradorNome" name="administradorNome" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><span id = "cmpObrgt">* </span>Login</label>
                                        <input type="text" class="form-control border-input" id="AdministradorLogin" name="AdministradorLogin" placeholder="beardsmaster">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><span id = "cmpObrgt">* </span>Senha</label>
                                        <input type="password" class="form-control border-input" id="administradorSenha" name="administradorSenha" placeholder="****">
                                        <img src="img/olho1.png" id="olho1" class="olho">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control border-input" id="administradorEmail" name="administradorEmail" placeholder="alex@beardsweb.com.br">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span id = "cmpObrgt">* </span>Empresa</label>
                                        <select placeholder="" class="form-control border-input" id="cmbEmpresaAdm" name="cmbEmpresaAdm">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label><span id = "cmpObrgt">* </span>Permissão</label>
                                        <select placeholder="" class="form-control border-input" id="administradorPermissao" name="administradorPermissao" onchange="if(this.selectedIndex == 1) alert('Usuários com permissão Administrador não poderão ser alterados futuramente.')">
                                            <option value="">Selecione...</option>
                                            <option value="1">Administrador</option>
                                            <option value="0">Usuário</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label><span id = "cmpObrgt">* </span>Status</label>
                                        <select placeholder="" class="form-control border-input" id="administradorStatus" name="administradorStatus">
                                            <option value="">Selecione...</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>



                            </div>
                        </form>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" value="1" onclick="selecionaAcaoAdministrador(this.value)" id="buttonUsuario">Inserir</button>

                            <button type="submit" class="btn btn-info btn-fill btn-wd danger" value="2" onclick="limpaAdministrador()" id="buttonCancelarUsr">Cancelar</button>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <output type="text" class="text-center" id="retornoFormAdministrador"></output>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center " width="100%" name="tableAdministrador" id="tableAdministrador" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th hidden>Código</th>
                                        <!-- <th>Empresa</th> -->
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th>Permissão</th>
                                        <th>Status</th>
                                        <th hidden>Email</th>
                                        <!-- <th hidden>CodEmpr</th> -->


                                        <th>Ações</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    require 'src/conecta.php';


                                    // $cSql = "SELECT DISTINCT USR_COD,COD_EMPR,EMP_NOME_EMPRESA, USR_NOME, USR_LOGIN, USR_PERMISSAO, USR_EMAIL, USR_SENHA, IF(USR_STATUS = 1,REPLACE( USR_STATUS,1,'Ativo'),REPLACE( USR_STATUS,0,'Inativo')) as USR_STATUS, 
                                    // IF(USR_PERMISSAO = 0, REPLACE(0, USR_PERMISSAO, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USR_EMPR INNER JOIN USUARIO ON 
                                    // USUARIO.USR_COD = USR_EMPR.COD_USR join EMPRESA on COD_EMPR = EMP_COD WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =$cod) AND USR_COD != $cod order by EMP_NOME_EMPRESA";

                                    $cSql = "SELECT  USR_COD, USR_NOME, USR_LOGIN, USR_PERMISSAO, ifnull(USR_EMAIL, '') as USR_EMAIL, USR_SENHA, IF(USR_STATUS = 1,REPLACE( USR_STATUS,1,'Ativo'),REPLACE( USR_STATUS,0,'Inativo')) as USR_STATUS, 
                                    IF(USR_PERMISSAO = 0, REPLACE(0, USR_PERMISSAO, 'Usuário'), REPLACE(USR_PERMISSAO, 1, 'Administrador')) as USR_PERMISSAO FROM USUARIO WHERE USR_COD
                                    IN (SELECT COD_USR FROM USR_EMPR WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod)) AND USR_COD != $cod order by USR_NOME";

                                    $dataSet = mysqli_query($conecta, $cSql);

                                    while($oDados = mysqli_fetch_assoc($dataSet)){
                                        echo "

                                        <tr>
                                        <td hidden name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_COD']."</td>
                                        <td name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_NOME']."</td>
                                        <td name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_LOGIN']."</td>
                                        <td name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_PERMISSAO']."</td>
                                        <td name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_STATUS']."</td>
                                        <td hidden name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_EMAIL']."</td>
                                        <td hidden name = 'usr_admin".$oDados['USR_COD']."'>".$oDados['USR_SENHA']."</td>




                                        ";


                                        if($oDados['USR_PERMISSAO'] != "Administrador"){
                                            echo "<td><button class = 'btn' id = 'usr_admin".$oDados['USR_COD']."' onclick = 'selecionaUsuario(this.id)'>Alterar</button></td>
                                            </tr>
                                            ";
                                        }
                                        else{
                                            echo "<td><button class = 'btn' id = 'usr_admin".$oDados['USR_COD']."' disabled>Alterar</button></td>
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

                    </div>
                </div>
                <!-- Card Administrador-->
            </div>

        </div>
        <!--FINAL ROW Administrador-->


        <div class="row" id="rowVinculo">

            <div class="col-lg-12 col-md-12">
                <div class="card">


                    <div class="header">
                        <h4 class="title">Vincular Usuário / Empresa</h4>
                    </div>
                    <div class="content">
                        <form>

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group" style="margin: 0 auto;">
                                        <label>Nome</label>
                                        <select placeholder="" class="form-control border-input" id="nomeUsuario" name="nomeUsuario" onchange="montaTabela(this.value)">
                                        </select>

                                    </div>
                                </div>


                            </div>



                        </form>


                    </div>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <output type="text" class="text-center" id="retornoFormAdministrador"></output>
                            </div>
                        </div>

                    </div>
                    <div class="content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center " width="100%" id="tableUsuarioAdministrador" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th hidden>Código</th>
                                        <th>Empresa</th>
                                        <th hidden>Codigo Empresa</th>
                                        <th>Ações</th>



                                    </tr>
                                </thead>

                                <tbody>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Administrador-->

        </div>
        <!--FINAL ROW Administrador-->



        <?php

    }
    ?>



</div>


</div>
<!-- Container Fluid -->




<?php include_once('inferior.php');?>
<script src="js/crudAjaxUsuario.js"></script>
<script src="js/interatividades.js"></script>
<script src="js/jquery.maskMoney.min.js"></script>
<script src="assets/js/tooltip.js"></script>


<script src="js/animacaoOlhoSenha.js"></script>

<script>
    $("#saldoInicial").maskMoney({
        prefix: 'R$',
        allowNegative: true,
        thousands: '.',
        decimal: ',',
        affixesStay: true
    });

</script>


<script src="js/jquery-3.2.1.js" type="text/javascript"></script>

<script>
    var $JQ = jQuery.noConflict();

</script>

<script src="js/jquery.mask.js"></script>

<script>

    function trocaImagem(){

        var oArq  = new FileReader();

        oArq.onloadend = function(){
            document.getElementById('usrImg').src = oArq.result;


        }
        if(document.all.foto.files[0]){
        oArq.readAsDataURL(document.all.foto.files[0]); // Comando para carregar imagem na memória.
        document.getElementById('usrImg').style.display = "block";


    }

    else{

        document.all.imgBanner.style.display = "none";

    }
}


    var options = {
        onKeyPress: function(cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'],
            mask = (cpf.length > 14) ? masks[1] : masks[0];
            el.mask(mask, op);
        }
    }

    $JQ('#txtCnpj').mask('000.000.000-000', options);

</script>
