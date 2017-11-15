function datas(index){

	if(index == 4){
		document.getElementById("datas").style.display = 'block';
	}
	else{
		document.getElementById("datas").style.display = 'none';
	}

}

function consultar(){
	var intervaloData = "",
	intervaloPesquisa = document.getElementById("intervaloPesquisa").value;
	dataInicial = "",
	dataFinal = "",
	empresa = document.getElementById("cmbEmpresa").value,
	conta = document.getElementById("cmbConta").value,
	cliente = document.getElementById("cmbCliente").value,
	categoria = document.getElementById("cmbCategoria").value,
	tipo = document.getElementById("cmbTipo").value,
	statusPagamento =  document.getElementById("cmbStatus").value;


	var checks = document.getElementsByName('RdDatas');
	for (var i=0;i<checks.length;i++){
		if (checks[i].checked) {
			intervaloData = checks[i].value;
		}
	}

	var oPagina = new XMLHttpRequest();

	with (oPagina){


		if(intervaloPesquisa == "personalizado"){
			dataInicial = document.getElementById("dataInicialRelatorio").value;
			dataFinal = document.getElementById("dataFinalRelatorio").value;


			open('GET','./src/CrudRelatorio.php?funcao=relatorio&intervaloData='+intervaloData+'&intervaloPesquisa='+intervaloPesquisa+
				'&tipo='+tipo+'&statusPagamento='+statusPagamento+'&empresa='+empresa+'&conta='+conta+'&cliente='+cliente+
				'&categoria='+categoria+'&dataInicial='+dataInicial+'&dataFinal='+dataFinal);
		}
		else{

			open('GET','./src/CrudRelatorio.php?funcao=relatorio&intervaloData='+intervaloData+'&intervaloPesquisa='+intervaloPesquisa+
				'&tipo='+tipo+'&statusPagamento='+statusPagamento+'&empresa='+empresa+'&conta='+conta+'&cliente='+cliente+
				'&categoria='+categoria);

		}
		send();

		onload = function(){
		
			
			if(responseText!= "sem registros"){

				var oDados = JSON.parse(responseText);

				var tableRelatorio = document.getElementById("tbodyRelatorio");

				var linhas = document.getElementById("tableRelatorio").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableRelatorio").deleteRow(i);

				}

				for(i = 0; i<oDados.length; i++){

					tableRelatorio.insertAdjacentHTML('afterbegin', 
						"<tr>"+
						"<td hidden>" + oDados[i]['LCT_COD'] + "</td>"+
						"<td>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['CNT_NOME'] + "</td>"+
						"<td>" + oDados[i]['CLI_NOME'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['CLI_BANCO'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['CLI_AGENCIA'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['CLI_CONTA'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['CLI_TIPOCONTA'] + "</td>"+
						"<td>" + oDados[i]['LCT_DESCRICAO'] + "</td>"+
						"<td>" + oDados[i]['LCT_TIPO'] + "</td>"+
						"<td>" + oDados[i]['CAT_NOME'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['LCT_FRMPAG'] + "</td>"+
						"<td>" + oDados[i]['LCT_DTVENC'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['LCT_DTPAG'] + "</td>"+
						"<td id='relatorio'>" + oDados[i]['LCT_DTCADASTR'] + "</td>"+
						"<td>" + oDados[i]['LCT_VLRTITULO'] + "</td>"+
						"<td>" + oDados[i]['LCT_VLRPAGO'] + "</td>"+
						"<td>" + oDados[i]['LCT_STATUSLANC'] + "</td>"+
						"<td>" + oDados[i]['USR_NOME'] + "</td>"+

						"</tr>"
						);

					
				}
			}

			else{
				var linhas = document.getElementById("tableRelatorio").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableRelatorio").deleteRow(i);

				}

				document.getElementById("retornoFormRelatorio").style.display = "block";
				document.getElementById("retornoFormRelatorio").innerHTML = "Sem Registros!";
				document.getElementById("retornoFormRelatorio").setAttribute("class", "retDanger");

				setTimeout(function(){ document.getElementById("retornoFormRelatorio").style.display = "none"; }, 3000);

			}
		}
	}

}


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
			optionr.text = "Todas as Empresas...";
			optionr.value = "null";

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

function atualizaComboConta(cod){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudRelatorio.php?funcao=comboConta&CODEMPRESA='+cod);

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
			optionr.text = "Todas as Contas...";
			optionr.value = "null";

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

function atualizaComboCliente(cod){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudRelatorio.php?funcao=comboCliente&CODEMPRESA='+cod);
		
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
			optionr.text = "Todos os Clientes / Fornecedores...";
			optionr.value = "null";

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

function atualizaComboCategoria(cod){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudRelatorio.php?funcao=comboCategoria&CODEMPRESA='+cod);
		
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
			optionr.text = "Todas as Categorias...";
			optionr.value = "null";

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

function atualizaCombos(cod){
	if(cod!="null"){
		atualizaComboConta(cod);
		atualizaComboCliente(cod);
		atualizaComboCategoria(cod);


	}

	else{
		var combo = document.getElementById("cmbConta").length;

		for (i = 0; i <=combo; i++) {
			var contador = document.getElementById("cmbConta");	
			contador.remove(contador.i);
		}


		var r = document.getElementById("cmbConta");
		var optionr = document.createElement("option");
		optionr.text = "Todas as Contas...";
		optionr.value = "null";

		r.add(optionr);

		var comboCliente = document.getElementById("cmbCliente").length;

		for (i = 0; i <=comboCliente; i++) {
			var contadorCliente = document.getElementById("cmbCliente");	
			contadorCliente.remove(contadorCliente.i);
		}


		var rC = document.getElementById("cmbCliente");
		var optionrC = document.createElement("option");
		optionrC.text = "Todos os Clientes / Fornecedores...";
		optionrC.value = "null";

		rC.add(optionrC);

		var comboCategori = document.getElementById("cmbCategoria").length;

		for (i = 0; i <=comboCategori; i++) {
			var contadorCategoria = document.getElementById("cmbCategoria");	
			contadorCategoria.remove(contadorCategoria.i);
		}


		var rCa = document.getElementById("cmbCategoria");
		var optionrCa = document.createElement("option");
		optionrCa.text = "Todas as Categorias...";
		optionrCa.value = "null";

		rCa.add(optionrCa);
	}
}

(function(){
	atualizaComboEmpresa();
}());

