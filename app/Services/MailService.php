<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/autoload.php';

class MailService
{
    private PHPMailer $mail;

    public function __construct(string $email, string $senha)
    {
        $this->mail = new PHPMailer();
        try {
            $this->mail->isSMTP();
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->Host = 'smtp-mail.outlook.com';
            $this->mail->Port = 587;
            $this->mail->SMTPSecure = 'TLS';
            $this->mail->SMTPAuth = true;
            $this->mail->CharSet = 'UTF-8';
            $this->mail->Username = $email;
            $this->mail->Password = $senha;
            $this->mail->setFrom($this->mail->Username, 'teste');
        } catch (Exception $e) {
            echo "Erro ao configurar o MAIL: {$this->mail->ErrorInfo}";
            print_r($e);
        }
    }

    /**
     * @throws Exception
     */
    public function sendEmail(string $email): void
    {
        $this->mail->addAddress($email);
        $this->mail->Subject = 'teste';
        $this->mail->Body    = 'teste';
        if (!$this->mail->send()) {
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        }

    }
}


