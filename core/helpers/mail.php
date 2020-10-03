<?php
require('../../../libraries/phpmailer52/PHPMailerAutoload.php');

/**
*   Clase para definir las plantillas de los reportes del sitio privado. Para más información http://www.fpdf.org/
*/
class Mail extends PHPMailer
{
    /*
    *   Método para iniciar enviar un correo con el código de recuperación
    *
    *   Parámetros: $token (código de recuperación).
    *
    *   Retorno: booleano(si se envio o no).
    */
    public function sendMail($to, $fullname, $token)
    {
        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "lostsockshop@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "LostSock20$20";

        //Set who the message is to be sent from
        $mail->setFrom('lostsockshop@gmail.com', 'Equipo de Lost Sock');

        //Set an alternative reply-to address
        // $mail->addReplyTo('replyto@example.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($to, $fullname);
        
        //Conten
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Solicitud de restablecer contraseña';
        $mail->Body    = 'Ingresa el siguiente código para poder cambiar la contraseña <b>'.$token.'</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //send the message, check for errors
        // if (!$mail->send()) {
        //     echo "Mailer Error: " . $mail->ErrorInfo;
        // } else {
        //     echo "Message sent!";
        //     //Section 2: IMAP
        //     //Uncomment these to save your message in the 'Sent Mail' folder.
        //     #if (save_mail($mail)) {
        //     #    echo "Message saved!";
        //     #}
        // }
        return $mail->send();
    }
}
?>