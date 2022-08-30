<?php 

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model {
    protected $table      = 'account_tbl';
    protected $primaryKey = 'account_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'username', 'password', 'user_id', 'admin_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getUsers($slug = false)
    {
        if($slug !== false)
            return $this->join('user_tbl', 'user_tbl.user_id = account_tbl.user_id')->join('occupation_tbl', 'occupation_tbl.occupation_id = user_tbl.occupation_id', 'left')->find($slug);

        return $this->join('user_tbl', 'user_tbl.user_id = account_tbl.user_id')->join('occupation_tbl', 'occupation_tbl.occupation_id = user_tbl.occupation_id', 'left')->findAll();
    }
}