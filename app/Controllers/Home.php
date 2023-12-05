<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Mailosaur\MailosaurClient;
use Mailosaur\Models\SearchCriteria;


class Home extends BaseController
{
    public function index()
    {
        $data['title'] = lang('Text.homepage_title');
        echo view('templates/header', $data);
        echo view('home/home.php', $data);
        echo view('templates/footer');
    }



    public function sendEmail()
    {

        // $mail = new PHPMailer(true);

        // try {
        //     //Server settings
        //     $mail->SMTPDebug = 2;                      //Enable verbose debug output
        //     $mail->isSMTP();                                            //Send using SMTP
        //     $mail->Host       = 'smtp.freesmtpservers.com';                     //Set the SMTP server to send through
        //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        //     $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        //     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //     //Recipients
        //     $mail->setFrom('piotr.pindel@gmail.com', 'Piotr Pindel');
        //     $mail->addAddress('anything@n6pq24fw.mailosaur.net', 'Joe User');     //Add a recipient


        //     //Attachments

        //     //Content
        //     $mail->isHTML(true);                                  //Set email format to HTML
        //     $mail->Subject = 'Here is the subject';
        //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //     $mail->send();
        //     echo 'Message has been sent';
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }

        require_once('../vendor/autoload.php');
        // Available in the API tab of a server
        // $apiKey = 'dDibXS2dtLrg62lyv9WhDGSzZwn3MIjF';
        $serverId = 'n6pq24fw';

        // $mailosaur = new MailosaurClient($apiKey);

        // $criteria = new SearchCriteria();
        // $criteria->sentTo = 'anything@n6pq24fw.mailosaur.net';

        // $email = $mailosaur->->get($serverId, $criteria);

        // print('Subject: ' . $email->subject);
        $mailosaur = new MailosaurClient('dDibXS2dtLrg62lyv9WhDGSzZwn3MIjF');

        $mailbox = 'example-mailbox@mailosaur.io';

        // Pobierz najnowszą wiadomość z danego adresu e-mail
        $criteria = new SearchCriteria();
        $criteria->sentTo = 'anything@n6pq24fw.mailosaur.net';

        $email = $mailosaur->messages->get($serverId, $criteria);

        // Wyświetl treść wiadomości
        echo $message->html;
        print('Subject: ' . $email->subject);
    }
}
