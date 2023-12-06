<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonTrainingModel extends Model
{
    protected $table = 'PersonTraining';
    protected $primaryKey = ['person_id', 'training_id'];
    protected $useAutoIncrement = false;
}
