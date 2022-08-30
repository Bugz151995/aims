<?php

namespace App\Controllers;

use \App\Models\ForumCommentModel;

class ForumComment extends BaseController
{
    protected $helpers = ['form'];

    public function delete()
    {
        $forum = model(ForumCommentModel::class);

        $forum->delete($this->request->getPost('forum_comment_id'));

        return redirect()->to('/forum');
    }
}