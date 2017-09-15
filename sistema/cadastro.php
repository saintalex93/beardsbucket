

<?php include_once('superior.php');?>

<div class="card " style="height:245px; margin: 50px 40px 110px 40px; ">
    <div class="card col-md-12">
        <div class="header">
            <h4 class="title">Cliente e Fornecedores</h4>
        </div>
        <div class="content">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Empresa</label>
                            <input type="text" class="form-control border-input" disabled placeholder="Company" value="Eletropaulo">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipo</label>
                            <select value="Teste" class="form-control border-input">
                                <option name="" id="">Consumo</option>
                                <option name="" id="">Funcionários</option>
                                <option name="" id="">Imóveis</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dia de Vencimento</label>
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