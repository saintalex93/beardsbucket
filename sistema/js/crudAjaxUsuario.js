//  --------------------------------------------USUÁRIO ------------------------------------------------



//  --------------------------------------------FIM USUÁRIO ------------------------------------------------




//  -------------------------------------------- EMPRESA ------------------------------------------------

function selecionaAcao(param){

	// INSERIR EMPRESA DA PAGINA USUARIO.

	if(param == 1){

		if(document.getElementsByName("txtNomeEmpresa")[0].value.trim().length<=0){
			alert("Preencha o nome da Empresa");
			document.getElementsByName("txtNomeEmpresa")[0].focus()	;

		}

		else{


			var oPagina = new XMLHttpRequest();
			with(oPagina){


				var empresa = document.getElementsByName("txtNomeEmpresa")[0].value;
				var cnpj = document.getElementsByName("txtCnpj")[0].value;

				open('GET', './src/CrudUsuario.php?funcao=insereEmpresa&empresa='+empresa+'&cnpj='+cnpj);

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
						document.getElementById("retornoFormEmpresa").style.display = "block";
						document.getElementById("retornoFormEmpresa").innerHTML = "Não foi possível inserir a empresa";
						setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);

					}

				}


			}

		}
	}
	if(param == 2){
		
		if(document.getElementsByName("txtNomeEmpresa")[0].value.trim().length<=0){
			alert("Preencha o nome da Empresa");
			document.getElementsByName("txtNomeEmpresa")[0].focus()	;

		}

		else{

			var codEmpresa = document.getElementsByName("codEmpresa")[0].value, 
			nomeEmpresa = document.getElementsByName("txtNomeEmpresa")[0].value,
			cnpjEmpresa = document.getElementsByName("txtCnpj")[0].value;



			var oPagina = new XMLHttpRequest();

			with(oPagina){

				open('GET', './src/CrudUsuario.php?funcao=atualizaEmpresa&empresa='+nomeEmpresa+'&cnpj='+cnpjEmpresa+'&status='+document.getElementById("cmbStatusEmpresa").value+'&codEmpresa='+codEmpresa);

				send();

				onload = function(){

					var oDados = JSON.parse(responseText);

					var codEmpresa = 'emp'+oDados[0]['EMP_COD'];
					
					document.getElementsByName(codEmpresa)[1].innerText = oDados[0]['EMP_NOME_EMPRESA'];
					document.getElementsByName(codEmpresa)[2].innerText = oDados[0]['EMP_CNPJ'];
					document.getElementsByName(codEmpresa)[3].innerText = oDados[0]['EMP_STATUS'];


					// document.getElementsByName("codEmpresa")[0].value = oDados[0]['EMP_COD'];
					// document.getElementsByName("txtNomeEmpresa")[0].value = oDados[0]['EMP_NOME_EMPRESA'];
					// document.getElementsByName("txtCnpj")[0].value = oDados[0]['EMP_CNPJ'];

					// document.getElementById("buttonEmpresa").innerHTML = "Alterar";

				}
				document.getElementById("buttonEmpresa").innerHTML = "Inserir";
				document.getElementById("buttonCancelarEmpresa").style.display = 'none';
				document.getElementById("buttonEmpresa").value = 1;

				document.all.txtCnpj.value = "";
				document.all.txtNomeEmpresa.value="";


			}

		}

	}

	else if(param == 3){
		document.getElementById("buttonEmpresa").innerHTML = "Inserir";
		document.getElementById("buttonCancelarEmpresa").style.display = 'none';
		document.getElementById("buttonEmpresa").value = 1;

		document.all.txtCnpj.value = "";
		document.all.txtNomeEmpresa.value="";


	}

}



function selecionaEmpresa(codEmpresa){

	codEmpresa = 'emp'+codEmpresa;

	document.getElementById("codEmpresa").value = document.getElementsByName(codEmpresa)[0].innerText;
	document.getElementById("txtNomeEmpresa").value = document.getElementsByName(codEmpresa)[1].innerText;
	document.getElementById("txtCnpj").value = document.getElementsByName(codEmpresa)[2].innerText;
	document.getElementById("cmbStatusEmpresa").value = document.getElementsByName(codEmpresa)[3].innerText;

	document.getElementById("buttonEmpresa").innerHTML = "Alterar";
	document.getElementById("buttonEmpresa").value = 2;
	document.getElementById("buttonCancelarEmpresa").style.display = 'inline';


	// var oPagina = new XMLHttpRequest();

	// with(oPagina){


	// 	open('GET', './src/CrudUsuario.php?funcao=selecionaEmpresa&codEmpresa='+codEmpresa);

	// 	send();

	// 	onload = function(){

	// 		var oDados = JSON.parse(responseText);

	// 		document.getElementsByName("codEmpresa")[0].value = oDados[0]['EMP_COD'];
	// 		document.getElementsByName("txtNomeEmpresa")[0].value = oDados[0]['EMP_NOME_EMPRESA'];
	// 		document.getElementsByName("txtCnpj")[0].value = oDados[0]['EMP_CNPJ'];





	// 	}

	// }


}


function atualizaComboEmpresa(){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=comboConta');

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			for(var i = 0; i<oDados.length; i++){
				var x = document.getElementById("cmbEmpresa");
				var option = document.createElement("option");
				option.text = oDados[i]['EMP_NOME_EMPRESA'];
				option.value = oDados[i]['EMP_COD'];
				x.add(option);
			}
		}
	}
}








//  --------------------------------------------FIM EMPRESA ------------------------------------------------


//  --------------------------------------------CONTA ------------------------------------------------
function selecionaAcaoConta(param){

	if(param == 1){
		if(document.getElementsByName("nomeBanco")[0].value.trim().length<=0 || document.getElementsByName("agenciaConta")[0].value.trim().length<=0 || document.getElementsByName("numeroConta")[0].value.trim().length<=0){
			alert("Preencha o nome do Banco");
			document.getElementsByName("nomeBanco")[0].focus();
		}else{

			var oPagina = new XMLHttpRequest();
			with(oPagina){


				var nomeConta = document.getElementsByName("nomeConta")[0].value;
				var nomeBanco = document.getElementsByName("nomeBanco")[0].value;
				var empresa = document.getElementsByName("cmbEmpresa")[0].value;
				var agenciaConta = document.getElementsByName("agenciaConta")[0].value;
				var conta = document.getElementsByName("numeroConta")[0].value;
				var tipo = document.getElementsByName("tipoConta")[0].value;
				var saldo = document.getElementsByName("saldoInicial")[0].value;
				var status = document.getElementsByName("cmbStatusConta")[0].value;				

				open('GET', './src/CrudUsuario.php?funcao=insereConta&nomeConta='+nomeConta+'&nomeBanco='+nomeBanco+'&cmbEmpresa='+empresa+'&agenciaConta='+agenciaConta+'&numeroConta='+conta+'&tipoConta='+tipo+'&saldoInicial='+saldo+'&cmbStatusConta='+status);

				send();
				onload = function(){




					if(responseText != "Erro ao Inserir"){

						var oDados = JSON.parse(responseText);

						var Contador = parseInt(oDados.length);

						Contador = Contador -1;

						var tableConta = document.getElementById("tableConta");



						tableEmpresa.insertAdjacentHTML('beforeend',
							"<tr><td>" + oDados[Contador]['EMP_COD'] + "</td>"+
							"<td>" + oDados[Contador]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td>" + oDados[Contador]['EMP_CNPJ'] + "</td> "+
							"<td><button class = 'btn' id = '"+oDados[Contador]['EMP_COD']+
							"' onclick = 'alert(this.id)'>Alterar</button></tr> "
							);

					}

					else{
						document.getElementById("retornoFormEmpresa").style.display = "block";
						document.getElementById("retornoFormEmpresa").innerHTML = "Não foi possível inserir a empresa";
						setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);

					}

				}

			}

		}
	}
}





















function selecionaConta(codConta){
	codConta = 'con'+codConta;

		document.getElementById("codConta").value = document.getElementsByName(codConta)[0].innerText;
		document.getElementById("nomeConta").value = document.getElementsByName(codConta)[1].innerText;
		document.getElementById("nomeBanco").value = document.getElementsByName(codConta)[2].innerText;
		document.getElementById("cmbEmpresa").value = document.getElementsByName(codConta)[3].innerText;
		document.getElementById("agenciaConta").value = document.getElementsByName(codConta)[4].innerText;
		document.getElementById("numeroConta").value = document.getElementsByName(codConta)[5].innerText;
		document.getElementById("tipoConta").value = document.getElementsByName(codConta)[6].innerText;
		document.getElementById("saldoInicial").value = document.getElementsByName(codConta)[7].innerText;
		document.getElementById("cmbStatusConta").value = document.getElementsByName(codConta)[8].innerText;
		



		document.getElementById("buttonEmpresa").innerHTML = "Alterar";
		document.getElementById("buttonEmpresa").value = 2;
		document.getElementById("buttonCancelarEmpresa").style.display = 'inline';
}
//  --------------------------------------------FIM CONTA ------------------------------------------------





//  --------------------------------------------ADMINISTRADOR USUÁRIO ------------------------------------------------


//  --------------------------------------------FIM ADMINISTRADOR ------------------------------------------------





//  --------------------------------------------ATUALIZAÇÃO DA PÁGINA ------------------------------------------------

(function(){


	atualizaComboEmpresa();



}())

//  --------------------------------------------FIM ATUALIZAÇÃO ------------------------------------------------




