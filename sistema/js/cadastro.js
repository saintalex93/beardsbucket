function fnHideFormCadastro(form){

	if(form == "formPF"){


		document.all.formCadastroPJ.style.display = "none";
		document.all.formCadastroPF.style.display = "block";

	}

	else{


		document.all.formCadastroPJ.style.display = "block";
		document.all.formCadastroPF.style.display = "none";
	}




}



function fnMenuCadastro(button){



if(button.id == "categ"){


	button.setAttribute('class', 'active');

	document.getElementById("cliForn").setAttribute('class', '');

	document.getElementById("clientesFornecedores").style.display = "none";

	document.getElementById("categoria").style.display = "block";


}

if(button.id == "cliForn"){


	button.setAttribute('class', 'active');

	document.getElementById('categ').setAttribute('class', '');

	document.getElementById("clientesFornecedores").style.display = "block";

	document.getElementById("categoria").style.display = "none";


}




}