function selectConsulta(){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', 'http://localhost/beardsbucket/sistema/src/consultaDespRecei.php');

		send();
		onload = function(){

			var oDados = JSON.parse(responseText);

			var tableData = "";

			for(var cont = 0;cont < oDados.length  ; cont++){



				tableData += "<tr> <td>" + oDados[cont]['CODIGO'] + "</td>";

			 	tableData += "<td>" + oDados[cont]['DESCRICAO'] + "</td> ";

				tableData += "<td>" + oDados[cont]['DATA'] + "</td> ";

				tableData += "<td>" + oDados[cont]['VALOR'].replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.") + "</td> ";

				tableData += "<td>" + oDados[cont]['DESCRICAO_PAGAMENTO'] + "</td> ";

				tableData += "<td>" + oDados[cont]['NomeCliente'] + "</td> </tr> ";

			}

			document.all.tableConsulta.innerHTML = tableData;

		}


	}

}