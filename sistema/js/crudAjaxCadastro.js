//  ------------------------------------------CATEGORIA ----------------------------------------------------
function selectionAcaoCategoria(param){
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CATEGORIA///////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

if(param == 1){

	if(document.getElementById("categoriaNome").value.trim().length<=0){
		alert("Preencha o nome da Categoria");
		document.getElementById("categoriaNome").focus();
	}

	else if(document.getElementById("cmbEmpresaCat2").selectedIndex == 0){
		alert("Selecione a Empresa / Perfil");
		document.getElementById("cmbEmpresaCat2").focus();

	}

	else if(document.getElementById("categoriaStatus").selectedIndex == 0){
		alert("Selecione o Status");
		document.getElementById("categoriaStatus").focus();

	}

	else{

		document.getElementById("cmbEmpresaCat2").disabled = false;
		document.getElementById("cmbEmpresaCat").disabled = true;



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

					var Contador = parseInt(oDados.length) -1;

					var tableCategoria = document.getElementById("tableCategoria");



					tableCategoria.insertAdjacentHTML('afterbegin',
						"<tr class = 'registroInserido'><td name = 'categ"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_COD'] + "</td>"+
						"<td name = 'categ"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_NOME'] + "</td> "+
						"<td hidden name = 'categ"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_STATUS'] + "</td> "+
						"<td name = 'categ"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_STATUSDESC'] + "</td> "+
						"<td hidden name = 'categ"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['EMP_COD'] + "</td> "+
						"<td name = 'categ"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['EMP_NOME_EMPRESA'] + "</td> "+

						"<td><button class = 'btn' id = 'categ"+ oDados['CAT_COD'] +"' onclick = 'selecionaCategoria(this.id)'>Alterar</button></tr> "
						);

					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").innerHTML = "Dados inseridos com sucesso!";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retSuccess");

					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);

				}

				else{
					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").innerHTML = "Não foi possível inserir a Categoria";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);

				}


			}

		}
	}
}
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CATEGORIA/////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if(param == 2){

	if(document.getElementById("categoriaNome").value.trim().length<=0){
		alert("Preencha o nome da Categoria");
		document.getElementById("categoriaNome").focus();
	}

	else if(document.getElementById("cmbEmpresaCat2").selectedIndex == 0){
		alert("Selecione a Empresa / Perfil");
		document.getElementById("cmbEmpresaCat2").focus();

	}

	else if(document.getElementById("categoriaStatus").selectedIndex == 0){
		alert("Selecione o Status");
		document.getElementById("categoriaStatus").focus();

	}

	else{

		var
		codCategoria = document.getElementsByName("categoriaCod")[0].value, 
		categNome = document.getElementsByName("categoriaNome")[0].value, 
		categStatus = document.getElementsByName("categoriaStatus")[0].value,
		categEmpresa = document.getElementsByName("cmbEmpresaCat")[0].value;

		document.getElementById("cmbEmpresaCat2").disabled = false;
		document.getElementById("cmbEmpresaCat").disabled = false;




		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open('GET', './src/CrudCadastro.php?funcao=atualizaCategoria&categoriaNome='+categNome+'&categoriaStatus='+categStatus+'&cmbEmpresaCat='+categEmpresa+'&categoriaCod='+codCategoria+'&cmbEmpresaCat='+categEmpresa);

			send();

			onload = function(){

				if(responseText != "Erro ao Atualizar"){

					var oDados = JSON.parse(responseText);


					document.getElementById("categoriaNome").value = "";
					document.getElementById("cmbEmpresaCat2").selectedIndex = 0;
					document.getElementById("categoriaStatus").selectedIndex = 0;

					document.getElementById("buttonCategoria").innerHTML = "Inserir";
					document.getElementById("buttonCancelarCategoria").style.display = 'none';
					document.getElementById("buttonCancelarCategoria").value = 1;
					document.getElementById("retornoFormCategoria").style.display = "block";
					document.getElementById("retornoFormCategoria").setAttribute("class", "retSuccess");
					document.getElementById("retornoFormCategoria").innerHTML = "Dados atualizados com sucesso";
					setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);



					var tableCategoria = document.getElementById("tableCategoria");

					var linhas = document.getElementById("tableCategoria").rows;
					for (i= linhas.length-1; i>=1; i--){
						document.getElementById("tableCategoria").deleteRow(i);

					}

					for(i = 0; i<=oDados.length; i++){
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


function cancelaCategoria(){

	document.getElementById("categoriaNome").value = "";
	document.getElementById("cmbEmpresaCat2").selectedIndex = 0;
	document.getElementById("categoriaStatus").selectedIndex = 0;

	document.getElementById("buttonCategoria").innerHTML = "Inserir";
	document.getElementById("buttonCancelarCategoria").style.display = 'none';
	document.getElementById("buttonCancelarCategoria").value = 1;
	document.getElementById("retornoFormCategoria").style.display = "block";

	document.getElementById("cmbEmpresaCat2").disabled = false;
	document.getElementById("cmbEmpresaCat").disabled = false;
	



}



//  --------------------------------------------ATUALIZAÇÃO TABELA CATEGORIA------------------------------------------
function buscaCategorias(param){



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
			
			for(i = 0; i<=oDados.length; i++){
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


//  ---------------------------------------------FIM------------------------------------------------------------------

//  --------------------------------------------ATUALIZAÇÃO DA PÁGINA ------------------------------------------------
// ATUALIZA COMBO EMPRESA DA CATEGORIA

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
			
		}
	}
}





(function(){

	atualizaComboEmpresaCadastro();

}())

//  --------------------------------------------FIM ATUALIZAÇÃO ------------------------------------------------


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



function deleteRows(id){

	var linhas = document.getElementById(id).rows;
	for (i= linhas.length-1; i>=0; i--){
		document.getElementById(id).deleteRow(i);

	}

}
