(function(){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', './src/consultaDespDash.php');

		send();

		
		onload = function(){

			
			var oDados = JSON.parse(responseText);		

			 document.all.despesas.innerHTML = "R$" + oDados[0]['VALOR'].replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");

		}


	}



}())





