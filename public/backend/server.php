<?php 
require 'conexion.php';
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.pop3.php';

function enviaMail($nombres, $apellidos, $email, $mensaje){
	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Username = 'cruzmmh@gmail.com';
	$mail->Password = 'Ligakalos1';
	$mail->Port = 587;
	$mail->setFrom('cruzmmh@gmail.com','Mensaje desde CV');
	$mail->addAddress('cruzmmh@gmail.com');

	$mail->isHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Subject = 'Nuevo contacto a tu CV';
	$mail->Body = "Daniel alguien te ha enviado un mensaje desde DanielCruzCV<br>
					Nombre: ".$nombres."<br>"
					."Apellido: " .$apellidos."<br>"
					."Correo: " .$email."<br>"
					."Mensaje: " .$mensaje;
	$mail->Body = str_replace('\r\n','<br>',$email->Body);

	if(!$mail->send()){
		echo 'Message could not be send.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	}else{
		echo 'Correo enviado';
	}
}

function checkMail($mail){
	if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
	{
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['nombres']) && !empty($_POST['nombres']) AND
	isset($_POST['apellidos']) && !empty($_POST['apellidos']) AND
	isset($_POST['mail']) && !empty($_POST['mail']) AND
	isset($_POST['mensaje']) && !empty($_POST['mensaje']))
{
	$nombres = mysqli_real_escape_string($db,$_POST['nombres']);
	$apellidos = mysqli_real_escape_string($db,$_POST['apellidos']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$mensaje = mysqli_real_escape_string($db,$_POST['mensaje']);

	if(checkMail($mail)){
		$sql="INSERT INTO contactoscv (`id`, `nombre`, `apellido`, `email`, `mensaje`) VALUES
		('', '$nombres', '$apellidos', '$email', '$mensaje')";
		$saveDB = mysql_query($db, $sql);
		if ($saveDB) {
			enviaMail($nombres,$apellidos,$email,$mensaje);
			echo "<div id='warnings'><script>document.getElementById('formCV').reset(); </script>
			<script> swal({title: '¡Gracias!', text: 'Datos guardados con éxito', type:'success', showCancelButton: false, confirmButtonColor: '#62CB7E', confirmButtonText: 'O.K.', closeOnConfirm: true}); </script></div>";
		}
		else{
			echo "<div id='warnings'><script>document.getElementById('formCV').reset(); </script>
			<script> swal({title: 'Error', text: 'Error de conexion', type:'success', showCancelButton: false, confirmButtonColor: '#EE3B24', confirmButtonText: 'O.K.', closeOnConfirm: true}); </script></div>";
			echo mysql_error($db);
		}
	}
		else{
			echo "<div id='warnings'><script>document.getElementById('formCV').reset(); </script>
			<script> swal({title: 'Error', text: 'Mail invalido', type:'success', showCancelButton: false, confirmButtonColor: '#62CB7E', confirmButtonText: 'O.K.', closeOnConfirm: true}); </script></div>";
		}
	}
		else{
			echo "<div id='warnings'><script>document.getElementById('formCV').reset(); </script>
			<script> swal({title: 'Ojo', text: 'Datos incompletos', type:'success', showCancelButton: false, confirmButtonColor: '#C68A53', confirmButtonText: 'O.K.', closeOnConfirm: true}); </script></div>";
		}
?>