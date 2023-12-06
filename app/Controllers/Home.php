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
        $trainingModel = new  \App\Models\TrainingCategoryModel();
        $training_categories = $trainingModel->findAll();
        $combinedTrainingCategories = [];

        foreach ($training_categories as $category) {
            $combinedTrainingCategories[] = $category['name'];
        }

        $data['categoriesTraining'] = $combinedTrainingCategories;

        $skillModel = new  \App\Models\SkillModel();
        $skill_categories = $skillModel->findAll();
        $combinedSkillCategories = [];

        foreach ($skill_categories as $category) {
            $combinedSkillCategories[] = $category['name'];
        }

        $data['categoriesSkill'] = $combinedSkillCategories;


        $companyModel = new  \App\Models\CompanyModel();
        $company_categories = $companyModel->findAll();
        $combinedCompanyCategories = [];

        foreach ($company_categories as $category) {
            $combinedCompanyCategories[] = $category['name'];
        }

        $data['categoriesCompany'] = $combinedSkillCategories;



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
