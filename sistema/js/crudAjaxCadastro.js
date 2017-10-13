//  ------------------------------------------CATEGORIA ----------------------------------------------------
function selectionAcaoCategoria(param){
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CATEGORIA///////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

if(param == 1){
	var oPagina = new XMLHttpRequest();
	with(oPagina){

		var categNome = document.getElementById("categoriaNome").value;
		var categStatus = document.getElementById("categoriaStatus").value;	
		var categEmpresa = document.getElementById("cmbEmpresaCat").value;	

		open('GET', './src/CrudCadastro.php?funcao=insereCategoria&categoriaNome='+categNome+'&categoriaStatus='+categStatus+'&cmbEmpresaCat='+categEmpresa);


		send();

		onload = function(){

			if(responseText != "Erro ao Inserir Categoria"){



				var oDados = JSON.parse(responseText);

				var Contador = parseInt(oDados.length) -1;

				var tableCategoria = document.getElementById("tableCategoria");



				tableCategoria.insertAdjacentHTML('beforeend',
					"<tr><td name = 'cat"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_COD'] + "</td>"+
					"<td name = 'cat"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_NOME'] + "</td> "+
					"<td name = 'cat"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['CAT_STATUS'] + "</td> "+
					"<td name = 'cat"+oDados[Contador]['CAT_COD']+"'>" + oDados[Contador]['EMP_NOME_EMPRESA'] + "</td> "+

					"<td><button class = 'btn' id = '"+oDados[Contador]['CAT_COD']+
					"' onclick = 'selecionaEmpresa(this.id)'>Alterar</button></tr> "
					);

				document.getElementById("retornoFormCategoria").style.display = "block";
				document.getElementById("retornoFormCategoria").innerHTML = "Dados inseridos com sucesso!";
				document.getElementById("retornoFormCategoria").setAttribute("class", "retSuccess");

				setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);

			}

			else{
				document.getElementById("retornoFormCategoria").style.display = "block";
				document.getElementById("retornoFormCategoria").innerHTML = "Não foi possível inserir a Conta";
				document.getElementById("retornoFormCategoria").setAttribute("class", "retDanger");

				setTimeout(function(){ document.getElementById("retornoFormCategoria").style.display = "none"; }, 3000);

			}


		}

	}
}
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CATEGORIA/////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
else if(param == 2){
	
	var codEmpresa = document.getElementsByName("categoriaNome")[0].value, 
	nomeEmpresa = document.getElementsByName("categoriaStatus")[0].value,
	cnpjEmpresa = document.getElementsByName("cmbEmpresaCat")[0].value;



	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=atualizaCategoria&empresa='+nomeEmpresa+'&cnpj='+cnpjEmpresa+'&status='+document.getElementById("cmbStatusEmpresa").value+'&codEmpresa='+codEmpresa);

		send();



		onload = function(){

			if(responseText != "Erro ao Atualizar"){


				var oDados = JSON.parse(responseText);

				var codEmpresa = 'emp'+oDados[0]['EMP_COD'];

				document.getElementsByName(codEmpresa)[1].innerText = oDados[0]['EMP_NOME_EMPRESA'];
				document.getElementsByName(codEmpresa)[2].innerText = oDados[0]['EMP_CNPJ'];
				document.getElementsByName(codEmpresa)[3].innerText = oDados[0]['EMP_STATUS'];

				document.getElementById("buttonEmpresa").innerHTML = "Inserir";
				document.getElementById("buttonCancelarEmpresa").style.display = 'none';
				document.getElementById("buttonEmpresa").value = 1;

				document.getElementById("retornoFormEmpresa").style.display = "block";

				document.getElementById("retornoFormEmpresa").setAttribute("class", "retSuccess");

				document.getElementById("retornoFormEmpresa").innerHTML = "Dados atualizados com sucesso";

				document.getElementById("cmbStatusEmpresa").disabled = true;

				cmbStatusEmpresa

				setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);

				document.all.txtCnpj.value = "";
				document.all.txtNomeEmpresa.value="";

				atualizaComboEmpresa();




			}

			else{

				document.getElementById("retornoFormEmpresa").style.display = "block";
				document.getElementById("retornoFormEmpresa").setAttribute("class", "retDanger");
				document.getElementById("retornoFormEmpresa").innerHTML = "Não foi possível atualizar a empresa";
				setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);
			}

		}
	}


}

}




//  -------------------------------------------- FIM -------------------------------------------------------

//  --------------------------------------------ATUALIZAÇÃO DA PÁGINA ------------------------------------------------
// ATUALIZA COMBO EMPRESA DA CONTA

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
			
		}
	}
}





(function(){

	atualizaComboEmpresaCadastro();

}())

//  --------------------------------------------FIM ATUALIZAÇÃO ------------------------------------------------


