<?php

namespace App\Models;

use CodeIgniter\Model;

class TrainingCategoryModel extends Model
{
    protected $table = 'training_category';
    protected $primaryKey = "category_id";
    protected $allowedFields = ['name'];
}
