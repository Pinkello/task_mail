<?php

namespace App\Models;

use CodeIgniter\Model;

class SkillModel extends Model
{
    protected $table = 'skill';
    protected $primaryKey = "skill_id";
    protected $allowedFields = ['name'];
}
