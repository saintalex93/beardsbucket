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
			optionr.text = "Todas...";
			r.add(optionr);

			var contador2 = document.getElementById("cmbEmpresaSelecao").length;

			for (i = 0; i <=contador2; i++) {
				var combinho2 = document.getElementById("cmbEmpresaSelecao");	
				combinho2.remove(combinho2.i);
			}

			optionr.text = "Todas";
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
	buscaDespesa(0);
	atualizaGrafico(0);

}())




 // SELECT 
	// 	 LCT_COD, EMP_NOME_EMPRESA, CAT_NOME,CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')) AS LCT_VLRTITULO,
	// 	 DATE_FORMAT(LCT_DTVENC, '%d/%m/%Y') AS LCT_DTVENCFOR, LCT_JUROSDIA, IF( DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d') 
 //         <  DATE_FORMAT(NOW(), '%Y-%m-%d') AND LCT_JUROSDIA > 0, CONCAT('R$ ',format(LCT_VLRTITULO+
 //         ((LCT_VLRTITULO*((LCT_JUROSDIA/100)*DATEDIFF(CURRENT_DATE, DATE_FORMAT(LCT_DTVENC, '%Y-%m-%d'))))),2,'de_DE')),
 //         (CONCAT('R$ ',format(LCT_VLRTITULO,2,'de_DE')))) AS LCT_VALORACRESCIMO
	// 		 FROM LANCAMENTO INNER JOIN CONTA ON 
	// 		 LANCAMENTO.CNT_COD = CONTA.CNT_COD INNER JOIN EMPRESA ON EMP_COD = COD_EMPR INNER JOIN CATEGORIA ON
	// 		 LANCAMENTO.CAT_COD = CATEGORIA.CAT_COD WHERE COD_EMPR IN (SELECT COD_EMPR FROM USR_EMPR WHERE COD_USR =2) 
 //             AND LCT_DTVENC <= NOW() AND LCT_STATUSLANC = 'A Pagar - Receber' AND LCT_TIPO = 'Despesa';
             
	// 		 