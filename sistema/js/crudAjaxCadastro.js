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





		open('GET', './src/CrudUsuario.php?funcao=insereCategoria&categoriaNome='+categNome+'&categoriaStatus='+categStatus+'&cmbEmpresaCat='+categEmpresa);

		send();
		onload = function(){


							
			if(responseText != "Erro ao Inserir!"){

				var oDados = JSON.parse(responseText);

				var Contador = parseInt(oDados.length) -1;


				var tableCategoria = document.getElementById("tableCategoria");



				tableCategoria.insertAdjacentHTML('beforeend',
					"<tr><td name = 'conta"+oDados[Contador]['CNT_COD']+"'>" + oDados[Contador]['CNT_COD'] + "</td>"+
					"<td name = 'conta"+oDados[Contador]['CNT_COD']+"'>" + oDados[Contador]['CNT_NOME'] + "</td> "+
					"<td name = 'conta"+oDados[Contador]['CNT_COD']+"'>" + oDados[Contador]['CNT_BANCO'] + "</td> "+
					"<td name = 'conta"+oDados[Contador]['CNT_COD']+"'>" + oDados[Contador]['EMP_NOME_EMPRESA'] + "</td> "+
					"<td name = 'conta"+oDados[Contador]['CNT_COD']+"'>" + oDados[Contador]['CNT_SALDOINICIAL']+"</td> "+
					"<td name = 'conta"+oDados[Contador]['CNT_COD']+"'>" + oDados[Contador]['CNT_STATUS'] + "</td> "+


					"<td><button class = 'btn' id = '"+oDados[Contador]['CNT_COD']+
					"' onclick = 'selecionaConta(this.id)'>Alterar</button></tr> "
					);

				document.getElementById("retornoFormConta").style.display = "block";
				document.getElementById("retornoFormConta").innerHTML = "Dados inseridos com sucesso!";
				document.getElementById("retornoFormConta").setAttribute("class", "retSuccess");

				setTimeout(function(){ document.getElementById("retornoFormConta").style.display = "none"; }, 3000);

				limparConta();
			}

			else{
				document.getElementById("retornoFormConta").style.display = "block";
				document.getElementById("retornoFormConta").innerHTML = "Não foi possível inserir a Conta";
				document.getElementById("retornoFormConta").setAttribute("class", "retDanger");

				setTimeout(function(){ document.getElementById("retornoFormConta").style.display = "none"; }, 3000);

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


