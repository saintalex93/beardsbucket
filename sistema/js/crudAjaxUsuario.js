//  --------------------------------------------USUÁRIO ------------------------------------------------

function alteraUsuario(){

	var form = document.getElementById("usuarioPerfil");

	var nome = form.txtNomeUsr.value;

	var senha = form.txtSenhaUsr.value;
	var login = form.txtLoginUsr.value;
	var email = form.txtEmailUsr.value;

	if(form.txtNomeUsr.value.trim().length<=0){
		alert("Informe o seu nome");
		document.getElementsByName('txtNomeUsr')[0].focus();
	}

	else if(form.txtLoginUsr.value.trim().length<=0){
		alert("Informe o seu novo login");
		document.getElementsByName('txtLoginUsr')[0].focus();

	}

	else if(form.txtSenhaUsr.value.trim().length<=0){
		alert("Informe a sua nova senha");
		document.getElementsByName('txtSenhaUsr')[0].focus();

	}

	else{


		var oPagina = new XMLHttpRequest();
		with(oPagina){


			open('GET', './src/CrudUsuario.php?funcao=alteraUsuario&txtSenha='+senha+'&txtLogin='+login+'&txtNome='+nome+'&txtEmail='+email);

			send();
			onload = function(){



				if(responseText != "Erro ao alterar"){

					var oDados = JSON.parse(responseText);

				// Aproveita esses campos quando alterar um usuário, pois pode ser o próprio administrador
				
				form.txtNomeUsr.value = oDados[0]['USR_NOME'];
				form.txtLoginUsr.value = oDados[0]['USR_LOGIN'];
				form.txtSenhaUsr.value = oDados[0]['USR_SENHA'];
				form.txtEmailUsr.value = oDados[0]['USR_EMAIL'];
				document.getElementById("permissaoPagina").innerHTML = oDados[0]['USR_PERMISSAO'];
				document.getElementById("nomePagina").innerHTML = oDados[0]['USR_NOME'];

				// Aproveita esses campos quando alterar um usuário, pois pode ser o próprio administrador


				document.getElementById("retornoFormUsuario").style.display = "block";
				document.getElementById("retornoFormUsuario").setAttribute("class", "retSuccess");
				document.getElementById("retornoFormUsuario").innerHTML = "Usuário atualizado com sucesso!";
				setTimeout(function(){ document.getElementById("retornoFormUsuario").style.display = "none"; }, 3000);

				comboUsuario();
			}

			else{

				document.getElementById("retornoFormUsuario").style.display = "block";
				document.getElementById("retornoFormUsuario").setAttribute("class", "retDanger");
				document.getElementById("retornoFormUsuario").innerHTML = "Não foi atualizar o Usuário";
				setTimeout(function(){ document.getElementById("retornoFormUsuario").style.display = "none"; }, 3000);

			}

		}


	}

}

}


//  --------------------------------------------FIM USUÁRIO ------------------------------------------------




//  -------------------------------------------- EMPRESA ------------------------------------------------

function selecionaAcao(param){

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE EMPRESA/////////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

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

					// var Contador = parseInt(oDados.length);

					// Contador = Contador -1;

					var tableEmpresa = document.getElementById("tableEmpresa");

					document.getElementById("retornoFormEmpresa").style.display = "block";
					document.getElementById("retornoFormEmpresa").setAttribute("class", "retSuccess");

					document.getElementById("retornoFormEmpresa").innerHTML = "Dados inseridos com sucesso";

					setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);



					tableEmpresa.insertAdjacentHTML('afterbegin',
						"<tr class = 'registroInserido'><td name = 'emp"+oDados[0]['EMP_COD']+"'>" + oDados[0]['EMP_COD'] + "</td>"+
						"<td name = 'emp"+oDados[0]['EMP_COD']+"'>" + oDados[0]['EMP_NOME_EMPRESA'] + "</td> "+
						"<td name = 'emp"+oDados[0]['EMP_COD']+"'>" + oDados[0]['EMP_CNPJ'] + "</td> "+
						"<td name = 'emp"+oDados[0]['EMP_COD']+"'>" + oDados[0]['EMP_STATUS'] + "</td> "+

						"<td><button class = 'btn' id = '"+oDados[0]['EMP_COD']+
						"' onclick = 'selecionaEmpresa(this.id)'>Alterar</button></tr> "
						);

					atualizaComboEmpresa();

					
					setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);





				}

				else{

					document.getElementById("retornoFormEmpresa").style.display = "block";
					document.getElementById("retornoFormEmpresa").setAttribute("class", "retDanger");
					document.getElementById("retornoFormEmpresa").innerHTML = "Não foi possível inserir a empresa";
					setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);

				}

			}


		}

	}
}
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ALTERA EMPRESA/////////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

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

				if(responseText != "Erro ao Atualizar"){


					var oDados = JSON.parse(responseText);

					var codEmpresa = 'emp'+oDados[0]['EMP_COD'];

					document.getElementsByName(codEmpresa)[0].parentNode.className = "registroInserido";


					document.getElementsByName(codEmpresa)[1].innerText = oDados[0]['EMP_NOME_EMPRESA'];
					document.getElementsByName(codEmpresa)[2].innerText = oDados[0]['EMP_CNPJ'];
					document.getElementsByName(codEmpresa)[3].innerText = oDados[0]['EMP_STATUS'];

					document.getElementById("buttonEmpresa").innerHTML = "Inserir";
					document.getElementById("buttonCancelarEmpresa").style.display = 'none';
					document.getElementById("buttonEmpresa").value = 1;

					document.getElementById("retornoFormEmpresa").style.display = "block";

					document.getElementById("retornoFormEmpresa").setAttribute("class", "retSuccess");

					document.getElementById("retornoFormEmpresa").innerHTML = "Dados atualizados com sucesso";
					
					document.getElementById("cmbStatusEmpresa").disabled = true;

					cmbStatusEmpresa

					setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);

					setTimeout(function(){ document.getElementsByName(codEmpresa)[0].parentNode.removeAttribute("class"); }, 3000);

					document.all.txtCnpj.value = "";
					document.all.txtNomeEmpresa.value="";

					atualizaComboEmpresa();

					


				}

				else{

					document.getElementById("retornoFormEmpresa").style.display = "block";
					document.getElementById("retornoFormEmpresa").setAttribute("class", "retDanger");
					document.getElementById("retornoFormEmpresa").innerHTML = "Não foi possível atualizar a empresa";
					setTimeout(function(){ document.getElementById("retornoFormEmpresa").style.display = "none"; }, 3000);
				}

			}





		}
	}



}


// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////CANCELA A ALTERAÇÂO EMPRESA////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //


else if(param == 3){
	document.getElementById("buttonEmpresa").innerHTML = "Inserir";
	document.getElementById("buttonCancelarEmpresa").style.display = 'none';
	document.getElementById("buttonEmpresa").value = 1;

	document.all.txtCnpj.value = "";
	document.all.txtNomeEmpresa.value="";

	document.getElementById("cmbStatusEmpresa").selectedIndex = "0";

	document.getElementById("cmbStatusEmpresa").disabled = true;



}

}


// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// //////////////////////////////////////SELECIONA A EMPRESA DO FORM CONTA///////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
function selecionaEmpresa(codEmpresa){

	codEmpresa = 'emp'+codEmpresa;

	document.getElementById("cmbStatusEmpresa").disabled = false;


	document.getElementById("codEmpresa").value = document.getElementsByName(codEmpresa)[0].innerText;
	document.getElementById("txtNomeEmpresa").value = document.getElementsByName(codEmpresa)[1].innerText;
	document.getElementById("txtCnpj").value = document.getElementsByName(codEmpresa)[2].innerText;
	document.getElementById("cmbStatusEmpresa").value = document.getElementsByName(codEmpresa)[3].innerText;

	document.getElementById("buttonEmpresa").innerHTML = "Alterar";
	document.getElementById("buttonEmpresa").value = 2;
	document.getElementById("buttonCancelarEmpresa").style.display = 'inline';

}



//  --------------------------------------------FIM EMPRESA ------------------------------------------------




//  --------------------------------------------CONTA ------------------------------------------------

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE CONTA///////////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //


function selecionaAcaoConta(param){

	if(param == 1){

		if(document.getElementsByName("nomeConta")[0].value.trim().length<=0){
			alert("Digite o nome da conta");
			document.getElementsByName("nomeConta")[0].focus();
		}

		else if(document.getElementsByName("cmbEmpresa")[0].selectedIndex == 0){
			alert("Selecione uma Empresa ou Perfil");
			document.getElementsByName("cmbEmpresa")[0].focus();

		}

		else{

			var oPagina = new XMLHttpRequest();
			with(oPagina){

				var statusEmpresa = document.getElementById("cmbStatusConta").value;	
				var nomeConta = document.getElementsByName("nomeConta")[0].value;
				var nomeBanco = document.getElementsByName("nomeBanco")[0].value;
				var empresa = document.getElementsByName("cmbEmpresa")[0].value;
				var agenciaConta = document.getElementsByName("agenciaConta")[0].value;
				var conta = document.getElementsByName("numeroConta")[0].value;
				var tipo = document.getElementsByName("tipoConta")[0].value;
				var saldo = document.getElementsByName("saldoInicial")[0].value;

				if(document.getElementsByName("saldoInicial")[0].value.trim().length<=0){
					saldo = "0.00";
				}
				else{	
					saldo = saldo.replace('R$','').replace('.','').replace(',','.').trim();
				}

				open('GET', './src/CrudUsuario.php?funcao=insereConta&nomeConta='+nomeConta+'&nomeBanco='+nomeBanco+'&agenciaConta='+agenciaConta+'&numeroConta='+conta+'&tipoConta='+tipo+'&cmbStatusConta='+statusEmpresa+'&saldoInicial='+saldo+'&cmbEmpresa='+empresa);

				send();
				onload = function(){


					if(responseText != "Erro ao Inserir!"){

						var oDados = JSON.parse(responseText);

						// var Contador = parseInt(oDados.length) -1;


						var tableConta = document.getElementById("tableConta");



						tableConta.insertAdjacentHTML('afterbegin',
							"<tr class = 'registroInserido'><td name = 'conta"+oDados[0]['CNT_COD']+"'>" + oDados[0]['CNT_COD'] + "</td>"+
							"<td name = 'conta"+oDados[0]['CNT_COD']+"'>" + oDados[0]['CNT_NOME'] + "</td> "+
							"<td name = 'conta"+oDados[0]['CNT_COD']+"'>" + oDados[0]['CNT_BANCO'] + "</td> "+
							"<td name = 'conta"+oDados[0]['CNT_COD']+"'>" + oDados[0]['EMP_NOME_EMPRESA'] + "</td> "+
							"<td name = 'conta"+oDados[0]['CNT_COD']+"'>" + oDados[0]['CNT_SALDOINICIAL']+"</td> "+
							"<td name = 'conta"+oDados[0]['CNT_COD']+"'>" + oDados[0]['CNT_STATUS'] + "</td> "+


							"<td><button class = 'btn' id = '"+oDados[0]['CNT_COD']+
							"' onclick = 'selecionaConta(this.id)'>Alterar</button></tr> "
							);

						document.getElementById("retornoFormConta").style.display = "block";
						document.getElementById("retornoFormConta").innerHTML = "Dados inseridos com sucesso!";
						document.getElementById("retornoFormConta").setAttribute("class", "retSuccess");

						setTimeout(function(){ document.getElementById("retornoFormConta").style.display = "none"; }, 3000);

						setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);


						limparConta();
					}

					else{
						document.getElementById("retornoFormConta").style.display = "block";
						document.getElementById("retornoFormConta").innerHTML = "Não foi possível inserir a Conta";
						document.getElementById("retornoFormConta").setAttribute("class", "retDanger");

						setTimeout(function(){ document.getElementById("retornoFormConta").style.display = "none"; }, 3000);

					}


				}

			}
		}
	}
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////ATUALIZA CONTA/////////////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
if(param == 2){

	if(document.getElementsByName("nomeConta")[0].value.trim().length<=0){
		alert("Digite o nome da conta");
		document.getElementsByName("nomeConta")[0].focus();
	}

	else if(document.getElementsByName("cmbEmpresa")[0].selectedIndex == 0){
		alert("Selecione uma Empresa ou Perfil");
		document.getElementsByName("cmbEmpresa")[0].focus();

	}

	else{

		var oPagina = new XMLHttpRequest();
		with(oPagina){

			var nomeConta = document.getElementById("nomeConta").value;
			var nomeBanco = document.getElementById("nomeBanco").value;
			var agencia = document.getElementById("agenciaConta").value;
			var conta = document.getElementById("numeroConta").value;
			var tipoConta = document.getElementById("tipoConta").value;
			var statusEmpresa = document.getElementById("cmbStatusConta").value;
			var saldoInicial = document.getElementById("saldoInicial").value;
			var codEmpresa = document.getElementById("cmbEmpresa").value;
			var codConta = document.getElementById("codConta").value;

			if(document.getElementsByName("saldoInicial")[0].value.trim().length<=0){
				saldoInicial = "0.00";
			}
			else{	
				saldoInicial = saldoInicial.replace('R$','').replace('.','').replace(',','.').trim();
			}

			open('GET', './src/CrudUsuario.php?funcao=atualizaConta&nomeConta='+nomeConta+'&nomeBanco='+nomeBanco+'&agencia='+agencia+'&conta='+conta+'&tipoConta='+tipoConta+'&statusEmpresa='+statusEmpresa+'&saldoInicial='+saldoInicial+'&codEmpresa='+codEmpresa+'&codConta='+codConta);

			send();
			onload = function(){

				if(responseText != "Erro ao atualizar"){


					var oDados = JSON.parse(responseText);

					// var Contador = parseInt(oDados.length) -1;

					var tableConta = document.getElementById("tableConta");

					var codConta = 'conta'+oDados[0]['CNT_COD'];

					document.getElementsByName(codConta)[0].parentNode.className = "registroInserido";


					document.getElementsByName(codConta)[0].innerText = oDados[0]['CNT_COD'];
					document.getElementsByName(codConta)[1].innerText = oDados[0]['CNT_NOME'];
					document.getElementsByName(codConta)[2].innerText = oDados[0]['CNT_BANCO'];
					document.getElementsByName(codConta)[3].innerText = oDados[0]['EMP_NOME_EMPRESA'];
					document.getElementsByName(codConta)[4].innerText = oDados[0]['CNT_SALDOINICIAL'];
					document.getElementsByName(codConta)[5].innerText = oDados[0]['CNT_STATUS'];



					document.getElementById("retornoFormConta").style.display = "block";
					document.getElementById("buttonCancelarConta").style.display = 'none';
					document.getElementById("retornoFormConta").innerHTML = "Dados Alterados com sucesso!";
					document.getElementById("retornoFormConta").setAttribute("class", "retSuccess");

					setTimeout(function(){ document.getElementById("retornoFormConta").style.display = "none"; }, 3000);

					setTimeout(function(){ document.getElementsByName(codConta)[0].parentNode.removeAttribute("class"); }, 3000);



					limparConta();

				}

				else {
					document.getElementById("retornoFormConta").style.display = "block";
					document.getElementById("retornoFormConta").innerHTML = "Não foi possível alterar a Conta";
					document.getElementById("retornoFormConta").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormConta").style.display = "none"; }, 3000);
				}
			}
		}
	}
}
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////CANCELA A ALTERAÇÂO CONTA//////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

else if(param == 3){

	limparConta();
}


}


function selecionaConta(codConta){

	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=selecionaConta&codConta='+codConta);

		send();
		onload = function(){

			var oDados = JSON.parse(responseText);

			document.getElementById("codConta").value = oDados[0]['CNT_COD'];
			document.getElementById("nomeConta").value = oDados[0]['CNT_NOME'];
			document.getElementById("nomeBanco").value = oDados[0]['CNT_BANCO'];
			document.getElementById("cmbEmpresa").value = oDados[0]['EMP_COD'];
			document.getElementById("agenciaConta").value = oDados[0]['CNT_AGNC'];
			document.getElementById("numeroConta").value = oDados[0]['CNT_NMCONTA'];
			document.getElementById("tipoConta").value = oDados[0]['CNT_TIPO'];
			document.getElementById("saldoInicial").value = oDados[0]['CNT_SALDOINICIAL'];
			document.getElementById("cmbStatusConta").value = oDados[0]['CNT_STATUS'];

			document.getElementById("buttonCancelarConta").style.display = 'inline';
			document.getElementById('cmbStatusConta').disabled = false;
			document.getElementById('buttonConta').value = 2;
			document.getElementById('buttonConta').innerText = "Alterar";




		}
	}
}


function limparConta(){

	document.getElementById("buttonConta").value=1;
	document.getElementById("buttonConta").innerHTML = "Inserir";

	document.all.nomeConta.value = "";
	document.all.nomeBanco.value="";
	document.all.agenciaConta.value="";
	document.all.numeroConta.value="";
	document.all.saldoInicial.value="";
	document.all.cmbEmpresa.selectedIndex = "0";
	document.all.tipoConta.selectedIndex = "0";
	document.all.cmbStatusConta.selectedIndex = "0";


	document.getElementById('cmbStatusConta').disabled = true;

	document.getElementById("buttonConta").innerHTML = "Inserir";
	document.getElementById("buttonCancelarConta").style.display = 'none';
	document.getElementById("buttonConta").value = 1;
	

	document.getElementById("cmbStatusConta").disabled = true;


}

//  --------------------------------------------FIM CONTA ------------------------------------------------





//  --------------------------------------------ADMINISTRADOR USUÁRIO ------------------------------------------------
function selecionaAcaoAdministrador(param){

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //

// ///////////////////////////////////////////////INSERE ADMINISTRADOR///////////////////////////////////////////////////// // 

// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// //
if(param == 1){

	if(document.getElementsByName("administradorNome")[0].value.trim().length<=0){
		alert("Digite o nome do usuário");
		document.getElementsByName("administradorNome")[0].focus();
	}

	else if(document.getElementsByName("AdministradorLogin")[0].value.trim().length<=0){
		alert("Digite o Login");
		document.getElementsByName("AdministradorLogin")[0].focus();
	}

	else if(document.getElementsByName("administradorSenha")[0].value.trim().length<=0){
		alert("Digite a Senha");
		document.getElementsByName("administradorSenha")[0].focus();
	}


	else if(document.getElementsByName("cmbEmpresaAdm")[0].selectedIndex == 0){
		alert("Selecione uma Empresa ou Perfil");
		document.getElementsByName("cmbEmpresaAdm")[0].focus();

	}


	else if(document.getElementsByName("administradorStatus")[0].selectedIndex == 0){
		alert("Selecione um Status");
		document.getElementsByName("administradorStatus")[0].focus();

	}

	else if(document.getElementsByName("administradorPermissao")[0].selectedIndex == 0){
		alert("Selecione a permissão");
		document.getElementsByName("administradorPermissao")[0].focus();

	}

	else{

		var oPagina = new XMLHttpRequest();

		with(oPagina){

			var admNome = document.getElementsByName("administradorNome")[0].value;	
			var admLogin = document.getElementsByName("AdministradorLogin")[0].value;
			var admSenha = document.getElementsByName("administradorSenha")[0].value;
			var admEmail = document.getElementsByName("administradorEmail")[0].value;
			var admPermissao = document.getElementsByName("administradorPermissao")[0].value;
			var admStatus = document.getElementsByName("administradorStatus")[0].value;
			var comboEmpresa = document.getElementById("cmbEmpresaAdm").value;


			open('GET', './src/CrudUsuario.php?funcao=insereAdministrador&administradorNome='+admNome+'&administradorLogin='+admLogin+'&administradorSenha='+admSenha+'&administradorEmail='+admEmail+'&administradorPermissao='+admPermissao+'&administradorStatus='+admStatus+'&cmbEmpresaAdm='+comboEmpresa);

			send();
			onload = function(){

				if(responseText.substring(0,15) != "Erro ao inserir"){

					var oDados = JSON.parse(responseText);

					// var Contador = parseInt(oDados.length) -1;


					var tableAdministrador = document.getElementById("tableAdministrador");

					if(oDados[0]['USR_PERMISSAO'] != "Administrador"){

						tableAdministrador.insertAdjacentHTML('afterbegin',
							"<tr class = 'registroInserido'><td hidden name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_COD'] + "</td>"+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_NOME'] + "</td> "+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_LOGIN'] + "</td> "+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_PERMISSAO'] + "</td> "+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_STATUS']+"</td> "+
							"<td hidden name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_EMAIL'] + "</td> "+
							"<td hidden name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_SENHA'] + "</td> "+




							"<td><button class = 'btn' id = 'usr_admin"+oDados[0]['USR_COD']+
							"' onclick = 'selecionaUsuario(this.id)'>Alterar</button></tr> "
							);

					}
					else{
						tableAdministrador.insertAdjacentHTML('afterbegin',
							"<tr class = 'registroInserido'><td hidden name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_COD'] + "</td>"+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_NOME'] + "</td> "+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_LOGIN'] + "</td> "+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_PERMISSAO'] + "</td> "+
							"<td name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_STATUS']+"</td> "+
							"<td hidden name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_EMAIL'] + "</td> "+
							"<td hidden name = 'usr_admin"+oDados[0]['USR_COD']+"'>" + oDados[0]['USR_SENHA'] + "</td> "+


							"<td><button class = 'btn' id = 'usr_admin"+oDados[0]['USR_COD']+
							"' onclick = 'selecionaUsuario(this.id)' disabled>Alterar</button></tr> "
							);
					}

					document.getElementById("retornoFormAdministrador").style.display = "block";
					document.getElementById("retornoFormAdministrador").innerHTML = "Usuário inserido com sucesso!";
					document.getElementById("retornoFormAdministrador").setAttribute("class", "retSuccess");

					setTimeout(function(){ document.getElementById("retornoFormAdministrador").style.display = "none"; }, 3000);

					setTimeout(function(){ document.getElementsByClassName("registroInserido")[0].removeAttribute("class"); }, 3000);
					
					comboUsuario();
					limpaAdministrador();
				}

				else{
					document.getElementById("retornoFormAdministrador").style.display = "block";
					document.getElementById("retornoFormAdministrador").innerHTML = "Não foi possível inserir o Usuário"+responseText;
					document.getElementById("retornoFormAdministrador").setAttribute("class", "retDanger");

					setTimeout(function(){ document.getElementById("retornoFormAdministrador").style.display = "none"; }, 3000);

				}


			}

		}

	}

}

else if(param == 2){
	var oPagina = new XMLHttpRequest();
	with(oPagina){

		var admNome = document.getElementsByName("administradorNome")[0].value;	
		var admLogin = document.getElementsByName("AdministradorLogin")[0].value;
		var admSenha = document.getElementsByName("administradorSenha")[0].value;
		var admEmail = document.getElementsByName("administradorEmail")[0].value;
		var admPermissao = document.getElementsByName("administradorPermissao")[0].value;
		var admStatus = document.getElementsByName("administradorStatus")[0].value;
		var comboEmpresa = document.getElementById("cmbEmpresaAdm").value;
		var codUsuario = document.getElementById("administradorCod").value;

		
		open('GET', './src/CrudUsuario.php?funcao=alteraUsuarioAdministrador&txtSenha='+admSenha+'&txtLogin='+admLogin+'&txtNome='+admNome+'&txtEmail='+admEmail+'&txtStatus='+admStatus+'&txtPermissao='+admPermissao+'&txtCodUsuario='+codUsuario);

		send();
		onload = function(){

			if(responseText != "Erro ao alterar"){

				var oDados = JSON.parse(responseText);

				var tableAdmin = document.getElementById("tableAdministrador");

				var codUsuario = 'usr_admin'+oDados[0]['USR_COD'];

				document.getElementsByName(codUsuario)[0].parentNode.className = "registroInserido";


				document.getElementsByName(codUsuario)[0].innerText = oDados[0]['USR_COD'];
				// document.getElementsByName(codUsuario)[1].innerText = oDados[0]['EMP_NOME_EMPRESA'];
				document.getElementsByName(codUsuario)[1].innerText = oDados[0]['USR_NOME'];
				document.getElementsByName(codUsuario)[2].innerText = oDados[0]['USR_LOGIN'];
				document.getElementsByName(codUsuario)[3].innerText = oDados[0]['USR_PERMISSAO'];
				document.getElementsByName(codUsuario)[4].innerText = oDados[0]['USR_STATUS'];
				document.getElementsByName(codUsuario)[5].innerText = oDados[0]['USR_EMAIL'];
				document.getElementsByName(codUsuario)[6].innerText = oDados[0]['USR_SENHA'];
				// document.getElementsByName(codUsuario)[8].innerText = oDados[0]['COD_EMPR'];


				document.getElementById("retornoFormAdministrador").style.display = "block";
				document.getElementById("retornoFormAdministrador").innerHTML = "Usuário alterado com sucesso!";
				document.getElementById("retornoFormAdministrador").setAttribute("class", "retSuccess");

				setTimeout(function(){ document.getElementById("retornoFormAdministrador").style.display = "none"; }, 3000);
				setTimeout(function(){ document.getElementsByName(codUsuario)[0].parentNode.removeAttribute("class"); }, 3000);


				limpaAdministrador();
				comboUsuario();
			}

			else{
				document.getElementById("retornoFormAdministrador").style.display = "block";
				document.getElementById("retornoFormAdministrador").innerHTML = "Não foi possível alterar o Usuário";
				document.getElementById("retornoFormAdministrador").setAttribute("class", "retDanger");

				setTimeout(function(){ document.getElementById("retorinnerTextnoFormAdministrador").style.display = "none"; }, 3000);

			}


		}

	}


}

}

function selecionaUsuario(codUsuario){

	var admTabela = document.getElementsByName(codUsuario);
	
	var permissao, status;

	if(admTabela[3].innerText == "Administrador")
		permissao = 1;
	else
		permissao = 0;


	if(admTabela[4].innerText == "Ativo")
		status = 1;
	else
		status = 0;
	

	document.getElementById("administradorCod").value = admTabela[0].innerText;
	document.getElementById("administradorNome").value = admTabela[1].innerText;
	document.getElementById("AdministradorLogin").value = admTabela[2].innerText;
	document.getElementById("administradorSenha").value = admTabela[6].innerText;
	document.getElementById("administradorEmail").value = admTabela[5].innerText;
	document.getElementById("administradorPermissao").value = permissao;
	document.getElementById("administradorStatus").value = status;


	document.getElementById("buttonCancelarUsr").style.display = 'inline';
	document.getElementById('cmbEmpresaAdm').disabled = true;
	document.getElementById('buttonUsuario').value = 2;
	document.getElementById('buttonUsuario').innerText = "Alterar";

}

function limpaAdministrador(){

	document.getElementById("buttonUsuario").value=1;
	document.getElementById("buttonUsuario").innerHTML = "Inserir";

	document.getElementById("administradorCod").value = "";
	document.getElementById("administradorNome").value = "";
	document.getElementById("AdministradorLogin").value = "";
	document.getElementById("administradorSenha").value = "";
	document.getElementById("administradorEmail").value = "";
	document.getElementById("administradorPermissao").selectedIndex = "0";
	document.getElementById("administradorStatus").selectedIndex = "0";
	document.getElementById("cmbEmpresaAdm").selectedIndex = "0";

	document.getElementById('cmbEmpresaAdm').disabled = false;

	document.getElementById("buttonUsuario").innerHTML = "Inserir";
	document.getElementById("buttonCancelarUsr").style.display = 'none';
	document.getElementById("buttonUsuario").value = 1;

}



//  --------------------------------------------FIM ADMINISTRADOR ------------------------------------------------





//  --------------------------------------------ATUALIZAÇÃO DA PÁGINA ------------------------------------------------
// ATUALIZA COMBO EMPRESA DA CONTA

function atualizaComboEmpresa(){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=comboConta');

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			var contadorAdm = document.getElementById("cmbEmpresaAdm").length;
			

			for (i = 0; i <=contadorAdm; i++) {
				var combinhoAdm = document.getElementById("cmbEmpresaAdm");	
				combinhoAdm.remove(contadorAdm.i);
			}


			var r = document.getElementById("cmbEmpresaAdm");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			r.add(optionr);


			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("cmbEmpresaAdm");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['EMP_NOME_EMPRESA'];
				optionr.value = oDados[i]['EMP_COD'];
				r.add(optionr);
			}



			var x = document.getElementById("cmbEmpresa");
			var option = document.createElement("option");
			option.text = "Selecione...";
			x.add(option);

			var contador = document.getElementById("cmbEmpresa").length;

			for (i = 0; i <=contador; i++) {
				var combinho = document.getElementById("cmbEmpresa");	
				combinho.remove(combinho.i);
			}

			option.text = "Selecione...";
			x.add(option);

			for (var i = 0; i<oDados.length; i++){
				var x = document.getElementById("cmbEmpresa");
				var option = document.createElement("option");
				option.text = oDados[i]['EMP_NOME_EMPRESA'];
				option.value = oDados[i]['EMP_COD'];
				x.add(option);
			}
			
		}
	}
}


function comboUsuario(){
	var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=atualizaComboUsuario');

		send();

		onload = function(){

			var oDados = JSON.parse(responseText);

			var contador = document.getElementById("nomeUsuario").length;

			for (i = 0; i <=contador; i++) {
				var combinho = document.getElementById("nomeUsuario");	
				combinho.remove(combinho.i);
			}


			var r = document.getElementById("nomeUsuario");
			var optionr = document.createElement("option");
			optionr.text = "Selecione...";
			r.add(optionr);

			
			for (var i = 0; i<oDados.length; i++){
				var r = document.getElementById("nomeUsuario");
				var optionr = document.createElement("option");
				optionr.text = oDados[i]['USR_NOME'];
				optionr.value = oDados[i]['USR_COD'];
				r.add(optionr);
			}

		}
	}
}


function montaTabela(codUsr){


	if(document.getElementById("nomeUsuario").selectedIndex == 0){
		var tableUsuarioAdm = document.getElementById("tableUsuarioAdministrador");

		var linhas = document.getElementById("tableUsuarioAdministrador").rows;
		for (i= linhas.length-1; i>=1; i--){
			document.getElementById("tableUsuarioAdministrador").deleteRow(i);

		}
	}

	else{

		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open('GET', './src/CrudUsuario.php?funcao=montaTabelaUsuario&codUsuario='+codUsr);


			send();

			onload = function(){




				var oDados = JSON.parse(responseText);

				var tableUsuarioAdm = document.getElementById("tableUsuarioAdministrador");

				var linhas = document.getElementById("tableUsuarioAdministrador").rows;
				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableUsuarioAdministrador").deleteRow(i);

				}

				for(i = 0; i<oDados.length; i++){

					if(oDados[i]['COD_USR'] == null)
					{
						tableUsuarioAdm.insertAdjacentHTML('afterbegin', 
							"<tr><td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
							"<td name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMPRESA'] + "</td> "+
							"<td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['COD_USR_EMPR'] + "</td> "+

							"<td><button class = 'btn btn-info btn-fill btn-wd' id = 'ADM"+ oDados[i]['EMP_COD'] +"' onclick = 'vinculaUsuario(1, this.id)'>Vincular</button></tr> "
							);

					}

					else{
						tableUsuarioAdm.insertAdjacentHTML('afterbegin', 
							"<tr><td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
							"<td name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMPRESA'] + "</td> "+
							"<td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['COD_USR_EMPR'] + "</td> "+

							"<td><button class = 'btn btn-info btn-fill btn-wd danger' id = 'ADM"+ oDados[i]['EMP_COD'] +"' onclick = 'vinculaUsuario(2,this.id)'>Remover</button></tr> "
							);
					}


				}

			}


		}

	}
}



function vinculaUsuario(acao, codUsuario){

	var admTabela = document.getElementsByName(codUsuario);

	var codEmpresa = admTabela[0].innerText;
	var codUsuario = document.getElementById("nomeUsuario").value;

	var codTabelaEmpresa = admTabela[2].innerText;

// 1 vincula

if(acao == 1){

	if(confirm("Ao vincular o Usuario, ele terá acesso as informações da sua empresa.\nDeseja continuar?"))
	{

		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open('GET', './src/CrudUsuario.php?funcao=insereUsuario&COD_USR='+codUsuario+'&COD_EMPR='+codEmpresa+'&codUsuario='+codUsuario);


			send();

			onload = function(){

				var oDados = JSON.parse(responseText);

				var tableUsuarioAdm = document.getElementById("tableUsuarioAdministrador");

				var linhas = document.getElementById("tableUsuarioAdministrador").rows;
				for (i= linhas.length-1; i>=1; i--){
					document.getElementById("tableUsuarioAdministrador").deleteRow(i);

				}


				if(responseText != "Erro ao atualizar"){

					for(i = 0; i<oDados.length; i++){

						if(oDados[i]['COD_USR'] == null)
						{
							tableUsuarioAdm.insertAdjacentHTML('afterbegin', 
								"<tr><td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
								"<td name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMPRESA'] + "</td> "+
								"<td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['COD_USR_EMPR'] + "</td> "+

								"<td><button class = 'btn btn-info btn-fill btn-wd' id = 'ADM"+ oDados[i]['EMP_COD'] +"' onclick = 'vinculaUsuario(1, this.id)'>Vincular</button></tr> "
								);

						}

						else{
							tableUsuarioAdm.insertAdjacentHTML('afterbegin', 
								"<tr><td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
								"<td name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMPRESA'] + "</td> "+
								"<td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['COD_USR_EMPR'] + "</td> "+

								"<td><button class = 'btn btn-info btn-fill btn-wd danger' id = 'ADM"+ oDados[i]['EMP_COD'] +"' onclick = 'vinculaUsuario(2,this.id)'>Remover</button></tr> "
								);
						}


					}

				}

			}


		}
	}


}

// 2 Deleta
else{
	if(confirm("Ao desvincular o Usuário não será possível desfazer a ação.\nDeseja continuar?"))

		var oPagina = new XMLHttpRequest();

	with(oPagina){

		open('GET', './src/CrudUsuario.php?funcao=deletaUsuario&CODUSREMPR='+codTabelaEmpresa+'&codUsuario='+codUsuario);
		

		send();

		onload = function(){
			
			var oDados = JSON.parse(responseText);

			var tableUsuarioAdm = document.getElementById("tableUsuarioAdministrador");

			var linhas = document.getElementById("tableUsuarioAdministrador").rows;
			for (i= linhas.length-1; i>=1; i--){
				document.getElementById("tableUsuarioAdministrador").deleteRow(i);

			}


			if(responseText != "Erro ao atualizar"){

				for(i = 0; i<oDados.length; i++){

					if(oDados[i]['COD_USR'] == null)
					{
						tableUsuarioAdm.insertAdjacentHTML('afterbegin', 
							"<tr><td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
							"<td name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMPRESA'] + "</td> "+
							"<td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['COD_USR_EMPR'] + "</td> "+

							"<td><button class = 'btn btn-info btn-fill btn-wd' id = 'ADM"+ oDados[i]['EMP_COD'] +"' onclick = 'vinculaUsuario(1, this.id)'>Vincular</button></tr> "
							);

					}

					else{
						tableUsuarioAdm.insertAdjacentHTML('afterbegin', 
							"<tr><td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMP_COD'] + "</td>"+
							"<td name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['EMPRESA'] + "</td> "+
							"<td hidden name = 'ADM"+oDados[i]['EMP_COD']+"'>" + oDados[i]['COD_USR_EMPR'] + "</td> "+

							"<td><button class = 'btn btn-info btn-fill btn-wd danger' id = 'ADM"+ oDados[i]['EMP_COD'] +"' onclick = 'vinculaUsuario(2,this.id)'>Remover</button></tr> "
							);
					}


				}

			}

		}

		
	}


}

	// document.getElementById("administradorNome").value = admTabela[2].innerText;
	// document.getElementById("AdministradorLogin").value = admTabela[3].innerText;
	

}





(function(){

	atualizaComboEmpresa();
	comboUsuario();

}())

//  --------------------------------------------FIM ATUALIZAÇÃO ------------------------------------------------




