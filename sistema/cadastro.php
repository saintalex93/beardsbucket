<?php 
session_start();
include_once('superior.php');
require 'src/conecta.php';

$cod =  $_SESSION['user']['id'];
?>


<div class="content">

	<div class="container-fluid" >


		<ul class="nav nav-pills NavegadorSuperior">
			<li class="active" id = "lancamento" onclick="fnMenuFinancas(this)">
				<a href="#"><span class="ti-server"></span> Cliente / Fornecedor</a>
			</li>
			
			<li class="" id="categ" onclick="fnMenuFinancas(this)">
				<a href="#"><span class="ti-bookmark"></span> Categoria</a>
			</li>

		</ul>

		<div class="row" id="rowCliente"> <!-- ROW CLIENTE -->
			<div class="col-lg-12 col-md-12">



				<div class="card">
					<div class="header">
						<h4 class="title">Cliente / Fornecedor</h4>
					</div>

					<div class="content">

						<form id="">

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label><span id = "cmpObrgt">* </span>Nome</label>
										<input type="hidden" name="cadastroCliFornCod" id="cadastroCliFornCod">
										<input type="text" class="form-control border-input" name="cadCliFornName" id="cadCliFornName" placeholder="Nome">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>CNPJ / CPF</label>
										<input type="text" class="form-control border-input" name="cadCliFornCNPJCPF" id="cadCliFornCNPJCPF" placeholder="07.833.690/00001-09" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Tipo</label>
										<select value="" class="form-control border-input" name="cadCliFornTipo" id="cadCliFornTipo">
											<option value="">Selecione...</option>
											<option value="PF">Pessoa Física</option>
											<option value="PJ">Pessoa Jurídica</option>
										</select>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Telefone</label>
										<input type="text" class="form-control border-input" name="cadCliFornTel" id="cadCliFornTel" placeholder="(11) 0000-0000">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control border-input" name="cadCliFornEmail" id="cadCliFornEmail" placeholder="beardsbucket@beardsweb.com.br" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Empresa / Perfil</label>
										<select value="" class="form-control border-input" id="cmbEmpresaSelecao" name="cmbEmpresaSelecao" >
										</select>
									</div>
								</div>

								<div class="col-md-2">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Status</label>
										<select value="" class="form-control border-input" name="cadCliFornStatus" id="cadCliFornStatus">
											<option value="">Selecione...</option>
											<option value="1">Ativo</option>
											<option value="0">Inativo</option>
										</select>
									</div>
								</div>

							</div>

							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Tipo da Conta</label>
										<select value="" class="form-control border-input" name="cadCliFornTipoConta" id="cadCliFornTipoConta" onchange="trocaTipoConta(this.value)">
											<option value="Selecione">Selecione...</option>
											<option value="SC">Sem Conta</option>
											<option value="CC">Corrente</option>
											<option value="CP">Poupança</option>
											<option value="CS">Salário</option>
										</select>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Banco</label>
										<input type="text" class="form-control border-input" placeholder="Itaú" name="cadCliFornBanco" id="cadCliFornBanco" disabled>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Agência</label>
										<input type="text" class="form-control border-input" placeholder="5607" name="cadCliFornAg" id="cadCliFornAg" disabled>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Conta</label>
										<input type="text" class="form-control border-input" placeholder="00657-3" name="cadCliFornConta" id="cadCliFornConta" disabled>
									</div>
								</div>
								

							</div>
						</form>


						<div class="text-center">
							<button class="btn btn-info btn-fill btn-wd" name="buttoncadClienteForncedor" id="buttoncadClienteForncedor" value="1" onclick="selecionaAcaoCadClienteForncedor(this.value)">Cadastrar</button>

							<button  class="btn btn-info btn-fill btn-wd danger" value="2" onclick="cancelaCliForn()" name="buttonCancelarCliForn" id="buttonCancelarCliForn">Cancelar</button>

						</div>

						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<output type="text" class="text-center" name="retornoFormCliForn" id="retornoFormCliForn"></output>
								</div>
							</div>

						</div>

					</div> <!--CONTENT CADASTRO -->


					<div class="content"> <!--CONTENT TABELA -->

						<div class="col-md-6 col-md-offset-3 text-center" style="margin-bottom: 15px;">
							<div class="form-group">
								<label for="">Empresa / Perfil</label>
								<select value="" class="form-control border-input" name="cmbEmpresaFiltro" id="cmbEmpresaFiltro" onchange="buscaClienteForn(this.value)">
								</select>
							</div>
						</div>

						<div class="table-responsive">

							<table class="table table-bordered table-striped text-center "  width="100%" id="tableCliForn" name="tableCliForn" cellspacing="0">
								<thead>
									<tr>
										<th>Código</th>
										<th>Nome</th>
										<th>Empresa</th>
										<th hidden>CPF</th>
										<th hidden>TIPO</th>
										<th hidden>Telefone</th>
										<th hidden>Email</th>
										<th hidden>CodEmp</th>
										<th hidden>Nome Emp</th>
										<th>Status</th>
										<th hidden>StatusDesc</th>
										<th hidden>CLI_BANCO</th>
										<th hidden>CLI_AGENCIA</th>
										<th hidden>CLI_CONTA</th>
										<th hidden>CLI_TIPOCONTA</th>
										<th>Ação</th>
									</tr>
								</thead>

								

								<tbody>

								</tbody>
							</table>
						</div>

					</div> <!-- CONTENT TABELA -->




				</div> <!--CARD -->
			</div> <!-- COL -->



		</div> <!-- ROW CLIENTE -->


		<div class="row" id="rowCategoria"> <!-- ROW Categoria -->

			<div class="col-lg-12 col-md-12">

				<div class="card">
					<div class="header">
						<h4 class="title">Categoria</h4>
					</div>

					<div class="content">

						<form id="">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Nome</label>
										<input type="hidden" name="categoriaCod" id="categoriaCod">
										<input type="text" id="categoriaNome" name="categoriaNome" class="form-control border-input">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label><span id = "cmpObrgt">* </span>Empresa / Perfil</label>
										<select value="" class="form-control border-input" id="cmbEmpresaCat2" name="cmbEmpresaCat2">
											
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Status</label>
										<select type="text" id="categoriaStatus" name="categoriaStatus" class="form-control border-input">
											<option value="">Selecione...</option>
											<option value="1">Ativo</option>
											<option value="0">Inativo</option>

										</select>
									</div>
								</div>
								
							</div>

						</form>


						<div class="text-center">
							<button class="btn btn-info btn-fill btn-wd"  value="1" onclick="selectionAcaoCategoria(this.value)" id="buttonCategoria">Cadastrar</button>

							<button class="btn btn-info btn-fill btn-wd danger" value="2" onclick="cancelaCategoria()" id="buttonCancelarCategoria">Cancelar</button>
						</div>

						<div class="row" style="margin-top: 30px;">
							<div class="col-md-6 col-md-offset-3 text-center">
								<div class="form-group">
									<label>Busca Categoria</label>
									<select class="form-control border-input" id="cmbEmpresaCat" name="cmbEmpresaCat" onchange="buscaCategorias(this.value)">

									</select>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<output type="text" class="text-center" id="retornoFormCategoria"></output>
								</div>
							</div>

						</div>

					</div> <!--CONTENT CATEGORIA -->


					<div class="content"> <!--CONTENT TABELA -->
						<div class="table-responsive">

							<table class="table table-bordered table-striped text-center " width="100%" id="tableCategoria" cellspacing="0" name="tableCategoria">
								<thead>
									<tr>
										<th>Código</th>
										<th>Nome</th>
										<th>Status</th>
										<th>Empresa</th>
										<th>Ação</th>

									</tr>
								</thead>

								<tbody>
									<tr>


									</tr>

								</tbody>
							</table>
						</div> <!-- CONTENT TABELA -->
					</div> <!--CARD CATEGORIA-->
				</div> <!-- COL -->


			</div> <!-- ROW CATEGORIA -->



		</div> <!-- CONTENT FLUID -->
	</div>

</div> <!-- CONTENT -->





<?php include_once('inferior.php');?>


<script src = "js/interatividades.js"></script>
<script src = "js/crudAjaxCadastro.js"></script>

<script src="js/jquery-3.2.1.js" type="text/javascript"></script>

<script>
	var $JQ = jQuery.noConflict();    
</script>

<script src="js/jquery.maskMoney.min.js"></script>
<script src="js/jquery.mask.js"></script>



<script>
	var options = {
		onKeyPress: function (cpf, ev, el, op) {
			var masks = ['000.000.000-000', '00.000.000/0000-00'],
			mask = (cpf.length > 14) ? masks[1] : masks[0];
			el.mask(mask, op);
		}
	}

	$JQ('#cadCliFornCNPJCPF').mask('000.000.000-000', options);


	var options2 = {
		onKeyPress: function (cpf, ev, el, op) {
			var masks = ['(00) 0000-00000', '(00) 00000-0000'],
			mask = (cpf.length > 14) ? masks[1] : masks[0];
			el.mask(mask, op);
		}
	}

	$JQ('#cadCliFornTel').mask('(00) 0000-00000', options2);




</script>
