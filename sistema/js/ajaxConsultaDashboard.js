(function(){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', 'http://localhost/beardsbucket/sistema/src/consultaReceitaDash.php');

		send();

		
		onload = function(){

			
			var oDados = JSON.parse(responseText);		

			 document.all.receita.innerHTML = "R$" + oDados[0]['VALOR'].replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.");

		}


	}



}())





