function selectLogin(usuario, senha){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', './src/verifica_login.php?usuario='+usuario+'&senha='+senha);

		

		send();
		onload = function(){

			var oDados = JSON.parse(responseText);

			
			if(oDados == 0){
				document.getElementById("message").style.display = "block";
				document.all.message.innerHTML = "Usuário não encontrado";
				setTimeout(function(){ document.getElementById("message").style.display = "none"; }, 3000);

			}

			else if(oDados == -1){
				document.getElementById("message").style.display = "block";
				document.all.message.innerHTML = "Senha Inválida";
				setTimeout(function(){ document.getElementById("message").style.display = "none"; }, 3000);

				
			}

			else if(oDados == 1){
				window.location = "./dashboard.php";
			}





		}


	}

}
