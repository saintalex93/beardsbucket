function atualizaComboEmpresa(){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=comboConta');

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			var combo = document.getElementById("cmbEmpresa").length;
			

			for (i = 0; i <=combo; i++) {
				var contador = document.getElementById("cmbEmpresa");	
				contador.remove(contador.i);
			}

			var r = document.getElementById("cmbEmpresa");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			optionr.value = 0;

			r.add(optionr);


			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbEmpresa");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['EMP_NOME_EMPRESA'];
				optionr.value = oDados[i]['EMP_COD'];
				r.add(optionr);
			}

		}
	}
}

function atualizaComboCategoria(codEmpr){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudLancamento.php?funcao=comboCategoria&CODEMPRESA='+codEmpr);

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			var combo = document.getElementById("cmbCategoria").length;
			

			for (i = 0; i <=combo; i++) {
				var contador = document.getElementById("cmbCategoria");	
				contador.remove(contador.i);
			}

			var r = document.getElementById("cmbCategoria");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			optionr.value = 0;

			r.add(optionr);


			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbCategoria");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['CAT_NOME'];
				optionr.value = oDados[i]['CAT_COD'];
				r.add(optionr);
			}

		}
	}
}

function atualizaComboConta(codEmpr){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudLancamento.php?funcao=comboConta&CODEMPRESA='+codEmpr);

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			var combo = document.getElementById("cmbConta").length;
			

			for (i = 0; i <=combo; i++) {
				var contador = document.getElementById("cmbConta");	
				contador.remove(contador.i);
			}
			
			var r = document.getElementById("cmbConta");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			optionr.value = 0;
			r.add(optionr);


			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbConta");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['CNT_NOME'];
				optionr.value = oDados[i]['CNT_COD'];
				r.add(optionr);
			}

		}
	}
}

function atualizaComboCliente(codEmpr){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudLancamento.php?funcao=comboCliente&CODEMPRESA='+codEmpr);

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			var combo = document.getElementById("cmbCliente").length;
			

			for (i = 0; i <=combo; i++) {
				var contador = document.getElementById("cmbCliente");	
				contador.remove(contador.i);
			}
			
			var r = document.getElementById("cmbCliente");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			optionr.value = 0;
			r.add(optionr);


			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbCliente");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['CLI_NOME'];
				optionr.value = oDados[i]['CLI_COD'];
				r.add(optionr);
			}

		}
	}
}

function atualizaOsParanaue(codEmpresa){

	if(codEmpresa !=0){

		atualizaComboCliente(codEmpresa);
		atualizaComboConta(codEmpresa);
		atualizaComboCategoria(codEmpresa);
		desbloqueiaCampos();
	}

	else{
		limpaCombo("cmbCliente");
		limpaCombo("cmbConta");
		limpaCombo("cmbCategoria");
		bloqueiaCampos();
	}
}


function limpaCombo(id){

	var combo = document.getElementById(id).length;

	for (i = 0; i <=combo; i++) {
		var contador = document.getElementById(id);	
		contador.remove(contador.i);
	}

	var r = document.getElementById(id);
	var optionr = document.createElement("option");
	optionr.text = "Selecione...";
	optionr.value = 0;
	r.add(optionr);

}

function bloqueiaCampos(){

	with(document.all){
		cmbTipo.disabled = true;
		cmbCategoria.disabled = true;
		cmbConta.disabled = true;
		cmbCliente.disabled = true;
		txtDesc.disabled = true;
		txtValor.disabled = true;
		txtDataVenc.disabled = true;
		cmbFormaPagamento.disabled = true;
		txtParcelas.disabled = true;
		txtJuros.disabled = true;
		cmbStatus.disabled = true;
		txtDataRecebimento.disabled = true;
		txtValorPago.disabled = true;
	}
}

function desbloqueiaCampos(){

	with(document.all){
		cmbTipo.disabled = false;
		cmbCategoria.disabled = false;
		cmbConta.disabled = false;
		cmbCliente.disabled = false;
		txtDesc.disabled = false;
		txtValor.disabled = false;
		txtDataVenc.disabled = false;
		cmbFormaPagamento.disabled = false;
		txtParcelas.disabled = false;
		txtJuros.disabled = false;
		cmbStatus.disabled = false;
		// txtDataRecebimento.disabled = true;
		// txtValorPago.disabled = true;
	}
}



function statusPagamento(){

	if(document.getElementById("cmbStatus").selectedIndex == 2){
		txtDataRecebimento.disabled = false;
		txtValorPago.disabled = false;
	}

	else{

		txtDataRecebimento.disabled = true;
		txtValorPago.disabled = true;
	}

}












// INSERE LANÇAMENtO


function selecionaLancamento(param){


	with(document.all){
		var empresa = cmbEmpresa.value ,
		tipoDespesa = cmbTipo.value ,
		categoria = cmbCategoria.value ,
		conta = cmbConta.value ,
		cliente = cmbCliente.value ,
		descricao = txtDesc.value ,
		valorTitulo = txtValor.value ,
		dataVencimento = txtDataVenc.value ,
		formaPagamento = cmbFormaPagamento.value ,
		parcelas = txtParcelas.value,
		juros = txtJuros.value,
		dataLancamento = txtDataLancamento.value,
		statusDesp = cmbStatus.value,
		dataRecebimento = txtDataRecebimento.value,
		valorPago = txtValorPago.value;

		if(dataRecebimento == "")
			dataRecebimento = "NULL";


		if(txtValor.value.trim().length<=0){
			valorTitulo = "0.00";
		}
		else{	
			valorTitulo = valorTitulo.replace('R$','').replace('.','').replace(',','.').trim();
		}

		if(txtValorPago.value.trim().length<=0){
			valorPago = "0.00";
		}
		else{	
			valorPago = valorPago.replace('R$','').replace('.','').replace(',','.').trim();
		}

		if(cmbStatus.selectedIndex == 1){
			dataRecebimento = "NULL";
			valorPago = "NULL";
		}

		if(txtParcelas.value.trim().length<=0){
			parcelas = 1;
		}

		if(txtJuros.value.trim().length<=0){
			juros = 0;
		}

	}

	if (param == 1){

		var oPagina = new XMLHttpRequest();

		with (oPagina){


			open('GET','./src/CrudLancamento.php?funcao=insereLancamento&LCT_DESCRICAO='+descricao+'&LCT_DTPAG='+dataRecebimento+'&LCT_DTVENC='+dataVencimento+'&LCT_VLRPAGO='+valorPago+'&LCT_VLRTITULO='+valorTitulo+'&LCT_JUROSDIA='+juros+'&LCT_NPARC='+parcelas+'&LCT_STATUSLANC='+statusDesp+'&LCT_TIPO='+tipoDespesa+'&LCT_FRMPAG='+formaPagamento+'&CAT_COD='+categoria+'&CLI_COD='+cliente+'&CNT_COD='+conta);

			send();

			onload = function(){
				alert(responseText);

				var oDados = JSON.parse(responseText);

				var tableCategoria = document.getElementById("tableConsulta");

				var linhas = document.getElementById("tableConsulta").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableConsulta").deleteRow(i);

				}

				for(i = 0; i<oDados.length; i++){

					tableCategoria.insertAdjacentHTML('beforebegin', 
						"<tr><td name = 'lancamento"+oDados[i]['LCT_COD']+"' hidden>" + oDados[i]['LCT_COD'] + "</td>"+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td> "+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td> "+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_STATUSLANC'] + "</td> "+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_TIPO'] + "</td> "+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_FRMPAG'] + "</td> "+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
						"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['USR_NOME'] + "</td> "+

						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTCADASTR'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTPAG'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENC'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRPAGO'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_NPARC'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_COD'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CLI_COD'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CNT_COD'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['USR_COD'] + "</td> "+
						"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['COD_EMPRESA'] + "</td> "+

						


						"<td><button class = 'btn' id = 'lancamento"+ oDados[i]['LCT_COD'] +"' onclick = 'selecionaTabelaLancamento(this.id)'>Alterar</button></tr> "

						);
				}


			}


		}

	}


}



function selecionaTabelaLancamento(codLancamento){

	var indiceTabela = document.getElementsByName(codLancamento);

	var dataLancamento = indiceTabela[8].innerText.substring(0, 10),
	dataRecebimento = indiceTabela[9].innerText.substring(0, 10),
	dataVencimento = indiceTabela[10].innerText.substring(0, 10);

	// dataLancamento = dataLancamentoSF.substring(8, 10) + "/" + dataLancamentoSF.substring(5, 7) + "/" + dataLancamentoSF.substring(0, 4),
	// dataRecebimento = dataRecebimentoSF.substring(8, 10) + "/" + dataRecebimentoSF.substring(5, 7) + "/" + dataRecebimentoSF.substring(0, 4),
	// dataVencimento = dataVencimentoSF.substring(8, 10) + "/" + dataVencimentoSF.substring(5, 7) + "/" + dataVencimentoSF.substring(0, 4);

	alert(dataLancamento);


	with(document.all){
		var codigo = indiceTabela[0].innerText;
		txtDesc.value = indiceTabela[1].innerText;
		txtValor.value = indiceTabela[2].innerText.replace("R$ ", "R$");
		cmbStatus.value = indiceTabela[3].innerText;
		cmbTipo.value = indiceTabela[4].innerText;
		cmbFormaPagamento.value = indiceTabela[5].innerText;

		txtDataLancamento.value = dataLancamento;
		txtDataRecebimento.value = dataRecebimento;
		txtDataVenc.value = dataVencimento;
		txtValorPago.value = indiceTabela[11].innerText.replace("R$ ", "R$");;
		txtJuros.value = indiceTabela[12].innerText;
		txtParcelas.value = 1;

		cmbCategoria.value = indiceTabela[14].innerText;
		cmbCliente.value = indiceTabela[15].innerText;
		cmbConta.value = indiceTabela[16].innerText;
		cmbEmpresa.value = indiceTabela[18].innerText;	
		
	}

}



 // open('GET','./src/CrudLancamento.php?
 // funcao=insereLancamento&LCT_DESCRICAO=Teste Sql&LCT_DTPAG=2017-01-01&
 // LCT_DTVENC=2017-01-01&LCT_VLRPAGO=20.00&LCT_VLRTITULO=20.00&LCT_JUROSDIA
 // =null&LCT_NPARC=5&LCT_STATUSLANC=Pago / Recebido&LCT_TIPO=Despesa&LCT_FRMPAG=
 // Dinheiro&CAT_COD=5&CLI_COD=2&CNT_COD=3






 (function (){

 	atualizaComboEmpresa();
 	limpaCombo("cmbCliente");
 	limpaCombo("cmbConta");
 	limpaCombo("cmbCategoria");
 	bloqueiaCampos();

 }());
