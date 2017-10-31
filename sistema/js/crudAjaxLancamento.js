var codigo;

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

function atualizaComboCategoria(codEmpr, codLancamento){
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

			if(codLancamento != undefined){

				var indiceTabela = document.getElementsByName(codLancamento);
				var codCategoria = indiceTabela[14].innerText;
				document.getElementById('cmbCategoria').value = codCategoria;

			}
		}
	}
}

function atualizaComboConta(codEmpr, codLancamento){
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

			if(codLancamento != undefined){

				var indiceTabela = document.getElementsByName(codLancamento);
				var codConta = indiceTabela[16].innerText;
				document.getElementById('cmbConta').value = codConta;

			}
		}
	}
}

function atualizaComboCliente(codEmpr, codLancamento){
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

			if(codLancamento != undefined){

				var indiceTabela = document.getElementsByName(codLancamento);
				var codCliente = indiceTabela[15].innerText;
				cmbCliente.value = codCliente;

			}
		}
	}
}

function atualizaOsParanaue(codEmpresa, codLancamento){

	if(codEmpresa !=0){

		atualizaComboCliente(codEmpresa, codLancamento);
		atualizaComboConta(codEmpresa, codLancamento);
		atualizaComboCategoria(codEmpresa, codLancamento);
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
		var date2 = new Date().toISOString().substr(0, 10).replace('T', ' ');
		txtDataRecebimento.value = date2;
		txtValorPago.value = txtValor.value;
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

				if(responseText.substring(0,14) != "erro ao lancar"){

					var oDados = JSON.parse(responseText);

					var tableCategoria = document.getElementById("tableConsulta");

					var linhas = document.getElementById("tableConsulta").rows;

					for (i= linhas.length-1; i>=1; i--){
						document.getElementById("tableConsulta").deleteRow(i);

					}

					for(i = 0; i<oDados.length; i++){

						tableCategoria.insertAdjacentHTML('beforebegin', 
							"<tr id = 'linha"+oDados[i]['LCT_COD']+"''><td name = 'lancamento"+oDados[i]['LCT_COD']+"' hidden>" + oDados[i]['LCT_COD'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td> "+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td> "+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_STATUSLANC'] + "</td> "+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_TIPO'] + "</td> "+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_FRMPAG'] + "</td> "+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+

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

						document.getElementById("retornoFormLancamento").style.display = "block";
						document.getElementById("retornoFormLancamento").innerHTML = "Dados inseridos com sucesso!";
						document.getElementById("retornoFormLancamento").setAttribute("class", "retSuccess");

						setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);

						cancelaLancamento();
					}
				}

				else{
					document.getElementById("retornoFormLancamento").style.display = "block";
					document.getElementById("retornoFormLancamento").innerHTML = "Erro ao inserir dados.";
					document.getElementById("retornoFormLancamento").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);


				}

			}

		}

	}

	else{





	}


}


function deletaLancamento(codLancamento){



	var nomeLinha = "linha"+codLancamento;


	var oPagina = new XMLHttpRequest();

	with(oPagina){


		open('GET','./src/CrudLancamento.php?funcao=excluiLancamento&CODLANCAMENTO='+codLancamento);


		send();

		onload = function(){

			if(responseText == "Deletado"){

				var parent = document.getElementById("tableConsulta");
				var child = document.getElementById(nomeLinha);
				parent.removeChild(child);

				document.getElementById("retornoFormLancamento").style.display = "block";
				document.getElementById("retornoFormLancamento").innerHTML = "Dados deletados com sucesso!";
				document.getElementById("retornoFormLancamento").setAttribute("class", "retSuccess");

				setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);

				cancelaLancamento();

			}
			else{
				document.getElementById("retornoFormLancamento").style.display = "block";
				document.getElementById("retornoFormLancamento").innerHTML = "Erro ao deletar dados";
				document.getElementById("retornoFormLancamento").setAttribute("class", "retDanger");

				setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);

				cancelaLancamento();
			}



		}

	}


}



function selecionaTabelaLancamento(codLancamento){

	

	var indiceTabela = document.getElementsByName(codLancamento);
	var codEmpresa = indiceTabela[18].innerText;

	atualizaOsParanaue(codEmpresa, codLancamento);

	document.getElementById("buttonLancamento").value = 2;

	statusPagamento();

	document.getElementById("cmbEmpresa").value = codEmpresa;	


	var dataLancamento = indiceTabela[8].innerText.substring(0, 10),
	dataRecebimento = indiceTabela[9].innerText.substring(0, 10),
	dataVencimento = indiceTabela[10].innerText.substring(0, 10);


	with(document.all){
		txtParcelas.disabled = true;


		codLancamento.value = indiceTabela[0].innerText;
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


		buttonExcluiLancamento.style.display = "inline";
		buttonCancelaLancamento.style.display = "inline";
		buttonLancamento.value = 2;
		buttonLancamento.innerHTML = "Alterar";


		
	}

}

function cancelaLancamento(){


	with(document.all){
		buttonExcluiLancamento.style.display = "none";
		buttonCancelaLancamento.style.display = "none";
		buttonLancamento.value = 1;
		buttonLancamento.innerHTML = "Cadastrar";
	}

	limpaCampos();
	bloqueiaCampos();

}

function limpaCampos(){
	cmbEmpresa.selectedIndex = 0;
	cmbTipo.selectedIndex = 0;
	cmbCategoria.selectedIndex = 0;
	cmbConta.selectedIndex = 0;
	cmbCliente.selectedIndex = 0;
	txtDesc.value = "";
	txtValor.value = "";
	txtDataVenc.value = "";
	cmbFormaPagamento.selectedIndex = 0;
	txtParcelas.value = "";
	txtJuros.value = "";
	cmbStatus.selectedIndex = 0;
	txtDataRecebimento.value = "";
	txtValorPago.value = "";
}




(function (){

	atualizaComboEmpresa();
	limpaCombo("cmbCliente");
	limpaCombo("cmbConta");
	limpaCombo("cmbCategoria");
	bloqueiaCampos();

}());