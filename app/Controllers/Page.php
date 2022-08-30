<?php

namespace App\Controllers;

use \App\Models\AccountModel;
use \App\Models\ForumModel;
use \App\Models\AnnouncementModel;
use \App\Models\ForumCommentModel;

class Page extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('login');
    }

    public function showPage($page_name, $slug = false)
    {
        session();
        $uri = service('uri');
        $acct = model(AccountModel::class);
        $ancmt = model(AnnouncementModel::class);
        $frm = model(ForumModel::class);
        $frm_c = model(ForumCommentModel::class);

        $page_data = ['page' => $page_name];
        $uri_data = ['path' => $uri->getPath()];
        $acct_data = ['users' => $acct->getUsers()];
        $ancmt_data = ['announcements' => $ancmt->getAnnouncements()];
        $frm_data = ['topics' => $frm->getTopics()];

        switch ($page_name) {
            case 'dashboard':
                return view($page_name, array_merge($page_data, $uri_data));
                break;

            case 'users':
                if ($slug !== false)
                    return view($page_name, array_merge($page_data, $uri_data, $acct_data, ['sel_data' => $acct->getUsers($slug)]));

                return view($page_name, array_merge($page_data, $uri_data, $acct_data));
                break;

            case 'announcements':
                if ($slug !== false)
                    return view($page_name, array_merge($page_data, $uri_data, $ancmt_data, ['sel_data' => $ancmt->getAnnouncements($slug)]));

                return view($page_name, array_merge($page_data, $uri_data, $ancmt_data));
                break;

            case 'forum':
                if ($slug !== false)
                    return view($page_name, array_merge($page_data, $uri_data, $frm_data, ['sel_data' => $frm->getTopics()]));

                return view($page_name, array_merge($page_data, $uri_data, $frm_data));
                break;

            case 'forum_comments':
                return view($page_name, array_merge($page_data, $uri_data,  ['comments' => $frm_c->getComments($slug)]));
                break;

            default:
                return view('login');
                break;
        }
    }
}
