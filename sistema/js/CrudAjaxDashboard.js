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


			var r = document.getElementById("cmbEmpresaSelecao");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			r.add(optionr);

			var contador2 = document.getElementById("cmbEmpresaSelecao").length;

			for (i = 0; i <=contador2; i++) {
				var combinho2 = document.getElementById("cmbEmpresaSelecao");	
				combinho2.remove(combinho2.i);
			}

			optionr.text = "Selecione...";
			optionr.value = 0;

			r.add(optionr);

			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbEmpresaSelecao");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['EMP_NOME_EMPRESA'];
				optionr.value = oDados[i]['EMP_COD'];
				r.add(optionr);
			}
			
			
		}
	}
}
//------------------------------------------FIM----------------------------------------------------------//





(function(){
	atualizaComboEmpresaCadastro();

}())
//------------------------------------------FIM----------------------------------------------------------//


//http://localhost/beardsbucket/sistema/src/CrudDashboard.php?funcao=buscaReceita&cmbEmpresaSelecao=3&codUsuario=2

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// CONSULTA RECEITA DASH ///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

function buscaReceita(param,codUsuario){


	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudDashboard.php?funcao=buscaReceita&cmbEmpresaSelecao='+param+'&codUsuario='+codUsuario);

		send();
		
		onload = function(){


			var oDados = JSON.parse(responseText);

			var receita = document.getElementById('receita');

			receita.insertAdjacentHTML('beforeend',"<p class='valores' id='vlrReceita' name='vlrReceita'>"+oDados[0]['LCT_VLRTITULO'].replace('','R$').replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.")+"</p>");


		}


	}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////// CONSULTA DESPESA DASH ///////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

function buscaDespesa(param,codUsuario){


	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudDashboard.php?funcao=buscaDespesa&cmbEmpresaSelecao='+param+'&codUsuario='+codUsuario);

		send();
		
		onload = function(){

			var oDados = JSON.parse(responseText);

			var receita = document.getElementById('despesa');

			receita.insertAdjacentHTML('beforeend',"<p class='valores' id='vlrDespesa' name='vlrDespesa'>"+oDados[0]['LCT_VLRTITULO'].replace('','R$').replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.")+"</p>");
		}
	}
}