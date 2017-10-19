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
		txtDataRecebimento.disabled = false;
		txtValorPago.disabled = false;
	}
}


(function (){

	atualizaComboEmpresa();
	limpaCombo("cmbCliente");
	limpaCombo("cmbConta");
	limpaCombo("cmbCategoria");
	bloqueiaCampos();

}());
