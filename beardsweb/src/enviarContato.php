<?php



require_once ('../library/PHPMailer/class.phpmailer.php');

// include("../library/PHPMailer/class.phpmailer.php");

$mail = new PHPMailer(true);

$mail->IsSMTP(); // Define que a mensagem será SMTP

$mail->CharSet = 'UTF-8';
 
try {
     $mail->Host = 'br194.hostgator.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
	 $mail->SMTPSecure = "ssl"; // Usar conexão criptografia
     $mail->Port       = 465; //  Usar 587 porta SMTP
     $mail->Username = 'site@beardsweb.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'Beardsweb666'; // Senha do servidor SMTP (senha do email usado)
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('site@beardsweb.com.br', 'Beards Web'); //Seu e-mail
     $mail->AddReplyTo('site@beardsweb.com.br', 'Beards Web'); //Seu e-mail
     $mail->Subject = 'Formulario de Contato';//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('diego.rodrigues.joaquim@gmail.com', 'Formulario de Contato');
 
     $mail->AddBCC("alexsantosinformatica@gmail.com","Formulario de Contato"); // Envia Cópia Oculta
 

     //Define o corpo do email
     $mail->MsgHTML('
        Contato enviado pelo site. <br> <br>
        Nome: '.$_POST["txtNome"].'<br />
        E-mail: '.$_POST["txtEmail"].'<br />
        Assunto: '.$_POST["txtAssunto"].'<br />
        Mensagem: '.$_POST["txtMensagem"].'<br />
    '); 
      
     $mail->Send();
     $result = array('status'=>2, 'mensagem' => 'Formulário enviado com sucesso.');
     echo json_encode($result);
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
        $result = array('status'=>1, 'mensagem' => 'Não foi possível enviar o formulário.'.$e);
        echo json_encode($result);
}