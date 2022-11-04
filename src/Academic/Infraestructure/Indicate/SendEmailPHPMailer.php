<?php 
namespace CleanArchitectureApp\Academic\Infraestructure\Indicate;

use Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use CleanArchitectureApp\Academic\Domain\Student\Student;
use CleanArchitectureApp\Academic\Application\Indicate\SendEmailIndicate;

class SendEmailPHPMailer implements SendEmailIndicate
{
    public function send(Student $studentIndicate): void
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'user@example.com';
            $mail->Password = 'secret';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
        
            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($studentIndicate->getEmail(), $studentIndicate->getName());
            $mail->addAddress($studentIndicate->getEmail());
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
        
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');
            $mail->addAttachment('/tmp/image.jpg','new.jpg');
        
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}