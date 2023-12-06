<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonCompanyModel extends Model
{
    protected $table = 'person_company';
    protected $primaryKey = ['person_id', 'company_id'];
    protected $allowedFields = ['position', 'departament_id'];
    protected $useAutoIncrement = false;
}
