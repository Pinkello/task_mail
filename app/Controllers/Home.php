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
        $data['categoriesTraining'] = $this->getTrainingCategories();
        $data['categoriesSkill'] = $this->getSkillsCategories();
        $data['categoriesCompany'] = $this->getCompaniesCategories();
        $data['categoriesDepartment'] = $this->getDepartmentCategories();

        $data['title'] = lang('Text.homepage_title');
        echo view('templates/header', $data);
        echo view('home/home.php', $data);
        echo view('templates/footer');
    }

    public function sendEmail()
    {
        return redirect()->to(base_url())->with('success_message', 'Maile zostały wysłane pomyślnie.');

        $content = $this->request->getPost('content');
        $subject = $this->request->getPost('subject');

        $checkbox_all = $this->request->getPost('flexSwitchCheckDefault');
        //if checkbox all -> send to all
        if ($checkbox_all == "on") {
            $personModel = new  \App\Models\PersonModel();
            $people = $personModel->findAll();

            foreach ($people as $person) {
                $this->sendEmailFunc($content, $subject, $person['email'], $person['name'] . " " . $person['surname']);
            }
        } else {
            //checkboxes who to sent
            $checkbox_skills = $this->request->getPost('skills');
            $checkbox_trainings = $this->request->getPost('trainings');
            $checkbox_companies = $this->request->getPost('companies');

            //table to hold who already got email so we dont send more than one
            $already_sent_id = [];

            //check which skills are checked
            if ($checkbox_skills) {
                $skills_categories =  $this->getSkillsCategories();

                foreach ($skills_categories as $skill) {
                    $checkbox_skill = $this->request->getPost($this->removeSpace($skill));
                    if ($checkbox_skill) {
                        $skillModel = new  \App\Models\SkillModel();
                        $id = $skillModel->select('skill_id')->where('name', $skill)->first();

                        $personSkillModel = new  \App\Models\PersonSkillModel();

                        $result = $personSkillModel->where('skill_id', $id['skill_id'])->findAll();
                        foreach ($result as $row) {

                            $personModel = new \App\Models\PersonModel();
                            $person = $personModel->where('person_id',  $row['person_id'])->first();

                            if (in_array($person['person_id'], $already_sent_id)) {
                            } else {
                                $already_sent_id[] =  $person['person_id'];
                                $this->sendEmailFunc($content, $subject, $person['email'], $person['name'] . " " . $person['surname']);
                            }
                        }
                    }
                }
            }
            //same logic for trainings
            if ($checkbox_trainings) {

                $trainings_categories =  $this->getTrainingCategories();

                foreach ($trainings_categories as $training) {
                    $checkbox_training = $this->request->getPost($this->removeSpace($training));
                    if ($checkbox_training) {
                        $trainingCategoryModel = new  \App\Models\TrainingCategoryModel();
                        $id = $trainingCategoryModel->select('category_id')->where('name', $training)->first();

                        $personTrainingModel = new  \App\Models\PersonTrainingModel();

                        $result = $personTrainingModel->where('category_id', $id['category_id'])->findAll();
                        foreach ($result as $row) {
                            $personModel = new \App\Models\PersonModel();
                            $person = $personModel->where('person_id',  $row['person_id'])->first();

                            if (in_array($person['person_id'], $already_sent_id)) {
                            } else {
                                $already_sent_id[] =  $person['person_id'];
                                $this->sendEmailFunc($content, $subject, $person['email'], $person['name'] . " " . $person['surname']);
                            }
                        }
                    }
                }
            }
            //same logic for companies but check for department
            $departmentsCheck = [];
            if ($checkbox_companies) {
                $companies_categories =  $this->getCompaniesCategories();
                $departments_categories =  $this->getDepartmentCategories();
                foreach ($companies_categories as $company) {
                    $checkbox_companies = $this->request->getPost($this->removeSpace($company));
                    if ($checkbox_companies) {
                        $companyModel = new  \App\Models\CompanyModel();
                        $id = $companyModel->select('company_id')->where('name', $company)->first();

                        $personCompanyModel = new  \App\Models\PersonCompanyModel();
                        $result = $personCompanyModel->where('company_id', $id['company_id'])->findAll();
                        foreach ($result as $row) {

                            //additional check for department
                            foreach ($departments_categories as $department) {
                                $checkbox_departments = $this->request->getPost($this->removeSpace($department));
                                if ($checkbox_departments) {
                                    $departmendModel = new  \App\Models\DepartmentModel();
                                    $id = $departmendModel->select('department_id')->where('name', $department)->first();

                                    if ($row['department_id'] == $id['department_id']) {
                                        $personModel = new \App\Models\PersonModel();
                                        $person = $personModel->where('person_id',  $row['person_id'])->first();

                                        if (in_array($person['person_id'], $already_sent_id)) {
                                        } else {
                                            $already_sent_id[] =  $person['person_id'];
                                            $this->sendEmailFunc($content, $subject, $person['email'], $person['name'] . " " . $person['surname']);
                                        }
                                    } else {
                                        $departmentsCheck[] = $row['department_id'];
                                    }
                                }
                            }
                            //check if need to send cause no departments checked
                            $personModel = new \App\Models\PersonModel();
                            $person = $personModel->where('person_id',  $row['person_id'])->first();

                            if ((in_array($person['person_id'], $already_sent_id)) || in_array($row['department_id'], $departmentsCheck)) {
                            } else {
                                $already_sent_id[] =  $person['person_id'];
                                $this->sendEmailFunc($content, $subject, $person['email'], $person['name'] . " " . $person['surname']);
                            }
                        }
                    }
                }
            }
        }
        // return redirect()->to(base_url());
    }

    private function sendEmailFunc($content, $subject, $address, $receiver)
    {
        $mail = new PHPMailer(true);
        $name = $_SESSION['person_info']['name'];
        $surname = $_SESSION['person_info']['surname'];
        $email = $_SESSION['person_info']['email'];

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['MAIL_USERNAME'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = "ssl";
            $mail->Port       = 465;

            $mail->setFrom($email, $name . " " . $surname);
            $mail->addAddress($address, $receiver);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->AltBody = $content;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent.";
            return redirect()->to('/')->with('fail', lang('Text.email_fail'));
        }
    }

    private function getTrainingCategories()
    {
        $trainingModel = new  \App\Models\TrainingCategoryModel();
        $training_categories = $trainingModel->findAll();
        $combinedTrainingCategories = [];

        foreach ($training_categories as $training) {
            $combinedTrainingCategories[] = $training['name'];
        }

        return $combinedTrainingCategories;
    }

    private function getSkillsCategories()
    {
        $skillModel = new  \App\Models\SkillModel();
        $skill_categories = $skillModel->findAll();
        $combinedSkillCategories = [];

        foreach ($skill_categories as $category) {
            $combinedSkillCategories[] = $category['name'];
        }
        return $combinedSkillCategories;
    }

    private function getCompaniesCategories()
    {
        $companyModel = new  \App\Models\CompanyModel();
        $company_categories = $companyModel->findAll();
        $combinedCompanyCategories = [];

        foreach ($company_categories as $category) {
            $combinedCompanyCategories[] = $category['name'];
        }

        return $combinedCompanyCategories;
    }

    private function getDepartmentCategories()
    {
        $departmendmodel = new  \App\Models\DepartmentModel();
        $department_categories = $departmendmodel->findAll();
        $combineddepartmentCategories = [];

        foreach ($department_categories as $category) {
            $combineddepartmentCategories[] = $category['name'];
        }

        return $combineddepartmentCategories;
    }

    private function removeSpace($category)
    {
        return str_replace(' ', '_', $category);
    }
}
