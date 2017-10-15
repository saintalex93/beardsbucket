
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

