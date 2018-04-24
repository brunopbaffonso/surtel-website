<?php
	include 'class/class.phpmailer.php' ;
	include 'class/class.smtp.php';

	// Variaveis
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$fone = $_POST['fone'];
	$mensagem = $_POST['mensagem'];
	$data_envio = date('d/m/Y');
	$hora_envio = date('H:i:s');

	// Corpo do email
	$arquivo = "
	<style type='text/css'>
	body {
	margin:0px;
	font-family:Verdane;
	font-size:12px;
	color: #000000;
	}
	a{
	color: #000000;
	text-decoration: none;
	}
	a:hover {
	color: #FF0000;
	text-decoration: none;
	}
	</style>
		<html>
				<table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#FFFFFF'>
						<td>
							<tr>
							 <td width='500'>Nome: <b>$nome</b></td>
							</tr>
							<tr>
								<td width='320'>E-mail: <b>$email</b></td>
	 						</tr>
							<tr>
								<td width='320'>Telefone: <b>$fone</b></td>
							</tr>
							<tr>
								<td width='320'>Mensagem: <b>$mensagem</b></td>
							</tr>
					</td>
					<tr>
						<td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
					</tr>
				</table>
		</html>
	";

	//PHPMailer Object
	$mail = new PHPMailer;

	//From email address and name
	$mail->From = $email;
	$mail->FromName = $nome;

	//To address and name
	$mail->addAddress("brunoaffonso1994@gmail.com", "Bruno Affonso");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "Contato via Site";
	$mail->Body = $arquivo;
	$mail->Host = "smtp.onda.com.br";                   // Specify main and backup SMTP servers
	$mail->Port = 587;
	$mail->Username = "mzfm@onda.com.br";               // SMTP username
	$mail->Password = "2c8mtx4f";                       // SMTP password
	$mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se disponível
	$mail->SMTPAuth = true; 														// Enable SMTP authentication
	$mail->isSMTP();                                    // Set mailer to use SMTP

	if(!$mail->send())
	{
	    echo "Falha ao Enviar a Mensagem :( <br /> Erro: " . $mail->ErrorInfo;
	}
	else
	{
	    echo "A Mensagem foi enviada com Sucesso! :)";
			echo "<br />Aguarde! Voce será Redirecionado...";
			header( "refresh:5;url=contact.html" );
	}

?>
