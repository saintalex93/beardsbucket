
function fnBotoes(button){



	if(button.id == "cadastro"){

		button.setAttribute('class', 'active');
		document.getElementById("vinculo").setAttribute('class', '');

		document.getElementById("rowCadastro").style.display = "block";
		document.getElementById("rowVinculo").style.display = "none";


	}

	if(button.id == "vinculo"){

		button.setAttribute('class', 'active');
		document.getElementById("cadastro").setAttribute('class', '');

		document.getElementById("rowCadastro").style.display = "none";
		document.getElementById("rowVinculo").style.display = "block";

	}

}



function fnMenuFinancas(button){



	if(button.id == "lancamento"){

		button.setAttribute('class', 'active');
		document.getElementById("categ").setAttribute('class', '');

		document.getElementById("rowCliente").style.display = "block";
		document.getElementById("rowCategoria").style.display = "none";


	}

	if(button.id == "categ"){

		button.setAttribute('class', 'active');
		document.getElementById("lancamento").setAttribute('class', '');

		document.getElementById("rowCliente").style.display = "none";
		document.getElementById("rowCategoria").style.display = "block";

	}

}


function fnMenuLogin(button){



	if(button.id == "entrar"){

		button.setAttribute('class', 'active');
		document.getElementById("cadastrar").setAttribute('class', '');

		document.getElementById("imagemLogin").style.marginTop = "";
		document.getElementById("cardLogin").style.marginBottom = "";

		document.getElementById("cardCadastro").style.display = "none";
		



	}

	if(button.id == "cadastrar"){

		button.setAttribute('class', 'active');
		document.getElementById("entrar").setAttribute('class', '');
		document.getElementById("cardLogin").style.marginBottom = "-800px";

		document.getElementById("imagemLogin").style.marginTop = "-250px";

		document.getElementById("cardCadastro").style.display = "block";


		


	}

}

function menuLancamento(button){
	if(button.id == "btnLancamento"){

		button.setAttribute('class', 'active');
		document.getElementById("btnConsulta").setAttribute('class', '');

		document.getElementById("lancamento").style.display = "block";
		document.getElementById("consulta").style.display = "none";


	}

	if(button.id == "btnConsulta"){

		button.setAttribute('class', 'active');
		document.getElementById("btnLancamento").setAttribute('class', '');

		document.getElementById("lancamento").style.display = "none";
		document.getElementById("consulta").style.display = "block";

	}


}


