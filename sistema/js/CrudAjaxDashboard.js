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





//------------------------------------------FIM----------------------------------------------------------//



function buscaDespesa(codEmpresa){


	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudDashboard.php?funcao=atualizaDash&cmbEmpresaSelecao='+codEmpresa);

		send();
		
		onload = function(){


			var valorDespesa, valorReceita, valorCaixa;
			var oDados = JSON.parse(responseText);

			if(oDados[0]['DESPESA'] != null){
				valorDespesa = oDados[0]['DESPESA'].replace('','R$').replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");
			}

			else{
				valorDespesa = "R$ 0.00";
			}

			if(oDados[0]['RECEITA'] != null){
				valorReceita = oDados[0]['RECEITA'].replace('','R$').replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");
				
			}

			else{
				valorReceita = "R$ 0.00";
			}

			if(oDados[0]['CAIXA']!= null){
				valorCaixa = oDados[0]['CAIXA'].replace('','R$').replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");
			}

			else{
				valorCaixa = "R$ 0.00";
			}

			document.getElementById("vlrReceita").innerHTML =valorReceita;

			document.getElementById("vlrDespesa").innerHTML =valorDespesa;

			document.getElementById("caixa").innerHTML =valorCaixa;
			
		}
	}
}





function atualizaGrafico(id){
	document.getElementById('iframeGrafico').src = "grafico.php?codEmpresa="+id;

}




(function(){
	atualizaComboEmpresaCadastro();

}())