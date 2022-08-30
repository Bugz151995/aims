<?php 

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model {
    protected $table      = 'announcement_tbl';
    protected $primaryKey = 'announcement_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'caption'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public function getAnnouncements($slug = false)
    {
        if ($slug !== false) 
            return $this->find($slug);

        return $this->findAll();
    }
}