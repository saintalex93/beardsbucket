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


			var combo2 = document.getElementById("cmbEmpresaConsulta").length;

			for (i = 0; i <=combo2; i++) {
				var contador2 = document.getElementById("cmbEmpresaConsulta");	
				contador2.remove(contador2.i);
			}
			var x = document.getElementById("cmbEmpresaConsulta");
			var optionx = document.createElement("option");
			optionx.text = "Todas";
			optionx.value = 0;

			x.add(optionx);


			for (var i = 0; i<oDados.length; i++){
				var x = document.getElementById("cmbEmpresaConsulta");
				var optionx = document.createElement("option");
				optionx.text = oDados[i]['EMP_NOME_EMPRESA'];
				optionx.value = oDados[i]['EMP_COD'];
				x.add(optionx);
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
				var codCategoria = indiceTabela[16].innerText;
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
				var codConta = indiceTabela[18].innerText;
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
				var codCliente = indiceTabela[17].innerText;
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

		if(validaCampos()){

			var oPagina = new XMLHttpRequest();

			with (oPagina){

				open('GET','./src/CrudLancamento.php?funcao=insereLancamento&LCT_DESCRICAO='+descricao+'&LCT_DTPAG='+dataRecebimento+'&LCT_DTVENC='+dataVencimento+'&LCT_VLRPAGO='+valorPago+'&LCT_VLRTITULO='+valorTitulo+'&LCT_JUROSDIA='+juros+'&LCT_NPARC='+parcelas+'&LCT_STATUSLANC='+statusDesp+'&LCT_TIPO='+tipoDespesa+'&LCT_FRMPAG='+formaPagamento+'&CAT_COD='+categoria+'&CLI_COD='+cliente+'&CNT_COD='+conta);

				send();

				onload = function(){
					if(responseText.substring(0,14) != "erro ao lancar"){
						
						var oDados = JSON.parse(responseText);

						var tableCategoria = document.getElementById("tableConsulta");

						// var linhas = document.getElementById("tableConsulta").rows;

						// for (i= linhas.length-1; i>=1; i--){
						// 	document.getElementById("tableConsulta").deleteRow(i);

						// }

						for(i = 0; i<oDados.length; i++){

							tableCategoria.insertAdjacentHTML('afterbegin', 
								"<tr class = 'registroInserido' id = 'linha"+oDados[i]['LCT_COD']+"'>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_COD'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRPAGO'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_STATUSLANC'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_TIPO'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_FRMPAG'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td>"+
								"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['Vencimento'] + "</td>"+

								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTCADASTR'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTPAG'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENC'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRPAGO'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_NPARC'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_COD'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CLI_COD'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CNT_COD'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['USR_COD'] + "</td>"+
								"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+

								"<td><button class = 'btn' id = 'lancamento"+ oDados[i]['LCT_COD'] +"' onclick = 'selecionaTabelaLancamento(this.id)'>Alterar</button></tr> "

								);

							document.getElementById("retornoFormLancamento").style.display = "block";
							document.getElementById("retornoFormLancamento").innerHTML = "Dados inseridos com sucesso!";
							document.getElementById("retornoFormLancamento").setAttribute("class", "retSuccess");

							setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);
							setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);

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

	}

	else{

		if(validaCampos()){

			var codLancamento = document.getElementById('codLancamento').value;

			var oPagina = new XMLHttpRequest();

			with (oPagina){
				open('GET','./src/CrudLancamento.php?funcao=alteraLancamento&LCT_DTPAG='+dataRecebimento+'&LCT_DTVENC='+dataVencimento+'&TXTDESCRICAO='
					+descricao+'&LCT_JUROSDIA='+juros+'&LCT_VLRPAGO='+valorPago+'&LCT_VLRTITULO='+valorTitulo+
					'&LCT_STATUSLANC='+statusDesp+'&LCT_TIPO='+tipoDespesa+'&LCT_FORMAPAGAMENTO='+formaPagamento+
					'&txtCliente='+cliente+'&txtConta='+conta+'&txtCategoria='+categoria+'&CODLANCAMENTO='+codLancamento);

				send();

				onload = function(){

					if(responseText!= "Deu ruim"){


						var nameTd = "lancamento" + document.getElementById('codLancamento').value;
						var tr = "linha" + document.getElementById('codLancamento').value;
						with(document.all){
							txtDesc.value;
							document.getElementById(tr).className  = "registroInserido";

							document.getElementsByName(nameTd)[1].innerHTML = txtDesc.value;
							document.getElementsByName(nameTd)[2].innerHTML = txtValor.value;
							document.getElementsByName(nameTd)[3].innerHTML = txtValorPago.value;
							document.getElementsByName(nameTd)[4].innerHTML = cmbStatus.value;
							document.getElementsByName(nameTd)[5].innerHTML = cmbTipo.value;
							document.getElementsByName(nameTd)[6].innerHTML = cmbFormaPagamento.value;
							var categoriaText = cmbCategoria.options[cmbCategoria.selectedIndex].text;
							document.getElementsByName(nameTd)[7].innerHTML = categoriaText;

							var empresa = cmbEmpresa.options[cmbEmpresa.selectedIndex].text;
							document.getElementsByName(nameTd)[8].innerHTML = empresa;

							var DataBencimento = txtDataVenc.value.substring(8,10) + "/" + txtDataVenc.value.substring(5,7) + "/" + txtDataVenc.value.substring(0,4);

							document.getElementsByName(nameTd)[9].innerHTML = DataBencimento;

						}

						document.getElementsByName(nameTd)[0].parentNode.className = "registroInserido";
						

						document.getElementById("retornoFormLancamento").style.display = "block";
						document.getElementById("retornoFormLancamento").innerHTML = "Dados alterados com sucesso!";
						document.getElementById("retornoFormLancamento").setAttribute("class", "retSuccess");

						setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);
						setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);
						
						cancelaLancamento();


					}

					else{
						document.getElementById("retornoFormLancamento").style.display = "block";
						document.getElementById("retornoFormLancamento").innerHTML = "Erro ao alterar dados.";
						document.getElementById("retornoFormLancamento").setAttribute("class", "retDanger");

						setTimeout(function(){ document.getElementById("retornoFormLancamento").style.display = "none"; }, 3000);

					}

				}
			}


		}
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

				// var parent = document.getElementById("tableConsulta");
				// var child = document.getElementById(nomeLinha);
				// parent.removeChild(child);

				document.getElementById(nomeLinha).remove();

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

function validaCampos(){
	with (document.all){

		if(cmbEmpresa.selectedIndex == 0){
			alert("Selecione a Empresa");
			cmbEmpresa.focus();
			return false;
		}

		else if(cmbTipo.selectedIndex == 0){
			alert("Selecione o Tipo");
			cmbTipo.focus();
			return false;
		}


		else if(cmbCategoria.selectedIndex == 0){
			alert("Selecione a Categoria");
			cmbCategoria.focus();
			return false;
		}
		else if(cmbConta.selectedIndex == 0){
			alert("Selecione a Conta");
			cmbConta.focus();
			return false;
		}
		else if(cmbCliente.selectedIndex == 0){
			alert("Selecione o Cliente / Fornecedor");
			cmbCliente.focus();
			return false;
		}
		else if(txtDesc.value.trim().length<1){
			alert("Preencha a Descrição");
			cmbCliente.focus();
			return false;
		}

		else if(txtValor.value.trim().length<1){
			alert("Preencha o Valor");
			txtValor.focus();
			return false;
		}

		else if(txtDataVenc.value.trim().length<1){
			alert("Preencha a Data de Vencimento");
			txtDataVenc.focus();
			return false;
		}

		else if(cmbFormaPagamento.selectedIndex == 0){
			alert("Selecione a forma de Pagamento");
			cmbFormaPagamento.focus();
			return false;
		}

		else if(cmbStatus.selectedIndex == 0){
			alert("Selecione o Status");
			cmbStatus.focus();
			return false;
		}

		else if(cmbStatus.selectedIndex == 2){
			if(txtDataRecebimento.value.trim().length<1){
				alert("Preencha a Data de Recebimento");
				txtDataRecebimento.focus();
				return false;
			}

			if(txtValorPago.value.trim().length<1){
				alert("Preencha o valor Pago / Recebido");
				txtValorPago.focus();
				return false;
			}
			return true;
		}

		else{
			return true;
		}


	}
}


function selecionaTabelaLancamento(codLancamento){


	var indiceTabela = document.getElementsByName(codLancamento);
	var codEmpresa = indiceTabela[20].innerText;

	atualizaOsParanaue(codEmpresa, codLancamento);

	document.getElementById("buttonLancamento").value = 2;


	document.getElementById("cmbEmpresa").value = codEmpresa;	


	var dataLancamento = indiceTabela[10].innerText.substring(0, 10),
	dataRecebimento = indiceTabela[11].innerText.substring(0, 10),
	dataVencimento = indiceTabela[12].innerText.substring(0, 10);


	with(document.all){
		txtParcelas.disabled = true;
		cmbEmpresa.disabled = true;

		codLancamento.value = indiceTabela[0].innerText;
		txtDesc.value = indiceTabela[1].innerText;
		txtValor.value = indiceTabela[2].innerText.replace("R$ ", "R$");
		txtValorPago.value = indiceTabela[3].innerText.replace("R$ ", "R$");;
		cmbStatus.value = indiceTabela[4].innerText;
		cmbTipo.value = indiceTabela[5].innerText;
		cmbFormaPagamento.value = indiceTabela[6].innerText;

		txtDataLancamento.value = dataLancamento;
		txtDataRecebimento.value = dataRecebimento;
		txtDataVenc.value = dataVencimento;
		txtJuros.value = indiceTabela[14].innerText;
		txtParcelas.value = 1;

		buttonExcluiLancamento.style.display = "inline";
		buttonCancelaLancamento.style.display = "inline";
		buttonLancamento.value = 2;
		buttonLancamento.innerHTML = "Alterar";

		statusPagamento();

	}

}

function cancelaLancamento(){


	with(document.all){
		buttonExcluiLancamento.style.display = "none";
		buttonCancelaLancamento.style.display = "none";
		buttonLancamento.value = 1;
		buttonLancamento.innerHTML = "Cadastrar";
		cmbEmpresa.disabled = false;
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
	txtDataVenc.value = new Date().toISOString().substr(0, 10).replace('T', ' ');
	cmbFormaPagamento.selectedIndex = 0;
	txtParcelas.value = "0";
	txtJuros.value = "0";
	cmbStatus.selectedIndex = 0;
	txtDataRecebimento.value = "";
	txtValorPago.value = "";
	txtDataLancamento.value =  new Date().toISOString().substr(0, 10).replace('T', ' ');

}


function consultar(){

	var empresaConsulta = document.getElementById("cmbEmpresaConsulta").value,
	dataInicial = document.getElementById("dataInicial").value,
	dataFinal = document.getElementById("dataFinal").value;

	if(dataFinal < dataInicial || dataInicial > dataFinal || dataInicial == "" || dataFinal == "" ){
		document.getElementById("retornoConsulta").style.display = "block";
		document.getElementById("retornoConsulta").innerHTML = "Datas Inválidas";
		document.getElementById("retornoConsulta").setAttribute("class", "retDanger");

		setTimeout(function(){ document.getElementById("retornoConsulta").style.display = "none"; }, 3000);

	}

	else{

		var oPagina = new XMLHttpRequest();

		with (oPagina){

			open('GET','./src/CrudLancamento.php?funcao=buscaLancamento&empConsulta='+empresaConsulta+
				'&dataInicial='+dataInicial+'&dataFinal='+dataFinal);

			send();

			onload = function(){
				if(responseText != "erro ao consultar"){

					var oDados = JSON.parse(responseText);

					var linhas = document.getElementById("table").rows;
					for (i= linhas.length-1; i>=1; i--){
						document.getElementById("table").deleteRow(i);

					}

					var corpotable = document.getElementById("tableConsulta");

					for(i = 0; i<oDados.length; i++){

						corpotable.insertAdjacentHTML('afterbegin', 
							"<tr id = 'linha"+oDados[i]['LCT_COD']+"'>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_COD'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRPAGO'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_STATUSLANC'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_TIPO'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_FRMPAG'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td>"+
							"<td name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['Vencimento'] + "</td>"+

							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTCADASTR'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTPAG'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENC'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRPAGO'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_NPARC'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_COD'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CLI_COD'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CNT_COD'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['USR_COD'] + "</td>"+
							"<td hidden name = 'lancamento"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
							
							"<td><button class = 'btn' id = 'lancamento"+ oDados[i]['LCT_COD'] +"' onclick = 'selecionaTabelaLancamento(this.id)'>Alterar</button></tr>"

							);

					}
				}

				else{
					var linhas = document.getElementById("tableConsultalancamento").rows;
					for (i= linhas.length-1; i>=1; i--){
						document.getElementById("tableConsultalancamento").deleteRow(i);

					}

					document.getElementById("retornoConsulta").style.display = "block";
					document.getElementById("retornoConsulta").innerHTML = "Sem registros";
					document.getElementById("retornoConsulta").setAttribute("class", "retDanger");
					setTimeout(function(){ document.getElementById("retornoConsulta").style.display = "none"; }, 3000);

				}
			}
		}
	}
}

(function (){

	atualizaComboEmpresa();
	limpaCombo("cmbCliente");
	limpaCombo("cmbConta");
	limpaCombo("cmbCategoria");
	bloqueiaCampos();

}());
