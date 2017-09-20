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