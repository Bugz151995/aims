<?php 

namespace App\Models;

use CodeIgniter\Model;

class ForumModel extends Model {
    protected $table      = 'forum_tbl';
    protected $primaryKey = 'forum_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'topic', 'user_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getTopics()
    {
        return $this->join('user_tbl', 'user_tbl.user_id = forum_tbl.user_id')->findAll();
    }
}