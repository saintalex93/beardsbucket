// EMPRESA

function insereEmpresaUsuario(){


	var oPagina = new XMLHttpRequest();
	with(oPagina){


		var empresa = document.getElementsByName("txtNomeEmpresa")[0].value;
		var cnpj = document.getElementsByName("txtCnpj")[0].value;

		open('GET', 'http://localhost/beardsbucket/sistema/src/CrudUsuario.php?funcao=insereEmpresa&empresa='+empresa+'&cnpj='+cnpj);

		send();
		onload = function(){




			if(responseText != "Erro ao Inserir"){

				var oDados = JSON.parse(responseText);

				var Contador = parseInt(oDados.length);

				Contador = Contador -1;

				var tableEmpresa = document.getElementById("tableEmpresa");



				tableEmpresa.insertAdjacentHTML('beforeend',
					"<tr><td>" + oDados[Contador]['EMP_COD'] + "</td>"+
					"<td>" + oDados[Contador]['EMP_NOME_EMPRESA'] + "</td> "+
					"<td>" + oDados[Contador]['EMP_CNPJ'] + "</td> "+
					"<td><button class = 'btn' id = '"+oDados[Contador]['EMP_COD']+
					"' onclick = 'alert(this.id)'>Alterar</button></tr> "
					);

			}

			else{

				document.getElementById("retornoFormEmpresa").innerHTML+= "Não foi possível inserir a empresa";
			}

		}


	}

}

