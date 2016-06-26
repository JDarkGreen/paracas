<?php //Obtenemos las valores enviados
	$name    = $_POST['name'];
	$from    = $_POST['email'];
	$phone   = $_POST['phone'];
	$message = $_POST['message'];

	//Email A quien se le rinde cuentas
	$webmaster_email1 = "reservas@paracassunset.com";
	$webmaster_email2 = "jgomez@ingenioart.com";

	include("./class.phpmailer.php");
 	include("./class.smtp.php");

	$mail = new PHPMailer();
	/*$mail->isSMTP(); // send via SMTP
	$mail->SMTPDebug = 2;	

	$mail->SMTPAuth   = true; // turn on SMTP authentication
	$mail->SMTPSecure = 'ssl';
	$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port       = 465;

	$mail->Username   = 'jgomez.4net@gmail.com'; // Enter your SMTP username
	$mail->Password   = 'ARLAC_RINO1EVER'; // SMTP password*/

	$mail->setFrom( $from , $name );
	//$mail->AddAddress( "reservas@paracassunset.com" );
	$mail->AddAddress( $webmaster_email1 );
	$mail->AddAddress( $webmaster_email2 );

	$mail->IsHTML(true); // send as HTML
	$mail->Subject = "Consulta - Mensaje PARACAS SUNSET: ";

	//Customizar el mensaje
	$mensaje  = "De Sr.(a) " . $name . "<br/>";
	$mensaje .= $message;
	$mensaje .= "<br/> Su teléfono es: " . $phone;

	$mail->Body = $mensaje;

	if($mail->Send()){
		echo "Su mensaje a sido enviado con éxito, estaremos respondiendo a la brevedad."; 
	} else {
		echo "Mailer Error: " . $mail->ErrorInfo ; 
	}

?>