function validaCampos(){
	with(document.all){
		if(txtNome.value.trim().length<1){
			return false;
		}
		else if(txtEmail.value.trim().length<1){

			return false;
		}
		else if(txtAssunto.value.trim().length<1){

			return false;
		}
		else if(txtMensagem.value.trim().length<1){

			return false;
		}

			return true;
	}
}



$(document).ready(function() {
        //********************* Enviando Form contato ***********************//
        $('#btnEnviar').click(function () {

        	if(validaCampos()){

        		var data = $('#contatoForm').serialize();
        		$('#resultadoCont').css('display', 'none');
        		$('#mensagemCont').html('').removeClass('alert-*');
        		carregando();
        		$.post('src/enviarContato.php',data, function (data) {
        			$.unblockUI();
        			switch(data.status) {
        				case 1:
        				$('#resultadoCont').css('display','block');
        				$('#mensagemCont').html(data.mensagem).addClass('erro');

        				break;
        				case 2:
        				$('#resultadoCont').css('display','block');
        				$('#mensagemCont').html(data.mensagem).addClass('sucesso');

        				setTimeout(function () {
        					$('#resultadoCont').css('display', 'none');
        					$('#mensagemCont').html('').removeClass('alert-*');
        				}, 2000);
        				break;
        			}   
        		},"json");
        	}});
    });






