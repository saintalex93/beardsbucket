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

function atualizaDespesa(codEmpresa){
	var oPagina = new XMLHttpRequest();

	with (oPagina){

		open('GET','./src/CrudDashboard.php?funcao=atualizaDespesa&codEmpresa='+codEmpresa)
		send();

		onload = function(){
			var erro = responseText;

			if(erro !=" sem registros"){


				var oDados = JSON.parse(responseText);

				var tableDespesa = document.getElementById("corpoDespesa");

				var linhas = document.getElementById("tableDespesa").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableDespesa").deleteRow(i);

				}


				for(i = 0; i<oDados.length; i++){

					if(oDados[i]['LCT_VLRTITULO'] != oDados[i]['LCT_VALORACRESCIMO'] || oDados[i]['LCT_DTVENCFOR'] < DataAtual()){

						tableDespesa.insertAdjacentHTML('afterbegin', 
							"<tr class = 'registroVencido' id = 'linhaDash"+oDados[i]['LCT_COD']+"''><td name = 'despesaDash"+oDados[i]['LCT_COD']+"' hidden>" + oDados[i]['LCT_COD'] + "</td>"+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENCFOR'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + " %</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VALORACRESCIMO'] + "</td> "+


							"<td><button class = 'btn-info btn-fill btn btnDash' id = '"+ oDados[i]['LCT_COD'] +"' onclick = 'pagar(this.id)'>Pagar</button></tr> "

							);

					}
					else{
						tableDespesa.insertAdjacentHTML('afterbegin', 
							"<tr id = 'linhaDash"+oDados[i]['LCT_COD']+"''><td name = 'despesaDash"+oDados[i]['LCT_COD']+"' hidden>" + oDados[i]['LCT_COD'] + "</td>"+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENCFOR'] + "</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + " %</td> "+
							"<td name = 'despesaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VALORACRESCIMO'] + "</td> "+

							
							"<td><button class = 'btn-info btn-fill btn btnDash' id = '"+ oDados[i]['LCT_COD'] +"' onclick = 'pagar(this.id)'>Pagar</button></tr> "

							);
					}


				}
			}
			else{
				var linhas = document.getElementById("tableDespesa").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableDespesa").deleteRow(i);
				}
			}
		}
	}
}

function atualizaReceita(codEmpresa){
	var oPagina = new XMLHttpRequest();

	with (oPagina){

		open('GET','./src/CrudDashboard.php?funcao=AtualizaReceita&codEmpresa='+codEmpresa)
		send();

		onload = function(){
			if(responseText !=" sem registros"){
				
				var oDados = JSON.parse(responseText);

				var tableReceita = document.getElementById("corpoReceita");

				var linhas = document.getElementById("tableReceita").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableReceita").deleteRow(i);

				}


				for(i = 0; i<oDados.length; i++){

					if(oDados[i]['LCT_VLRTITULO'] != oDados[i]['LCT_VALORACRESCIMO'] || oDados[i]['LCT_DTVENCFOR'] < DataAtual()){

						tableReceita.insertAdjacentHTML('afterbegin', 
							"<tr class = 'registroVencido' id = 'linhaDash"+oDados[i]['LCT_COD']+"''><td name = 'despesaDash"+oDados[i]['LCT_COD']+"' hidden>" + oDados[i]['LCT_COD'] + "</td>"+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENCFOR'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + " %</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VALORACRESCIMO'] + "</td> "+


							"<td><button class = 'btn-info btn-fill btn btnDash' id = '"+ oDados[i]['LCT_COD'] +"' onclick = 'pagar(this.id)'>Receber</button></tr> "

							);

					}
					else{
						tableReceita.insertAdjacentHTML('afterbegin', 
							"<tr id = 'linhaDash"+oDados[i]['LCT_COD']+"''><td name = 'despesaDash"+oDados[i]['LCT_COD']+"' hidden>" + oDados[i]['LCT_COD'] + "</td>"+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DESCRICAO'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['CAT_NOME'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VLRTITULO'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_DTVENCFOR'] + "</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_JUROSDIA'] + " %</td> "+
							"<td name = 'receitaDash"+oDados[i]['LCT_COD']+"'>" + oDados[i]['LCT_VALORACRESCIMO'] + "</td> "+

							
							"<td><button class = 'btn-info btn-fill btn btnDash' id = '"+ oDados[i]['LCT_COD'] +"' onclick = 'pagar(this.id)'>Receber</button></tr> "

							);
					}


				}
			}
			else{
				var linhas = document.getElementById("tableReceita").rows;

				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableReceita").deleteRow(i);

				}
			}
		}
	}
}


function pagar(id){


	var linha = document.getElementById('linhaDash'+id);
	var colunas = linha.getElementsByTagName('td');

	var valor = colunas[7].innerText.replace("R$ ",'').replace('.', '').replace(',','.');

	if(confirm("Deseja efetuar o pagamento com o valor atual?")){
		var oPagina = new XMLHttpRequest();

		with (oPagina){

			open('GET','./src/CrudDashboard.php?funcao=efetuaPagamento&VALORPAGO='+valor+'&CODLANCAMENTO='+id)
			send();

			onload = function(){
				if(responseText ==" Lancou"){
					document.getElementById("cmbEmpresaSelecao").selectedIndex = "0";
					buscaDespesa(0);
					atualizaGrafico(0);
					atualizaDespesa(0);
					atualizaReceita(0);

				}

				else{
					alert("Não foi possível efetuar o pagamento. \nErro nº: "+responseText);
				}
			}


		}

	}

}




(function(){
	atualizaComboEmpresaCadastro();
	buscaDespesa(0);
	atualizaGrafico(0);
	atualizaDespesa(0);
	atualizaReceita(0);

}())



function DataAtual(){

	var dt = new Date();  

	var month = dt.getMonth()+1;  
	var day = dt.getDate();  
	var year = dt.getFullYear();  
	var dataAtual = day +"/"+month+"/"+year;

	return dataAtual;

}




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