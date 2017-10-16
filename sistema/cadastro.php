<?php include_once('superior.php');
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
										<label>Nome</label>
										<input type="text" class="form-control border-input" placeholder="Eletropaulo">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>CNPJ / CPF</label>
										<input type="text" class="form-control border-input" placeholder="07.833.690/00001-09" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Tipo</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Pessoa Física</option>
											<option name="" id="">Pessoa Jurídica</option>
										</select>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Telefone</label>
										<input type="text" class="form-control border-input" placeholder="(11) 3333-3333">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control border-input" placeholder="beardsbucket@beardsweb.com.br" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Empresa / Perfil</label>
										<select value="" class="form-control border-input" id="cmbEmpresaSelecao">
										</select>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="">Status</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="" value="1">Ativo</option>
											<option name="" id="" value="0">Inativo</option>
										</select>
									</div>
								</div>

							</div>

							<div class="row">

								<div class="col-md-3">
									<div class="form-group">
										<label>Banco</label>
										<input type="text" class="form-control border-input" placeholder="Itaú" >
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Agência</label>
										<input type="text" class="form-control border-input" placeholder="5607" >
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Conta</label>
										<input type="text" class="form-control border-input" placeholder="00657-3" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Tipo da Conta</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Corrente</option>
											<option name="" id="">Poupança</option>
											<option name="" id="">Salário</option>
										</select>
									</div>
								</div>

							</div>
						</form>


						<div class="text-center">
							<button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar</button>

						</div>

					</div> <!--CONTENT CADASTRO -->


					<div class="content"> <!--CONTENT TABELA -->

						<div class="col-md-6 col-md-offset-3 text-center" style="margin-bottom: 15px;">
							<div class="form-group">
								<label for="">Empresa / Perfil</label>
								<select value="" class="form-control border-input" id="cmbEmpresaFiltro">
								</select>
							</div>
						</div>

						<div class="table-responsive">

							<table class="table table-bordered table-striped text-center " width="100%" id="dataTable" cellspacing="0">
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
										<label for="">Nome</label>
										<input type="hidden" name="categoriaCod" id="categoriaCod">
										<input type="text" id="categoriaNome" name="categoriaNome" class="form-control border-input">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Empresa / Perfil</label>
										<select value="" class="form-control border-input" id="cmbEmpresaCat2" name="cmbEmpresaCat2">
											
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label for="">Status</label>
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
							<button type="submit" class="btn btn-info btn-fill btn-wd"  value="1" onclick="selectionAcaoCategoria(this.value)" id="buttonCategoria">Cadastrar</button>

							<button type="submit" class="btn btn-info btn-fill btn-wd danger" value="2" onclick="cancelaCategoria()" id="buttonCancelarCategoria">Cancelar</button>
						</div>

						<div class="row" style="margin-top: 30px;">
								<div class="col-md-6 col-md-offset-3 text-center">
									<div class="form-group">
										<label>Busca Categoria</label>
										<select value="" class="form-control border-input" id="cmbEmpresaCat" name="cmbEmpresaCat" onchange="buscaCategorias(this.value)">
											
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
										<th >Empresa</th>
										<th >Acao</th>

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

	</div> <!-- CONTENT -->





	<?php include_once('inferior.php');?>


	<script src = "js/interatividades.js"></script>
	<script src = "js/crudAjaxCadastro.js"></script>

