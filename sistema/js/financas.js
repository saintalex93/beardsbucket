function fnHideFormFinancas(form){

	if(form == "formReceita"){

		document.all.lancReceit.style.display = "block";
		document.all.lancDesp.style.display = "none";

	}

	else{


		document.all.lancReceit.style.display = "none";
		document.all.lancDesp.style.display = "block";
	}




}



function fnMenuFinancas(button){



	if(button.id == "lancamento"){


		button.setAttribute('class', 'active');
		document.getElementById("categ").setAttribute('class', '');
		document.getElementById("consulta").setAttribute('class', '');


		document.getElementById("DivreceiDesp").style.display = "block";
		document.getElementById("divCategoria").style.display = "none";
		document.getElementById("divConsulta").style.display = "none";



	}

	if(button.id == "categ"){


		button.setAttribute('class', 'active');
		document.getElementById("lancamento").setAttribute('class', '');
		document.getElementById("consulta").setAttribute('class', '');


		document.getElementById("divCategoria").style.display = "block";
		document.getElementById("DivreceiDesp").style.display = "none";
		document.getElementById("divConsulta").style.display = "none";


	}

	if(button.id == "consulta"){

		button.setAttribute('class', 'active');
		document.getElementById("categ").setAttribute('class', '');
		document.getElementById("lancamento").setAttribute('class', '');

		document.getElementById("divConsulta").style.display = "block";
		document.getElementById("divCategoria").style.display = "none";
		document.getElementById("DivreceiDesp").style.display = "none";

	}




}