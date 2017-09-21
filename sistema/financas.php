<?php include_once('superior.php');?>
<div class="content">

	<ul class="nav nav-pills NavegadorSuperior">
		<li class="active" id = "lancamento" onclick="fnMenuFinancas(this)"><a href="#"><span class="ti-server"></span> Lançamento</a></li>
		<li class="" id="consulta" onclick="fnMenuFinancas(this)"><a href="#"><span class="ti-search"></span> Consulta</a></li>
		<li class="" id="categ" onclick="fnMenuFinancas(this)"><a href="#"><span class="ti-bookmark"></span> Categoria</a></li>

	</ul>

	<!-- .......................................................................................... -->

	<div id="DivreceiDesp">


		<div class="text-center botoes">
			<button type="submit" class="btn btn-info btn-fill btn-wd botao active" id="formReceita" onclick="fnHideFormFinancas(this.id)">RECEITA</button>
			<button type="submit" class="btn btn-info btn-fill btn-wd botao" id="formDespesa" onclick="fnHideFormFinancas(this.id); document.all.formReceita.setAttribute('class', 'btn btn-info btn-fill btn-wd botao')">DESPESA</button>

		</div>

		<div class="card col-md-12">



			<div id="lancReceit">

				<div class="header">
					<h4 class="title text-center">Receita</h4>
				</div>

				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Cliente</label>
								<select value="Teste" class="form-control border-input">

									<option name="" id="">Selecione...</option>


								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Categoria</label>
								<select value="Teste" class="form-control border-input">

									<option name="" id="">Selecione...</option>


								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Descrição</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

					</div> 

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Valor Título</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Valor Recebido</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Data Vencimento</label>
								<input type="date" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Data Recebimento</label>
								<input type="date" class="form-control border-input">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Forma de Pagamento</label>
								<select value="Teste" class="form-control border-input">

									<option name="" id="">Selecione...</option>


								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Nº Parcelas</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Juros Parcela</label>
								<input type="text" class="form-control border-input">
							</div>

						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Juros ao Dia</label>
								<input type="text" class="form-control border-input">
							</div>

						</div>

					</div>

				</form>

				<div class="text-center">
					<button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar</button>
				</div>
				<div class="clearfix"></div>

				<br>

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
							for($nCont = 0; $nCont<=0; $nCont++){

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


				
			</div> <!-- DIV RECEITA -->


			<div id="lancDesp">

				<div class="header">
					<h4 class="title text-center">Despesa</h4>
				</div>

				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Fornecedor</label>
								<select value="Teste" class="form-control border-input">

									<option name="" id="">Selecione...</option>


								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Categoria</label>
								<select value="Teste" class="form-control border-input">

									<option name="" id="">Selecione...</option>


								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Descrição</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

					</div> 

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Valor Título</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Valor Pago</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Data Vencimento</label>
								<input type="date" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Data Pagamento</label>
								<input type="date" class="form-control border-input">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Forma de Pagamento</label>
								<select value="Teste" class="form-control border-input">

									<option name="" id="">Selecione...</option>


								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Nº Parcelas</label>
								<input type="text" class="form-control border-input">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Juros Parcela</label>
								<input type="text" class="form-control border-input">
							</div>

						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleInputEmail1">Juros ao Dia</label>
								<input type="text" class="form-control border-input">
							</div>

						</div>

					</div>

				</form>

				<div class="text-center">
					<button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar</button>
				</div>
				<div class="clearfix"></div>

				<br>

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
							for($nCont = 0; $nCont<=0; $nCont++){

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


			

			
		</div> <!-- DIV DESP -->

	</div><!-- CARD RECEITAS DESPESAS -->

	<!-- .......................................................................................... -->

	<div id="divCategoria">
		<div class="card col-md-12">
			<div class="header">
				<h4 class="title text-center">Categorias</h4>
			</div>


			<form>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control border-input" disabled placeholder="Company" value="Eletropaulo">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tipo</label>
							<input type="text" class="form-control border-input" placeholder="Username" value="07.888.190/0001-09">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Cadastradas</label>
							<select value="Teste" class="form-control border-input">
								<option name="" id="">Empresa</option>
								<option name="" id="">Pessoa Física</option>
								<option name="" id="">Extra</option>
							</select>
						</div>
					</div>

				</form>
			</div> 

			<div class="text-center">
				<button type="submit" class="btn btn-info btn-fill btn-wd">Cadastrar</button>
			</div>
			<div class="clearfix"></div>

			<div class="table-responsive">
				<table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>Descrição</th>
						</tr>
					</thead>

					<tbody>

						<?php
						for($nCont = 0; $nCont<=0; $nCont++){

							echo "

							<tr>
							<td>$nCont</td>
							<td>Gasolina</td>
							<td>RCombustivel</td>
							</tr>
							";

						}

						?>



					</tbody>
				</table>

			</div> 



		</div><!-- CARD CATEGORIAS -->

	</div>

	<!-- .......................................................................................... -->

	<!-- .......................................................................................... -->
	<div id="divConsulta">

		<div class="card col-md-12">
			<div class="header">
				<h4 class="title text-center">Consulta</h4>
			</div>

			
			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group text-center">
						<label>Data Inicial</label>
						<input type="date" class="form-control border-input">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group text-center">
						<label>Data Final</label>
						<input type="date" class="form-control border-input">
					</div>
				</div>

			</div>
			
			

			<div class="text-center">
				<button type="submit" class="btn btn-info btn-fill btn-wd">Consultar</button>
			</div>

			<br>
			<div class="table-responsive">
				<table class="table table-bordered table-striped " width="100%" id="dataTable" cellspacing="0">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>Descrição</th>
						</tr>
					</thead>

					<tbody>

						<?php
						for($nCont = 0; $nCont<=0; $nCont++){

							echo "

							<tr>
							<td>$nCont</td>
							<td>Gasolina</td>
							<td>RCombustivel</td>
							</tr>
							";

						}

						?>



					</tbody>
				</table>

			</div> 


			<div class="clearfix"></div>

		</div><!-- CARD CONSULTA -->

	</div>

	<!-- .......................................................................................... -->


	<!-- Container -->
</div> 


<?php include_once('inferior.php');?>

<script src = "js/financas.js"></script>



