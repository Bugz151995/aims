<?php 

namespace App\Models;

use CodeIgniter\Model;

class ForumCommentModel extends Model {
    protected $table      = 'forum_comment_tbl';
    protected $primaryKey = 'forum_comment_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'comment', 'forum_id', 'user_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getComments($slug = false)
    {
        return $this->join('forum_tbl', 'forum_comment_tbl.forum_id = forum_tbl.forum_id', 'left')->join('user_tbl', 'user_tbl.user_id = forum_comment_tbl.user_id', 'left')->where('forum_comment_tbl.forum_id', $slug)->findAll();
    }
}