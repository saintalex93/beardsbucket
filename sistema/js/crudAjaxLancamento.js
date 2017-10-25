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
		txtStatus.disabled = true;
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
		txtStatus.disabled = false;
		txtDataRecebimento.disabled = true;
		txtValorPago.disabled = true;
	}
}



function statusPagamento(){

	if(document.getElementById("txtStatus").selectedIndex == 2){
		txtDataRecebimento.disabled = false;
		txtValorPago.disabled = false;
	}

	else{

		txtDataRecebimento.disabled = true;
		txtValorPago.disabled = true;
	}

}


function selecionaLancamento(param){

// INSERE LANÇAMENtO

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
	status = txtStatus.value,
	dataRecebimento = txtDataRecebimento.value,
	valorPago = txtValorPago.value;

}
alert(dataVencimento);
alert(dataRecebimento);

console.log("Desc:",descricao, "DT RECEB:", dataRecebimento,"DT VENC:", dataVencimento, "VLR PAGO:",valorPago,"VLR TITULO:",valorTitulo,"juros:",juros,"PARCELAS:",parcelas,"STATUS:",status,"TIPO DESP:",tipoDespesa,"FORMA PAGAMENTO:",formaPagamento,"CATEGORIA:",categoria,"CLIENTE:",cliente,"CONTA:",conta);



if (param == 1){


	var oPagina = new XMLHttpRequest();

	with (oPagina){

		open('GET','./src/CrudLancamento.php?funcao=insereLancamento&LCT_DESCRICAO='+descricao+'&LCT_DTPAG='+dataRecebimento+'&LCT_DTVENC='+dataVencimento+'&LCT_VLRPAGO='+valorPago+'&LCT_VLRTITULO='+valorTitulo+'&LCT_JUROSDIA='+juros+'&LCT_NPARC='+parcelas+'&LCT_STATUSLANC='+status+'&LCT_TIPO='+tipoDespesa+'&LCT_FRMPAG='+formaPagamento+'&CAT_COD='+categoria+'&CLI_COD='+cliente+'&CNT_COD='+conta);

// open('GET','./src/CrudLancamento.php?funcao=insereLancamento&LCT_DESCRICAO=Teste Sql&LCT_DTPAG=2017-01-01&LCT_DTVENC=2017-01-01&LCT_VLRPAGO=20.00&LCT_VLRTITULO=20.00&LCT_JUROSDIA=null&LCT_NPARC=5&LCT_STATUSLANC=Pago / Recebido&LCT_TIPO=Despesa&LCT_FRMPAG=Dinheiro&CAT_COD=5&CLI_COD=2&CNT_COD=3');



// Desc:  DT RECEB: 12/01/2017 DT VENC: 2017-12-31    CATEGORIA: 5 CLIENTE: 2 CONTA: 3

send();


onload = function(){

	alert(responseText);

	var oDados = JSON.parse(responseText);

	alert(responseText);

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
