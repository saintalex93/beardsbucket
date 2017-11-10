function insereUsuario(){

	with(document.all){

	var nome = nomeCadastro.value,
	login = loginCadastro.value,
	email = emailCadastro.value,
	empresa = nomeEmpresaCadastro.value,
	cnpj = cnpjEmpresaCadastro.value,
	nomeConta = nomeContaCadastro.value,
	banco = bancoContaCadastro.value,
	agencia = agenciaContaCadastro.value,
	conta = numeroContaCadastro.value,
	saldo = saldoContaCadastro.value;

	saldo = saldo.replace("R$","").replace(".","").replace(",",".");



}
	var senhaCadastro = document.getElementById("senhaCadastro").value;
	var tipoConta = document.getElementById("tipoConta").value;

	if(validaCampos()){

		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open('POST', './src/insertCadastroUser.php?nomeCadastro='+nome+'&loginCadastro='+login+'&senhaCadastro='
				+senhaCadastro+'&emailCadastro='+email+'&nomeEmpresaCadastro='+empresa+'&cnpjEmpresaCadastro='+cnpj+
				'&nomeContaCadastro='+nomeConta+'&bancoContaCadastro='+banco+'&agenciaContaCadastro='+agencia+
				'&numeroContaCadastro='+conta+'&tipoContaCadastro='+tipoConta+'&saldoContaCadastro='+saldo);

			send();

			onload = function(){

				alert(responseText);

			}
		}
	}
}

function validaCampos(){
	if(document.getElementById("nomeCadastro").value.trim().length<1){
		return false;
	}

	else if(document.getElementById("loginCadastro").value.trim().length<1){
		return false;
	}
	else if(document.getElementById("senhaCadastro").value.trim().length<1){
		return false;
	}

	else if(document.getElementById("nomeEmpresaCadastro").value.trim().length<1){
		return false;
	}

	else if(document.getElementById("nomeContaCadastro").value.trim().length<1){
		return false;
	}

	else if(document.getElementById("saldoContaCadastro").value.trim().length<1){
		return false;
	}


	
	else{
		return true;
	}
	

}
