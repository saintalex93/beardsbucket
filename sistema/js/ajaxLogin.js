function selectLogin(usuario, senha){


	var oPagina = new XMLHttpRequest();
	with(oPagina){

		open('GET', 'http://localhost/beardsbucket/sistema/src/verifica_login.php?usuario='+usuario+'&senha='+senha);



		send();
		onload = function(){

			alert(responseText);


			var oDados = JSON.parse(responseText);

			

		}


	}

}




// http://localhost/beardsbucket/sistema/src/verifica_login.php?usuario=antunes&senha=123456