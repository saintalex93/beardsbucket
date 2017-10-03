
function fnCepPF(cep){

	// cep = cep.replace(".", "").replace("-","");

	var oPagina = new XMLHttpRequest();

	with (oPagina){
		open('GET', "https://viacep.com.br/ws/"+cep+"/json/");

		send();

		onload = function(){
			var oDados = JSON.parse(responseText);

			document.all.pfLogradouro.value = oDados.logradouro;
			document.all.pfCidade.value = oDados.localidade;
			document.all.pfBairro.value = oDados.bairro;
			document.all.pfEstado.value = oDados.uf;

			document.all.pfNumero.focus();	


		}

	}

}

function fnCepPJ(cep){

	// cep = cep.replace(".", "").replace("-","");

	var oPaginaPJ = new XMLHttpRequest();

	with (oPaginaPJ){
		open('GET', "https://viacep.com.br/ws/"+cep+"/json/");

		send();

		onload = function(){
			var oDadosPj = JSON.parse(responseText);

			document.all.pjLogradouro.value = oDadosPj.logradouro;
			document.all.pjCidade.value = oDadosPj.localidade;
			document.all.pjBairro.value = oDadosPj.bairro;
			document.all.pjEstado.value = oDadosPj.uf;

			document.all.pjNumero.focus();	


		}

	}

}


