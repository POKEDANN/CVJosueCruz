<?php
require 'conexion.php';
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.pop3.php';
    // //Template User Formulario
    // $templateUser = file_get_contents('MailUserForm.html');
    // $templateUser = str_replace('%name%', $nombre,$templateUser);
    // $templateUser = str_replace('%email%', $email,$templateUser);
    // $templateUser = str_replace('%hash%', $hash,$templateUser);

    // //Template Admin
    // $templateAdmin = file_get_contents('MailAdminForm.html');
    // $templateAdmin = str_replace('%name%', $nombre,$templateAdmin);
    // $templateAdmin = str_replace('%email%', $email,$templateAdmin);
    // $templateAdmin = str_replace('%hash%', $hash,$templateAdmin);

    function enviaMail($nombres, $apellidos, $email, $mensaje){
    $mail = new PHPMailer;
    // $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'cruzmmh@gmail.com';
    $mail->Password = 'Ligakalos1';
    $mail->Port = 587;
    $mail->setFrom('cruzmmh@gmail.com','Te han enviado un mensaje desde danielcruz.esy.es');
    $mail->addAddress('cruzmmh@gmail.com');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Nuevo contacto a tu CV';
    $mail->Body = "Mensaje nuevo desde danielcruz.esy.es!!!<br>
         Nombre de la empresa: ".$nombres."<br>"
         ."Nombre de la vacante: " .$apellidos."<br>"
         ."Correo: " .$email."<br>"
         ."Mensaje: " .$mensaje;
    $mail->Body = str_replace('\r\n','<br>',$mail->Body);

    if(!$mail->send()){
    echo 'Message could not be send.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
    echo 'Correo enviado';
    }
    }

     // //Envia Mail Cliente
     // $mail2 = new PHPMailer;
     // //$mail->SMTPDebug = 3;
     // $mail2->isSMTP();
     // $mail2->Host = 'mail.exitoinmobiliarioya.com';
     // $mail2->SMTPAuth = true;
     // //$mail2->SMTPSecure = "tls";
     // $mail2->Username = 'contacto@exitoinmobiliarioya.com';
     // //$mail->Username = 'erik@concepthaus.mx'; //Mail para pruebas
     // $mail2->Password = 'Fcw=mTlgAEU[';
     // //$mail2->Username = 'franquiciasquality@gmail.com';//se envia mail  a user desde este (solo se envia)
     // //$mail2->Password = 'franquicias135';//se envia mail  a user desde este (solo se envia)
     // //$mail->Port = 587;
     // $mail2->Port = 26;
     // $mail2->setFrom('contacto@exitoinmobiliarioya.com','Exito Inmobiliario'); //Pruebas se envía de este
     // //$mail2->setFrom('franquiciasquality@gmail.com','Exito Inmobiliario'); //se envia mail  a user desde este (solo se envia)
     // //$mail->setFrom('erik@concepthaus.mx','Erik Rodriguez'); //Pruebas se envía de este 
     // $mail2->addAddress($email,$nombre);
     // //$mail2->addAddress('erik@concepthaus.mx','Erik Rodriguez');// Aquí llega el correo en pruebas.
     // $mail2->isHTML(true);
     // $mail2->CharSet = 'UTF-8';
     // $mail2->Subject = 'Gracias por tu apoyo'; 
     // $mail2->Body = $templateUser;
     // $mail2->send();
       
function checkmailf1($email){
    if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$email))
        {
            return true;
        }
        else{
            return false;
        }
    }

    if(isset($_POST['nombres']) && !empty($_POST['nombres']) AND
       isset($_POST['apellidos']) && !empty($_POST['apellidos']) AND
       isset($_POST['email']) && !empty($_POST['email']) AND
       isset($_POST['mensaje']) && !empty($_POST['mensaje']))
    {
        $nombres = mysqli_real_escape_string($db,$_POST['nombres']);
        $apellidos = mysqli_real_escape_string($db,$_POST['apellidos']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $mensaje = mysqli_real_escape_string($db,$_POST['mensaje']);
        $longnom = strlen ($nombres);
        $query = "SELECT `email` FROM Curriculum WHERE `email` = '$email';";    
        $result = mysqli_query($db, $query); 

if(checkmailf1($email)){
    if(mysqli_num_rows($result) == 0){
    if(!is_numeric($nombres))
        {
            if($longnom > 4)
                {
                    $sql="INSERT INTO Curriculum(`id`, `nombres`,`apellidos`,`email`,`mensaje`) VALUES
                    ('','$nombres','$apellidos','$email','$mensaje')";
                    $saveDB = mysqli_query($db, $sql);
                    if($saveDB){
                        enviaMail($nombres,$apellidos,$email,$mensaje);
                        echo "<div id='warnings'>
                              <script>document.getElementById('CVform').reset(); </script> 
                              <script>swal({   title: '¡Gracias!',   text: 'Datos guardados con éxito',   type: 'success',   showCancelButton: false,   confirmButtonColor: '#62CB7E',   confirmButtonText: 'O.K',   closeOnConfirm: true }); </script></div>";
                              
                            }
                    else{
                        echo "<div id='warnings'>
                            <script>sweetAlert({title:'Error',text:'Ocurrio un error en la base de datos',confirmButtonColor:'#F06060' ,type:'error'}); </script></div>"; 
                        echo   mysqli_error($db);
                    }
                    }else
                    {
                        echo "<div id='warnings'>
                            <script>sweetAlert({title:'Error',text:'Tu nombre debe contener 4 letras como minimo',confirmButtonColor:'#F06060' ,type:'error'}); </script></div>"; 
                    }
        }
    else {
        echo "<div id='warnings'>
            <script>sweetAlert({title:'Error',text:'El campo nombre debe ser texto ',confirmButtonColor:'#F06060' ,type:'error'}); </script></div>"; 
        }
    }
    else{
        echo "<div id='warnings'> 
            <script>sweetAlert({title:'Error',text:'Este e-mail ya existe en nuestra base de datos',confirmButtonColor:'#F06060',type:'error'}); </script></div>";
        echo mysqli_error($db);
        }
    }

    else{
        echo "<div id='warnings'> 
            <script>sweetAlert({title:'Error',text:'Este e-mail es incorrecto',confirmButtonColor:'#F06060',type:'error'}); </script></div>";
        }
    }

        
    else{
        echo "<div id='warnings'>
        <script>sweetAlert({title:'Error',text:'Datos incompletos',confirmButtonColor:'#F06060',type:'error'});</script></div>";
        }
?>
