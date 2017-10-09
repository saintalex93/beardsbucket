(function(){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', './src/consultaCaixaDash.php');

		send();

		
		onload = function(){

			
			var oDados = JSON.parse(responseText);		

			 document.all.caixa.innerHTML = "R$" + oDados[0]['(SELECT SUM(LCT_VLRPAGO) FROM LANCAMENTO WHERE CAT_COD=2) - (SELECT SUM(LCT_VLRPAGO) FROM LANCAMENTO WHERE CAT_COD =1)'].replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");

		}


	}



}())





