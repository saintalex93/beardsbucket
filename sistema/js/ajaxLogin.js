function selectLogin(usuario, senha){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', './src/verifica_login.php?usuario='+usuario+'&senha='+senha);

		

		send();
		onload = function(){

			var oDados = JSON.parse(responseText);

			
			if(oDados == 0){
				document.all.message.innerHTML = "Usuário não encontrado";
			}

			else if(oDados == -1){
				document.all.message.innerHTML = "Senha Inválida";
				
			}

			else if(oDados == 1){
				window.location = "./dashboard.php";
			}





		}


	}

}




// http://localhost/beardsbucket/sistema/src/verifica_login.php?usuario=antunes&senha=123456