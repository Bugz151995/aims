<?php

namespace App\Controllers;

use \App\Models\ForumModel;

class Forum extends BaseController
{
    protected $helpers = ['form'];

    public function delete()
    {
        $forum = model(ForumModel::class);

        $forum->delete($this->request->getPost('forum_id'));

        return redirect()->to('/forum');
    }
}