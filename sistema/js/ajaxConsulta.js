function selectConsulta(){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', './src/consultaDespRecei.php');

		send();
		onload = function(){

			var oDados = JSON.parse(responseText);

			var tableData = "";

			for(var cont = 0;cont < oDados.length  ; cont++){

				


				tableData += "<tr><td>" + oDados[cont]['CODIGO'] + "</td>";

			 	tableData += "<td>" + oDados[cont]['DESCRICAO'] + "</td> ";

				tableData += "<td>" + oDados[cont]['DATAC'] + "</td> ";

				tableData += "<td>" + oDados[cont]['VALOR'].replace(/[.]/g, ",").replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&.") + "</td> ";

				tableData += "<td>" + oDados[cont]['FRMPAGAMENTO'] + "</td> ";

				tableData += "<td>" + oDados[cont]['NomeCliente'] + "</td>";

				tableData += "<td><button class = 'btn btn-danger' id = '"+oDados[cont]['CODIGO']+"' onclick = 'alert(this.id)'>Excluir</button> <button class = 'btn'>Alterar</button> </tr> ";

			}

			document.all.tableConsulta.innerHTML = tableData;

		}


	}

}