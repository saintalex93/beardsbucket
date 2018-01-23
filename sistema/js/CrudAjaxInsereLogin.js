
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

		if(document.getElementsByName("saldoContaCadastro")[0].value.trim().length<=0){
			saldo = "0.00";
		}
		else{	
			saldo = saldo.replace('R$','').replace('.','').replace(',','.').trim();
		}

	}
	var senhaCadastro = document.getElementById("senhaCadastro").value;
	var tipoConta = document.getElementById("tipoConta").value;

	if(validaCampos()){

		var oPagina = new XMLHttpRequest();

		with(oPagina){

			open('GET', './src/insertCadastroUser.php?nomeCadastro='+nome+'&loginCadastro='+login+'&senhaCadastro='
				+senhaCadastro+'&emailCadastro='+email+'&nomeEmpresaCadastro='+empresa+'&cnpjEmpresaCadastro='+cnpj+
				'&nomeContaCadastro='+nomeConta+'&bancoContaCadastro='+banco+'&agenciaContaCadastro='+agencia+
				'&numeroContaCadastro='+conta+'&tipoContaCadastro='+tipoConta+'&saldoContaCadastro='+saldo);

			send();

			onload = function(){

				if(responseText.trim() != "RollBack"){


					window.fnMenuLogin(entrar);

					var oDados = JSON.parse(responseText);

					document.getElementById("usuario").value = oDados[0]['USR_LOGIN'];
					document.getElementById("senha").value = oDados[0]['USR_SENHA'];

					document.getElementById("retornoFormLogin").style.display = "block";
					document.getElementById("retornoFormLogin").innerHTML = "Usuário cadastrado com Sucesso!";
					document.getElementById("retornoFormLogin").setAttribute("class", "retSuccess");
					setTimeout(function(){ document.getElementById("retornoFormLogin").style.display = "none"; }, 3000);

				}

				else{

					document.getElementById("retornoFormInserir").style.display = "block";
					document.getElementById("retornoFormInserir").innerHTML = "Erro ao Cadastrar Usuário";
					document.getElementById("retornoFormInserir").setAttribute("class", "retDanger");
					setTimeout(function(){ document.getElementById("retornoFormInserir").style.display = "none"; }, 3000);
				}
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
	
	else{
		return true;
	}
	

}



