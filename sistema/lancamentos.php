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
										<label for=""><span id = "cmpObrgt">* </span>Empresa / Grupo</label>
										<select value="" class="form-control border-input" id="cmbEmpresa" onchange="atualizaOsParanaue(this.value)">
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label><span id = "cmpObrgt">* </span>Tipo</label>
										<select value="" class="form-control border-input" id="cmbTipo">
											<option name="" id="">Selecione...</option>
											<option name="" id="">Despesa</option>
											<option name="" id="">Receita</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label><span id = "cmpObrgt">* </span>Categoria</label>
										<select value="" class="form-control border-input" id="cmbCategoria">
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Conta</label>
										<select value="" class="form-control border-input" id="cmbConta">

										</select>
									</div>
								</div>

							</div> 

							<div class="row">

								<div class="col-md-3">
									<div class="form-group">
										<label><span id = "cmpObrgt">* </span>Cliente / Fornecedor</label>
										<select value="" class="form-control border-input" id="cmbCliente">

										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Descrição</label>
										<input type="text" class="form-control border-input" id="txtDesc">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Valor Título</label>
										<input type="text" class="form-control border-input" id="txtValor">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Data Vencimento</label>
										<input type="date" class="form-control border-input" id="txtDataVenc">
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-3">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Forma de Pagamento</label>
										<select value="" class="form-control border-input" id="cmbFormaPagamento">
											<option name="" id="">Selecione...</option>
											<option name="" id="" value="Dinheiro">Dinheiro</option>
											<option name="" id="" value="Cartão">Cartão</option>
											<option name="" id="" value="Cheque">Cheque</option>
											<option name="" id="" value="Depósito">Depósito</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Nº Parcelas</label>
										<input type="number" class="form-control border-input" id="txtParcelas">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Juros ao Dia</label>
										<input type="number" class="form-control border-input" id="txtJuros">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Data de Lançamento</label>
										<input type="date" class="form-control border-input" disabled id="txtDataLancamento" value = "<?php echo date('Y-m-d');?>">
										
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for=""><span id = "cmpObrgt">* </span>Status</label>
										<select value="" class="form-control border-input" id="cmbStatus" onchange="statusPagamento()">
											<option name="" id="">Selecione...</option>
											<option name="" id="" value="A Pagar - Receber">A Pagar / Receber</option>
											<option name="" id="" value="Pago - Recebido">Pago / Recebido</option>
										</select>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="">Data de Recebimento</label>
										<input type="date" class="form-control border-input" id="txtDataRecebimento">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="">Valor Pago/Recebido</label>
										<input type="text" class="form-control border-input" id="txtValorPago" >
									</div>
								</div>

							</div>

						</div>

					</form>

					<div class="text-center">
						<button type="submit" class="btn btn-info btn-fill btn-wd botao" onclick="selecionaLancamento(this.value)" value="1">Cadastrar</button>
					</div>

					<div class="content"> <!-- Content Tabela -->
						<div class="table-responsive">
							<table class="table table-bordered table-striped text-center" width="100%" id="dataTable" cellspacing="0">
								<thead>
									<tr>
										<th hidden>Código</th>
										<th>Descrição</th>
										<th>Valor Título</th>
										<th>Status</th>
										<th>Tipo</th>
										<th>Pagamento</th>
										<th>Categoria</th>
										<th>Usuário</th>
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

<script src = "js/crudAjaxLancamento.js"></script>

<script src = "js/jquery.maskMoney.min.js"></script>

<script>

	$("#txtValor").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
	$("#txtValorPago").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});


</script>



<!-- .......................................................................................... -->



<!-- <div class="text-center botoes">
<button type="submit" class="btn btn-info btn-fill btn-wd botao active" id="formReceita" onclick="fnHideFormFinancas(this.id)">RECEITA</button>
<button type="submit" class="btn btn-info btn-fill btn-wd botao" id="formDespesa" onclick="fnHideFormFinancas(this.id); document.all.formReceita.setAttribute('class', 'btn btn-info btn-fill btn-wd botao')">DESPESA</button>

</div> -->


