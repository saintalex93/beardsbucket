<?php include_once('superior.php');
require 'src/conecta.php';

$cod =  $_SESSION['user']['id'];
?>

<div class="content">

	<div class="container-fluid" >

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<ul class="nav nav-pills " style="
				padding-bottom: 20px">
				<li class="active" id = "btnLancamento" onclick="menuLancamento(this)">
					<a href="#"><span class="ti-credit-card"></span> Lançar</a>
				</li>

				<li class="" id="btnConsulta" onclick="menuLancamento(this)">
					<a href="#"><span class="ti-eye"></span> Consultar</a>
				</li>
			</ul>

			<div class="card" id="lancamento">

				<div class="content">

					<div class="row">
						<form>


							<div class="col-md-3">
								<input type="hidden" id="codLancamento">
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
					<button type="submit" class="btn btn-info btn-fill btn-wd" onclick="selecionaLancamento(this.value)" value="1" id="buttonLancamento">Cadastrar</button>

					<button type="submit" id="buttonExcluiLancamento" class="btn btn-info btn-fill btn-wd danger " onclick="deletaLancamento(document.getElementById('codLancamento').value)" value="1">Excluir</button>

				</div>

				<div class="text-center botaoCancelaLancamento">

					<button type="submit" class="btn btn-info btn-fill btn-wd danger cancelar" onclick="cancelaLancamento()" value="1" id="buttonCancelaLancamento">Cancelar</button>
				</div>

				<div class="form-group">
					<output type="text" class="text-center" id="retornoFormLancamento"></output>
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
									<th>Empresa</th>
									<th>Ações</th>
								</tr>
							</thead>

							<tbody id="tableConsulta">

								<?php

								$dataAtual = date('Y-m-d');


								$cSql = "SELECT
								LCT_COD, LCT_DESCRICAO, LCT_DTCADASTR, LCT_DTPAG, LCT_DTVENC, CONCAT('R$ ',format(LCT_VLRPAGO,2,'de_DE')) AS LCT_VLRPAGO,
								CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO, LCT_JUROSDIA, LCT_NPARC, LCT_STATUSLANC, LCT_TIPO, LCT_FRMPAG, 
								LANCAMENTO.CAT_COD, CLI_COD, CNT_COD, LANCAMENTO.USR_COD, USR_NOME, CATEGORIA.CAT_COD, CAT_NOME, COD_EMPRESA, EMP_NOME_EMPRESA 
								FROM LANCAMENTO INNER JOIN USUARIO ON LANCAMENTO.USR_COD = USUARIO.USR_COD 
								INNER JOIN CATEGORIA ON LANCAMENTO.CAT_COD=CATEGORIA.CAT_COD INNER JOIN EMPRESA ON COD_EMPRESA = EMP_COD WHERE COD_EMPRESA IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR = $cod) AND LCT_DTVENC LIKE '$dataAtual%'";


								$result = mysqli_query($conecta, $cSql); 

								while($row = mysqli_fetch_assoc($result))  
								{  
									echo "<tr id = 'linha".$row['LCT_COD']."'>
									<td name = 'lancamento".$row['LCT_COD']."' hidden>" . $row['LCT_COD'] . "</td>
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_DESCRICAO'] . "</td> 
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_VLRTITULO'] . "</td>
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_STATUSLANC'] . "</td> 
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_TIPO'] . "</td> 
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_FRMPAG'] . "</td> 
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['CAT_NOME'] . "</td> 
									<td name = 'lancamento".$row['LCT_COD']."'>" . $row['EMP_NOME_EMPRESA'] . "</td> 


									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_DTCADASTR'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_DTPAG'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_DTVENC'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_VLRPAGO'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_JUROSDIA'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['LCT_NPARC'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['CAT_COD'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['CLI_COD'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['CNT_COD'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['USR_COD'] . "</td> 
									<td hidden name = 'lancamento".$row['LCT_COD']."'>" . $row['COD_EMPRESA'] . "</td> 

									<td><button class = 'btn' id = 'lancamento". $row['LCT_COD'] ."' onclick = 'selecionaTabelaLancamento(this.id)'>Alterar</button>


									";
								}




								?>

							</tbody>
						</table>

					</div> 
				</div><!-- Content Tabela-->
			</div> <!-- Content FORM -->
			<div class="card" id="consulta">
				<div class="content">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Empresa</label>
								<select value="" class="form-control border-input" id="cmbEmpresaConsulta">
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Data Inicial</label>
								<input type="date" class="form-control border-input" id="dataInicial">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Data Final</label>
								<input type="date" class="form-control border-input" id="dataFinal" value = "<?php echo date('Y-m-d');?>">
							</div>
						</div>
					</div>
					<div class="text-center" style="margin-bottom: 20px;">
						<button class="btn btn-info btn-fill btn-wd" id="buttonLancamento" onclick="consultar()">Consultar</button>
					</div>

					<div class="form-group">
						<output type="text" class="text-center" id="retornoConsulta">Teste</output>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped text-center" width="100%" id="tableConsultalancamento" cellspacing="0">
							<thead>
								<tr>
									<th>Empresa</th>
									<th>Tipo</th>
									<th>Descrição</th>
									<th>Status</th>
									<th>Pagamento</th>
									<th>Categoria</th>
									<th>Valor Título</th>
									<th>Vencimento</th>

								</tr>
							</thead>

							<tbody id="tbodyConsultaLancamento">

							</tbody>
						</table>

					</div> 
				</div>
			</div>
		</div> <!-- ROW LANCAMENTO -->

	</div> <!-- CONTAINER FLUID -->
</div> <!-- CONTAINER -->


<?php include_once('inferior.php');?>

<script src = "js/crudAjaxLancamento.js"></script>

<script src = "js/jquery.maskMoney.min.js"></script>

<script src = "js/interatividades.js"></script>


<script>

	$("#txtValor").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});
	$("#txtValorPago").maskMoney({prefix:'R$', allowNegative: true, thousands:'.', decimal:',', affixesStay: true});


</script>



<!-- .......................................................................................... -->



<!-- <div class="text-center botoes">
<button type="submit" class="btn btn-info btn-fill btn-wd botao active" id="formReceita" onclick="fnHideFormFinancas(this.id)">RECEITA</button>
<button type="submit" class="btn btn-info btn-fill btn-wd botao" id="formDespesa" onclick="fnHideFormFinancas(this.id); document.all.formReceita.setAttribute('class', 'btn btn-info btn-fill btn-wd botao')">DESPESA</button>

</div> -->


