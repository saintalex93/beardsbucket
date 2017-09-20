

<?php include_once('superior.php');?>

<div class="card " style="height:245px; margin: 50px 40px 110px 40px; ">
    <div class="card col-md-12">
        <div class="header">
            <h4 class="title text-center">Cliente e Fornecedores</h4>
        </div>
        <div class="content">

         <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd" id="formPF" onclick="fnHideFormCadastro(this.id)">PF</button>
            <button type="submit" class="btn btn-info btn-fill btn-wd" id="formPJ" onclick="fnHideFormCadastro(this.id)">PJ</button>

        </div>

        <form id="formCadastroPF">
            <div id="pf">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control border-input">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sexo</label>
                            <select value="Teste" class="form-control border-input">

                                <option name="" id="">Selecione...</option>

                                <option name="" id="">Masculino</option>
                                <option name="" id="">Feminino</option>
                                <option name="" id="">Outros</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control border-input" placeholder="Home Address" value="10">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" class="form-control border-input" placeholder="0.2" value="10">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control border-input" placeholder="Home Address" value="10">
                        </div>
                    </div>

                </div>

            </div>

            

        </form>

        <form id="formCadastroPJ">
            <div id="pf">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Razão Social</label>
                            <input type="text" class="form-control border-input">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome Fantasia</label>
                            <input type="text" class="form-control border-input">
                        </div>
                    </div>

                </div>

                <div class="row">


                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                         <label>Telefone</label>
                         <input type="text" class="form-control border-input">
                     </div>
                 </div>

             </div>

             <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nome Representante</label>
                        <input type="text" class="form-control border-input" placeholder="Home Address" value="10">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Telefone Representante</label>
                        <input type="text" class="form-control border-input" placeholder="0.2" value="10">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control border-input" placeholder="Home Address" value="10">
                    </div>
                </div>

            </div>

        </div>

    </form>


    <div class="text-center">
        <button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar</button>
    </div>
    <div class="clearfix"></div>
</form>
</div>
</div>
</div>

<div class="card " style="height:245px; margin: 0px 40px 260px 40px; ">
    <div class="card col-md-12">
        <div class="header">
            <h4 class="title">Setores</h4>
        </div>
        <div class="content">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="text" class="form-control border-input" disabled placeholder="Company" value="Eletropaulo">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CNPJ/CPF</label>
                            <input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipo</label>
                            <select value="Teste" class="form-control border-input">
                                <option name="" id="">Empresa</option>
                                <option name="" id="">Pessoa Física</option>
                                <option name="" id="">Extra</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data de Recebimento</label>
                            <input type="text" class="form-control border-input" placeholder="Home Address" value="10">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Juros ao Dia</label>
                            <input type="text" class="form-control border-input" placeholder="0.2" value="10">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Juros ao Mês</label>
                            <input type="text" class="form-control border-input" placeholder="Home Address" value="10">
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>





<?php include_once('inferior.php');?>

<script src = "js/cadastro.js"></script>