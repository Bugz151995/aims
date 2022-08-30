<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserCourseModel extends Model {
    protected $table      = 'user_course_tbl';
    protected $primaryKey = 'user_course_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'user_id', 'course_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}