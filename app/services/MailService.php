<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public function sendEmail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];
            $mail->Username = $_ENV['MAIL_USERNAME'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->Port = $_ENV['MAIL_PORT'];
            $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
            $mail->SMTPAuth = true;

            $mail->Subject = $subject;
            $mail->Body = $body;

            $senderEmail = $_ENV['MAIL_FROM_ADDRESS'];
            $senderName = $_ENV['MAIL_FROM_NAME'];

            $mail->setFrom($senderEmail, $senderName);
            $mail->addAddress($to);
            $mail->send();

            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}