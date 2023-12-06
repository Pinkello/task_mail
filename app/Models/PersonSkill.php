<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'person';
    protected $primaryKey = "person_id";
    protected $allowedFields = ['email', 'password', 'name', 'surname', 'phone'];
}
