<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonSkillModel extends Model
{
    protected $table = 'person_skil';
    protected $primaryKey = ['person_id', 'skill_id'];
    protected $useAutoIncrement = false;
}
