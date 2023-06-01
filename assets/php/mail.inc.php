<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER["DOCUMENT_ROOT"] . "/assets/php/values.inc.php";
require $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/PHPMailer/src/Exception.php";
require $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/PHPMailer/src/PHPMailer.php";
require $_SERVER["DOCUMENT_ROOT"] . "/assets/libraries/PHPMailer/src/SMTP.php";

/**
 * It sends an email to the specified address.
 * 
 * @param string to The email address to send the email to.
 */
function SendThankYouMail(string $to)
{
    /* Getting the password for the noreply email address. */
    global $noreplyPassword;

    /* Setting up the SMTP server, setting the from address and the to address, setting the body of the
    email, and sending the email. */
    try {
        /* This is setting up the SMTP server. */
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "lfinteractive.net";
        $mail->Username = "noreply@lfinteractive.net";
        $mail->Password = $noreplyPassword;
        
        /* Setting up the encryption */
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = true;
        $mail->Port = 587;

        /* This is setting the from address and the to address. */
        $mail->setFrom("noreply@lfinteractive.net");
        $mail->addAddress($to);

        /* This is the body of the email. */
        $mail->isHTML(true);
        $mail->Subject = "Thank You!";
        $mail->Body = "Thank you for your interest in LFInteractive.<br>We will be in touch.";
        $mail->AltBody = "Thank you for your interest in LFInteractive.\nWe will be in touch.";

        /* Sends the email. */
        $mail->send();
        echo "Mail sent successfully!";
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}
