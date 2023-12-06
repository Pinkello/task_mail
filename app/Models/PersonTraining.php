<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'PersonTraining';
    protected $primaryKey = ['person_id', 'training_id'];
    protected $useAutoIncrement = false;
}
