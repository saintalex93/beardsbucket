



// OBS:   i = 0; i<oDados.length; i++
// Tirar o '=';

//----------------------------------------INSERE CLIENTE E FORNCEDOR--------------------------------------//
function selecionaAcaoCadClienteForncedor(param){
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CLIENTES FORNECEDOR/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
if(param == 1){

	if(validaFornecedor()){


		buscaClienteForn(0);

		document.all.cmbEmpresaFiltro.value = document.all.cmbEmpresaSelecao.value;
		buscaClienteForn(document.all.cmbEmpresaFiltro.value);

		var oPagina = new XMLHttpRequest();
		with(oPagina){
			var cadCliFornNome = document.getElementById('cadCliFornName').value;
			var cadCliForCNPJCPF = document.getElementById('cadCliFornCNPJCPF').value;
			var cadCliTipo = document.getElementById('cadCliFornTipo').value;
			var cadCliTel = document.getElementById('cadCliFornTel').value;
			var cadCliEmail = document.getElementById('cadCliFornEmail').value;
			var empresa = document.getElementById('cmbEmpresaSelecao').value;
			var cadCliFornStatus = document.getElementById('cadCliFornStatus').value;
			var cadCliFornBanco = document.getElementById('cadCliFornBanco').value;
			var cadCliFornAg = document.getElementById('cadCliFornAg').value;
			var cadCliFornConta = document.getElementById('cadCliFornConta').value;
			var cadCliFornTipoConta = document.getElementById('cadCliFornTipoConta').value;


			open('GET', './src/CrudCadastro.php?funcao=insereCliForn&cadCliFornName='+cadCliFornNome+'&cadCliFornTipo='+cadCliTipo+'&cadCliFornCNPJCPF='+cadCliForCNPJCPF+'&cadCliFornTel='+cadCliTel+'&cadCliFornEmail='+cadCliEmail+'&cadCliFornBanco='+cadCliFornBanco+'&cadCliFornAg='+cadCliFornAg+'&cadCliFornConta='+cadCliFornConta+'&cadCliFornTipoConta='+cadCliFornTipoConta+'&cadCliFornStatus='+cadCliFornStatus+'&cmbEmpresaSelecao='+empresa);
			send();


			onload = function(){

				if(responseText != "Erro ao inserir Cliente ou Fornecedor"){

					var oDados = JSON.parse(responseText);

					var tableCategoria = document.getElementById("tableCliForn");

					tableCategoria.insertAdjacentHTML('afterbegin', 
						"<tr class = 'registroInserido'><td name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_COD'] + "</td>"+
						"<td name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_NOME'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_CPF_CNPJ'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_TIPO'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_TELEFONE'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_EMAIL'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['EMP_COD'] + "</td> "+
						"<td name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['EMP_NOME_EMPRESA'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_STATUS'] + "</td> "+					
						"<td name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_STATUSDESC'] + "</td> "+					
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_BANCO']+ "</td>"+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_AGENCIA']+ "</td>"+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_CONTA']+ "</td>"+
						"<td hidden name = 'cliforn"+oDados[0]['CLI_COD']+"'>" + oDados[0]['CLI_TIPOCONTA']+ "</td>"+
						"<td><button class = 'btn' id = 'cliforn"+ oDados[0]['CLI_COD'] +"' onclick = 'selecionaCliForn(this.id)'>Alterar</button></tr> "

						);

					limpaCliente();

					document.getElementById("retornoFormCliForn").style.display = "block";
					document.getElementById("retornoFormCliForn").innerHTML = "Dados inseridos com sucesso!";
					document.getElementById("retornoFormCliForn").setAttribute("class", "retSuccess");

					setTimeout(function(){ document.getElementById("retornoFormCliForn").style.display = "none"; }, 3000);
					setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);


				}
				else {
					document.getElementById("retornoFormCliForn").style.display = "block";
					document.getElementById("retornoFormCliForn").innerHTML = "Não foi possível inserir o Cliente";
					document.getElementById("retornoFormCliForn").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormCliForn").style.display = "none"; }, 3000);

					document.getElementById("cmbEmpresaSelecao").disabled = false;

					limpaCliente();

				}


			}
		}
	}
}
//------------------------------------------FIM----------------------------------------------------------//


// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CLIENTES FORNECEDOR///////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if(param == 2){

	// buscaClienteForn(0);

	// document.all.cmbEmpresaFiltro.value = document.all.cmbEmpresaSelecao.value;
	// buscaClienteForn(document.all.cmbEmpresaFiltro.value);
	if(validaFornecedor()){
		var oPagina = new XMLHttpRequest();

		with(oPagina){

			var cadCliCod = document.getElementById('cadastroCliFornCod').value;
			var cadCliFornNome = document.getElementById('cadCliFornName').value;
			var cadCliForCNPJCPF = document.getElementById('cadCliFornCNPJCPF').value;
			var cadCliTipo = document.getElementById('cadCliFornTipo').value;
			var cadCliTel = document.getElementById('cadCliFornTel').value;
			var cadCliEmail = document.getElementById('cadCliFornEmail').value;
			var empresa = document.getElementById('cmbEmpresaSelecao').value;
			var cadCliFornStatus = document.getElementById('cadCliFornStatus').value;
			var cadCliFornBanco = document.getElementById('cadCliFornBanco').value;
			var cadCliFornAg = document.getElementById('cadCliFornAg').value;
			var cadCliFornConta = document.getElementById('cadCliFornConta').value;
			var cadCliFornTipoConta = document.getElementById('cadCliFornTipoConta').value;

			open('GET', './src/CrudCadastro.php?funcao=atualizaClientesFornecedor&cadCliFornName='+cadCliFornNome+'&cadCliFornTipo='+cadCliTipo+'&cadCliFornCNPJCPF='+cadCliForCNPJCPF+'&cadCliFornTel='+cadCliTel+'&cadCliFornEmail='+cadCliEmail+'&cadCliFornBanco='+cadCliFornBanco+'&cadCliFornAg='+cadCliFornAg+'&cadCliFornConta='+cadCliFornConta+'&cadCliFornTipoConta='+cadCliFornTipoConta+'&cadCliFornStatus='+cadCliFornStatus+'&cmbEmpresaSelecao='+empresa+'&cadastroCliFornCod='+cadCliCod);

			send();


			onload = function(){


				if(responseText != "Erro ao Atualizar"){

					var oDados = JSON.parse(responseText);

					var nameTd = "cliforn" + oDados[0]['CLI_COD'];

					document.getElementsByName(nameTd)[0].parentNode.className = "registroInserido";

					document.getElementsByName(nameTd)[0].innerHTML = oDados[0]['CLI_COD'];
					document.getElementsByName(nameTd)[1].innerHTML = oDados[0]['CLI_NOME'];
					document.getElementsByName(nameTd)[2].innerHTML = oDados[0]['CLI_CPF_CNPJ'];
					document.getElementsByName(nameTd)[3].innerHTML = oDados[0]['CLI_TIPO'];
					document.getElementsByName(nameTd)[4].innerHTML = oDados[0]['CLI_TELEFONE'];
					document.getElementsByName(nameTd)[5].innerHTML = oDados[0]['CLI_EMAIL'];
					document.getElementsByName(nameTd)[6].innerHTML = oDados[0]['EMP_COD'];
					document.getElementsByName(nameTd)[7].innerHTML = oDados[0]['EMP_NOME_EMPRESA'];
					document.getElementsByName(nameTd)[8].innerHTML = oDados[0]['CLI_STATUS'];				
					document.getElementsByName(nameTd)[9].innerHTML =oDados[0]['CLI_STATUSDESC'];					
					document.getElementsByName(nameTd)[10].innerHTML = oDados[0]['CLI_BANCO'];
					document.getElementsByName(nameTd)[11].innerHTML = oDados[0]['CLI_AGENCIA'];
					document.getElementsByName(nameTd)[12].innerHTML = oDados[0]['CLI_CONTA'];
					document.getElementsByName(nameTd)[13].innerHTML = oDados[0]['CLI_TIPOCONTA'];

					document.getElementById("buttoncadClienteForncedor").innerHTML = "Inserir";
					document.getElementById("buttonCancelarCliForn").style.display = 'none';
					document.getElementById("buttoncadClienteForncedor").value = 1;
					document.getElementById("retornoFormCliForn").style.display = "block";
					document.getElementById("retornoFormCliForn").setAttribute("class", "retSuccess");
					document.getElementById("retornoFormCliForn").innerHTML = "Dados atualizados com sucesso";
					setTimeout(function(){ document.getElementById("retornoFormCliForn").style.display = "none"; }, 3000);
					setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);

					limpaCliente();


				}

				else{

					document.getElementById("retornoFormCliForn").style.display = "block";
					document.getElementById("retornoFormCliForn").innerHTML = "Não foi possível Atualizar Cliente / Fornecedor";
					document.getElementById("retornoFormCliForn").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormCliForn").style.display = "none"; }, 3000);

					limpaCliente();

				}
			}
		}
	}
}
}

//------------------------------------------FIM----------------------------------------------------------//

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////SELECIONA CLIENTE FORNECEDOR///////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

function selecionaCliForn(codCliForn){

	
	document.getElementById("cmbEmpresaSelecao").disabled = true;
	document.getElementById("cmbEmpresaFiltro").disabled = true;




	var catTabela = document.getElementsByName(codCliForn);


	if(catTabela[13].innerText == "SC"){

		trocaTipoConta("SC");

	}

	else{

		trocaTipoConta("BILOLA");


	}

	document.getElementById("cadastroCliFornCod").value = catTabela[0].innerText;	
	document.getElementById("cadCliFornName").value = catTabela[1].innerText;
	document.getElementById("cadCliFornCNPJCPF").value = catTabela[2].innerText;
	document.getElementById("cadCliFornTipo").value = catTabela[3].innerText;
	document.getElementById("cadCliFornTel").value = catTabela[4].innerText;
	document.getElementById("cadCliFornEmail").value = catTabela[5].innerText;
	document.getElementById("cmbEmpresaSelecao").value = catTabela[6].innerText;
	document.getElementById("cadCliFornStatus").value = catTabela[8].innerText;
	document.getElementById("cadCliFornBanco").value = catTabela[10].innerText;
	document.getElementById("cadCliFornAg").value = catTabela[11].innerText;
	document.getElementById("cadCliFornConta").value = catTabela[12].innerText;
	document.getElementById("cadCliFornTipoConta").value = catTabela[13].innerText;

	


	document.getElementById("buttonCancelarCliForn").style.display = 'inline';
	document.getElementById("buttoncadClienteForncedor").innerText= 'Alterar';
	document.getElementById("buttoncadClienteForncedor").value = 2;



}
//------------------------------------------FIM----------------------------------------------------------//


function limpaCliente(){

	document.getElementById("cadCliFornName").value = "";
	document.getElementById("cadCliFornCNPJCPF").value = "";
	document.getElementById("cadCliFornTel").value = "";
	document.getElementById("cadCliFornEmail").value = "";
	document.getElementById("cadCliFornBanco").value = "";					
	document.getElementById("cadCliFornAg").value = "";
	document.getElementById("cadCliFornConta").value = "";
	document.getElementById('cmbEmpresaSelecao').selectedIndex = "0";
	document.getElementById('cadCliFornStatus').selectedIndex = "0";
	document.getElementById('cadCliFornTipoConta').selectedIndex = "0";
	document.getElementById('cadCliFornTipo').selectedIndex = "0";


	document.getElementById("cadCliFornAg").disabled = true;
	document.getElementById("cadCliFornBanco").disabled = true;
	document.getElementById("cadCliFornConta").disabled = true;

	document.getElementById("cmbEmpresaSelecao").disabled = false;
	document.getElementById("cadCliFornStatus").disabled = false;
	document.getElementById("cmbEmpresaFiltro").disabled = false;



}


// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////CANCELA CLIENTE FORNECEDOR/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
function cancelaCliForn(){

	document.getElementById("cadastroCliFornCod").value = "";
	document.getElementById("cadCliFornName").value = "";
	document.getElementById("cadCliFornCNPJCPF").value = "";
	document.getElementById("cadCliFornTel").value = "";
	document.getElementById("cadCliFornEmail").value = "";
	document.getElementById("cadCliFornBanco").value = "";					
	document.getElementById("cadCliFornAg").value = "";
	document.getElementById("cadCliFornConta").value = "";
	document.getElementById('cmbEmpresaSelecao').selectedIndex = "0";
	document.getElementById('cadCliFornStatus').selectedIndex = "0";
	document.getElementById('cadCliFornTipoConta').selectedIndex = "0";
	document.getElementById('cadCliFornTipo').selectedIndex = "0";
	
	document.getElementById("buttoncadClienteForncedor").innerHTML = "Inserir";
	document.getElementById("buttonCancelarCliForn").style.display = 'none';
	document.getElementById("buttoncadClienteForncedor").value = 1;
	// document.getElementById("retornoFormCliForn").style.display = "block";

	document.getElementById("cmbEmpresaSelecao").disabled = false;
	document.getElementById("cadCliFornStatus").disabled = false;
	document.getElementById("cmbEmpresaFiltro").disabled = false;
	document.getElementById("cadCliFornTipoConta").disabled = false;
}
//------------------------------------------FIM----------------------------------------------------------//


// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////BUSCA CLIENTE FORNECEDOR///////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
function buscaClienteForn(param){

	if(document.getElementById("cmbEmpresaFiltro").value!=0){

		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open ('GET','./src/CrudCadastro.php?funcao=buscaClienteFornecedor&cmbEmpresaFiltro='+param);

			send();


			onload = function(){

				var oDados = JSON.parse(responseText);



				var tableCliForn = document.getElementById("tableCliForn");

				var linhas = document.getElementById("tableCliForn").rows;
				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableCliForn").deleteRow(i);

				}

				for(i = 0; i<oDados.length; i++){
					tableCliForn.insertAdjacentHTML('afterbegin', 
						"<tr><td name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_COD'] + "</td>"+
						"<td name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_NOME'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_CPF_CNPJ'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_TIPO'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_TELEFONE'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_EMAIL'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['EMP_COD'] + "</td> "+
						"<td name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_STATUS'] + "</td> "+					
						"<td name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_STATUSDESC'] + "</td> "+					
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_BANCO']+ "</td>"+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_AGENCIA']+ "</td>"+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_CONTA']+ "</td>"+
						"<td hidden name = 'cliforn"+oDados[i]['CLI_COD']+"'>" + oDados[i]['CLI_TIPOCONTA']+ "</td>"+
						"<td><button class = 'btn' id = 'cliforn"+ oDados[i]['CLI_COD'] +"' onclick = 'selecionaCliForn(this.id)'>Alterar</button></tr> "
						);
				}

			}

		}
	}

	else{
		var tableCliForn = document.getElementById("tableCliForn");

		var linhas = document.getElementById("tableCliForn").rows;
		for (i= linhas.length-1; i>=1; i--){
			document.getElementById("tableCliForn").deleteRow(i);

		}
		
	}

}
//------------------------------------------FIM----------------------------------------------------------//




//  ------------------------------------------CATEGORIA ----------------------------------------------------
function selectionAcaoCategoria(param){
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CATEGORIA///////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

if(param == 1){

	if(validaCategoria()){
		
		document.getElementById("cmbEmpresaCat2").disabled = false;
		document.getElementById("cmbEmpresaCat").disabled = false;



		var oPagina = new XMLHttpRequest();
		with(oPagina){

			var categNome = document.getElementById("categoriaNome").value;
			var categStatus = document.getElementById("categoriaStatus").value;	
			var categEmpresa = document.getElementById("cmbEmpresaCat2").value;	

			open('GET', './src/CrudCadastro.php?funcao=insereCategoria&categoriaNome='+categNome+'&categoriaStatus='+categStatus+'&cmbEmpresaCat='+categEmpresa);


			send();

			onload = function(){

				if(responseText != "Erro ao Inserir Categoria"){
					
					var oDados = JSON.parse(responseText);

					// var Contador = parseInt(oDados.length) -1;

					var tableCategoria = document.getElementById("tableCategoria");

					var linhas = document.getElementById("tableCliForn").rows;

					for (i= linhas.length-1; i>=1; i--){
						document.getElementById("tableCliForn").deleteRow(i);

					}

					tableCategoria.insertAdjacentHTML('afterbegin',
						"<tr class = 'registroInserido'><td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_COD'] + "</td>"+
						"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
						"<td hidden name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_STATUS'] + "</td> "+
						"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_STATUSDESC'] + "</td> "+
						"<td hidden name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['EMP_COD'] + "</td> "+
						"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+

						"<td><button class = 'btn' id = 'categ"+ oDados[i]['CAT_COD'] +"' onclick = 'selecionaCategoria(this.id)'>Alterar</button></tr> "
						);

					document.getElementById("categoriaNome").value = "";
					document.getElementById("cmbEmpresaCat2").selectedIndex = 0;
					document.getElementById("categoriaStatus").selectedIndex = 0;
					document.getElementById("buttonCategoria").value = 1;



					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").innerHTML = "Dados inseridos com sucesso!";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retSuccess");

					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);
					setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);

					
					
				}

				else{
					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").innerHTML = "Não foi possível inserir a Categoria";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);

					document.getElementById("cmbEmpresaCat2").disabled = false;
					document.getElementById("cmbEmpresaCat").disabled = false;

					document.getElementById("categoriaNome").value = "";
					document.getElementById("cmbEmpresaCat2").selectedIndex = 0;
					document.getElementById("categoriaStatus").selectedIndex = 0;
				}


			}

		}
	}
}
//------------------------------------------FIM----------------------------------------------------------//

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CATEGORIA/////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if(param == 2){

	if(validaCategoria()){

		var
		codCategoria = document.getElementsByName("categoriaCod")[0].value, 
		categNome = document.getElementsByName("categoriaNome")[0].value, 
		categStatus = document.getElementsByName("categoriaStatus")[0].value,
		categEmpresa = document.getElementsByName("cmbEmpresaCat2")[0].value;

		document.getElementById("cmbEmpresaCat2").disabled = false;
		document.getElementById("cmbEmpresaCat").disabled = false;




		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open('GET', './src/CrudCadastro.php?funcao=atualizaCategoria&categoriaNome='+categNome+'&categoriaStatus='+categStatus+'&cmbEmpresaCat='+categEmpresa+'&categoriaCod='+codCategoria+'&cmbEmpresaCat='+categEmpresa);

			send();

			onload = function(){

				if(responseText != "Erro ao Atualizar"){

					var oDados = JSON.parse(responseText);
					var tdCateg = "categ"+codCategoria;
					document.getElementsByName(tdCateg)[0].parentNode.remove();
					var tableCategoria = document.getElementById("tableCategoria");

					// var linhas = document.getElementById("tableCategoria").rows;
					// for (i= linhas.length-1; i>=1; i--){
					// 	document.getElementById("tableCategoria").deleteRow(i);

					// }

					for(i = 0; i<oDados.length; i++){
						tableCategoria.insertAdjacentHTML('afterbegin', 
							"<tr class = 'registroInserido'><td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_COD'] + "</td>"+
							"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
							"<td hidden name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_STATUS']+ "</td>"+
							"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_STATUSDESC'] + "</td> "+
							"<td hidden name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['EMP_COD'] + "</td> "+
							"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td><button class = 'btn' id = 'categ"+ oDados[i]['CAT_COD'] +"' onclick = 'selecionaCategoria(this.id)'>Alterar</button></tr> "
							);
					}

					document.getElementById("categoriaNome").value = "";
					document.getElementById("cmbEmpresaCat2").selectedIndex = 0;
					document.getElementById("categoriaStatus").selectedIndex = 0;
					document.getElementById("buttonCategoria").value = 1;

					document.getElementById("buttonCategoria").innerHTML = "Cadastrar";
					document.getElementById("buttonCancelarCategoria").style.display = 'none';
					document.getElementById("buttonCancelarCategoria").value = 1;
					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retSuccess");
					document.getElementById("retornoFormCategoria").innerHTML = "Dados atualizados com sucesso";
					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);
					setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);
					

				}

				else{

					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retDanger");
					document.getElementById("retornoFormCategoria").innerHTML = "Não foi possível atualizar a Categoria";
					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);
				}

			}
		}
	}


}

}




//  -------------------------------------------- FIM -------------------------------------------------------

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////CANCELA CATEGORIA////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

function cancelaCategoria(){

	document.getElementById("categoriaNome").value = "";
	document.getElementById("cmbEmpresaCat2").selectedIndex = 0;
	document.getElementById("categoriaStatus").selectedIndex = 0;

	document.getElementById("buttonCategoria").innerHTML = "Cadastrar";
	document.getElementById("buttonCancelarCategoria").style.display = 'none';
	document.getElementById("buttonCancelarCategoria").value = 1;
	document.getElementById("retornoFormCategoria").style.display = "none";

	document.getElementById("cmbEmpresaCat2").disabled = false;
	document.getElementById("cmbEmpresaCat").disabled = false;
	

}
//------------------------------------------FIM----------------------------------------------------------//


//  --------------------------------------------ATUALIZAÇÃO TABELA CATEGORIA------------------------------------------
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////BUSCA CATEGORIAS////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
function buscaCategorias(param){

	if(document.getElementById("cmbEmpresaCat").value != 0){



		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open ('GET','./src/CrudCadastro.php?funcao=buscaCategoriaEmpresa&cmbEmpresaCat='+param);

			send();

			onload = function(){




				var oDados = JSON.parse(responseText);



				var tableCategoria = document.getElementById("tableCategoria");

				var linhas = document.getElementById("tableCategoria").rows;
				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableCategoria").deleteRow(i);

				}

				for(i = 0; i<oDados.length; i++){
					tableCategoria.insertAdjacentHTML('afterbegin', 
						"<tr><td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_COD'] + "</td>"+
						"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
						"<td hidden name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_STATUS']+ "</td>"+
						"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['CAT_STATUSDESC'] + "</td> "+
						"<td hidden name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['EMP_COD'] + "</td> "+
						"<td name = 'categ"+oDados[i]['CAT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
						"<td><button class = 'btn' id = 'categ"+ oDados[i]['CAT_COD'] +"' onclick = 'selecionaCategoria(this.id)'>Alterar</button></tr> "
						);
				}

			}


		}

	}

	else{
		var tableCategoria = document.getElementById("tableCategoria");

		var linhas = document.getElementById("tableCategoria").rows;
		for (i= linhas.length-1; i>=1; i--){
			document.getElementById("tableCategoria").deleteRow(i);

		}
	}


}


//  ---------------------------------------------FIM------------------------------------------------------------------

//  --------------------------------------------ATUALIZAÇÃO DA PÁGINA ------------------------------------------------
// ATUALIZA COMBO EMPRESA DA CATEGORIA
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA COMBO CATEGORIA/////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
function atualizaComboEmpresaCadastro(){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudCadastro.php?funcao=comboCadastro');

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);


			var r = document.getElementById("cmbEmpresaCat");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			r.add(optionr);

			var contador2 = document.getElementById("cmbEmpresaCat").length;

			for (i = 0; i <=contador2; i++) {
				var combinho2 = document.getElementById("cmbEmpresaCat");	
				combinho2.remove(combinho2.i);
			}

			optionr.text = "Selecione...";
			optionr.value = 0;

			r.add(optionr);

			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbEmpresaCat");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['EMP_NOME_EMPRESA'];
				optionr.value = oDados[i]['EMP_COD'];
				r.add(optionr);
			}
			var x = document.getElementById("cmbEmpresaCat2");
			var option = document.createElement("option");
			option.text = "Selecione...";
			x.add(option);

			var contador = document.getElementById("cmbEmpresaCat2").length;

			for (i = 0; i <=contador; i++) {
				var combinho = document.getElementById("cmbEmpresaCat2");	
				combinho.remove(combinho.i);
			}

			option.text = "Selecione...";
			x.add(option);

			for (var i = 0; i<oDados.length; i++){
				var x = document.getElementById("cmbEmpresaCat2");
				var option = document.createElement("option");
				option.text = oDados[i]['EMP_NOME_EMPRESA'];
				option.value = oDados[i]['EMP_COD'];
				x.add(option);
			}


			// Atualiza combo Cliente fornecedor


			var b = document.getElementById("cmbEmpresaSelecao");
			var optionb = document.createElement("option");
			optionb.text = "Selecione...";
			b.add(optionb);

			var contador3 = document.getElementById("cmbEmpresaSelecao").length;

			for (i = 0; i <=contador3; i++) {
				var combinho3 = document.getElementById("cmbEmpresaSelecao");	
				combinho3.remove(combinho3.i);
			}

			optionb.text = "Selecione...";
			b.add(optionb);

			for (var i = 0; i<oDados.length; i++){
				var b = document.getElementById("cmbEmpresaSelecao");
				var optionb = document.createElement("option");
				optionb.text = oDados[i]['EMP_NOME_EMPRESA'];
				optionb.value = oDados[i]['EMP_COD'];
				b.add(optionb);
			}

			// 


			var a = document.getElementById("cmbEmpresaFiltro");
			var optiona = document.createElement("option");
			optiona.text = "Selecione...";
			optiona.value = 0;

			a.add(optiona);

			var contado4 = document.getElementById("cmbEmpresaFiltro").length;

			for (i = 0; i <=contado4; i++) {
				var combinhoa = document.getElementById("cmbEmpresaFiltro");	
				combinhoa.remove(combinhoa.i);
			}

			optiona.text = "Selecione...";
			a.add(optiona);

			for (var i = 0; i<oDados.length; i++){
				var a = document.getElementById("cmbEmpresaFiltro");
				var optiona = document.createElement("option");
				optiona.text = oDados[i]['EMP_NOME_EMPRESA'];
				optiona.value = oDados[i]['EMP_COD'];
				a.add(optiona);
			}
			
		}
	}
}
//------------------------------------------FIM----------------------------------------------------------//





(function(){
	atualizaComboEmpresaCadastro();

}())
//------------------------------------------FIM----------------------------------------------------------//

//  --------------------------------------------FIM ATUALIZAÇÃO ------------------------------------------------
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////SELECIONA CATEGORIA//////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

function validaCategoria(){

	if(document.getElementById("categoriaNome").value.trim().length<=0){
		alert("Preencha o nome da Categoria");
		document.getElementById("categoriaNome").focus();
		return false;
	}

	else if(document.getElementById("cmbEmpresaCat2").selectedIndex == 0){
		alert("Selecione a Empresa / Perfil");
		document.getElementById("cmbEmpresaCat2").focus();
		return false;


	}

	else if(document.getElementById("categoriaStatus").selectedIndex == 0){
		alert("Selecione o Status");
		document.getElementById("categoriaStatus").focus();
		return false;


	}

	return true;

}


function validaFornecedor(){

	with(document.all){

		if(cadCliFornName.value.trim().length<=0){
			alert("Preencha o nome do Cliente / Fornecedor");
			cadCliFornName.focus();
			return false;
		}

		else if(cmbEmpresaSelecao.selectedIndex == 0){
			alert("Selecione a Empresa / Perfil");
			cmbEmpresaSelecao.focus();
			return false;
		}

		else if(cadCliFornStatus.selectedIndex == 0){
			alert("Selecione o Status");
			cadCliFornStatus.focus();
			return false;
		}

		else if(cadCliFornTipoConta.selectedIndex == 0){
			alert("Selecione o Tipo de Conta");
			cadCliFornTipoConta.focus();
			return false;
		}

		return true;

	}

}



function selecionaCategoria(codCategoria){

	document.getElementById("cmbEmpresaCat2").disabled = true;
	document.getElementById("cmbEmpresaCat").disabled = true;




	var catTabela = document.getElementsByName(codCategoria);


	document.getElementById("categoriaCod").value = catTabela[0].innerText;	
	document.getElementById("categoriaNome").value = catTabela[1].innerText;
	document.getElementById("cmbEmpresaCat2").value = catTabela[4].innerText;
	document.getElementById("categoriaStatus").value = catTabela[2].innerText;
	


	document.getElementById("buttonCancelarCategoria").style.display = 'inline';
	document.getElementById("buttonCategoria").innerText= 'Alterar';
	document.getElementById("buttonCategoria").value = 2;



}
//------------------------------------------FIM----------------------------------------------------------//


 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////LIMPA DADOS DA TABELA////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

function deleteRows(id){

	var linhas = document.getElementById(id).rows;
	for (i= linhas.length-1; i>=0; i--){
		document.getElementById(id).deleteRow(i);

	}

}
//------------------------------------------FIM----------------------------------------------------------//


 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// //////////////////////////////////////////INATIVA INPUTS QUANDO NAO TEM CONTA///////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
function trocaTipoConta(valueC){

	if(valueC == "SC" || valueC == "Selecione"){

		with(document.all){
			cadCliFornBanco.disabled = true;
			cadCliFornAg.disabled = true;
			cadCliFornConta.disabled = true;
		}

	}

	else{

		with(document.all){
			cadCliFornBanco.disabled = false;
			cadCliFornAg.disabled = false;
			cadCliFornConta.disabled = false;
		}

	}

}
//------------------------------------------FIM----------------------------------------------------------//



// cadCliFornTipoConta
