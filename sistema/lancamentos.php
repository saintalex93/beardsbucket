<?php include_once('superior.php');?>

<div class="content">

	<div class="container-fluid" >

		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="card">
					<div class="header">
						<h4 class="title">Lançamento</h4>
					</div>

					<div class="content">

						<form>
							<div class="row">

								<div class="col-md-3">
									<div class="form-group">
										<label>Tipo</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Despesa</option>
											<option name="" id="">Receita</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Categoria</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Água</option>
											<option name="" id="">Luz</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Empresa / Grupo</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Pessoal</option>
											<option name="" id="">BeardsWeb</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Conta</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Itaú</option>
											<option name="" id="">Bradesco</option>
										</select>
									</div>
								</div>

							</div> 

							<div class="row">

								<div class="col-md-3">
									<div class="form-group">
										<label>Cliente / Fornecedor</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Alex</option>
											<option name="" id="">Sabesp</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Descrição</label>
										<input type="text" class="form-control border-input">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="">Valor Título</label>
										<input type="text" class="form-control border-input">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="">Data Vencimento</label>
										<input type="date" class="form-control border-input">
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-3">
									<div class="form-group">
										<label for="">Forma de Pagamento</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Dinheiro</option>
											<option name="" id="">Cartão</option>
											<option name="" id="">Cheque</option>
											<option name="" id="">Depósito</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Nº Parcelas</label>
										<input type="text" class="form-control border-input">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Juros ao Dia</label>
										<input type="text" class="form-control border-input">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Data de Lançamento</label>
										<input type="text" class="form-control border-input" disabled>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Status</label>
										<select value="" class="form-control border-input">
											<option name="" id="">Pago / Recebido</option>
											<option name="" id="">A Pagar / Receber</option>
										</select>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="">Data de Recebimento</label>
										<input type="text" class="form-control border-input">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Valor Pago/Recebido</label>
										<input type="text" class="form-control border-input" >
									</div>
								</div>

							</div>

						</div>

					</form>

					<div class="text-center">
						<button type="submit" class="btn btn-info btn-fill btn-wd botao" onclick="selectConsulta()">Cadastrar</button>
					</div>

					<div class="content"> <!-- Content Tabela -->
						<div class="table-responsive">
							<table class="table table-bordered table-striped text-center" width="100%" id="dataTable" cellspacing="0">
								<thead>
									<tr>
										<th>Código</th>
										<th>Descrição</th>
										<th>Data</th>
										<th>Valor</th>
										<th>Forma de Pagamento</th>
										<th>Cliente / Fornecedor</th>
										<th>Ações</th>


									</tr>
								</thead>

								<tbody id="tableConsulta">
									
								</tbody>
							</table>

						</div> 
					</div><!-- Content Tabela-->
				</div> <!-- Content FORM -->
			</div> <!-- CARD  -->
		</div> <!-- ROW LANCAMENTO -->

	</div> <!-- CONTAINER FLUID -->
</div> <!-- CONTAINER -->


<?php include_once('inferior.php');?>

<script src = "js/ajaxConsulta.js"></script>







<!-- .......................................................................................... -->



<!-- <div class="text-center botoes">
<button type="submit" class="btn btn-info btn-fill btn-wd botao active" id="formReceita" onclick="fnHideFormFinancas(this.id)">RECEITA</button>
<button type="submit" class="btn btn-info btn-fill btn-wd botao" id="formDespesa" onclick="fnHideFormFinancas(this.id); document.all.formReceita.setAttribute('class', 'btn btn-info btn-fill btn-wd botao')">DESPESA</button>

</div> -->


