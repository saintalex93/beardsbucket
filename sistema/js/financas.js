
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