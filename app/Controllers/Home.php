<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Home extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form', 'Form']);
    }

    public function index()
    {
        $data['title'] = lang('Text.homepage_title');
        echo view('templates/header', $data);
        echo view('home/home.php', $data);
        echo view('templates/footer');
    }

    public function sendEmail()
    {

        $mail = new PHPMailer(true);

        $content = $this->request->getPost('content');
        $subject = $this->request->getPost('subject');

        try {

            $mail->SMTPDebug = 4;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = "ssl";
            $mail->Port       = 465;

            $mail->setFrom('heronavan@gmail.com', 'Piotr Pindel');
            $mail->addAddress('piotr.pindel97@gmail.com', 'Joe User');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->AltBody = $content;

            $mail->send();
            return redirect()->to(base_url());
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
