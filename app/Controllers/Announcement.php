<?php

namespace App\Controllers;

use \App\Models\AnnouncementModel;

class Announcement extends BaseController
{
    protected $helpers = ['form'];

    public function save()
    {
        $ancmt = model(AnnouncementModel::class);

        if ($this->validate(['caption' => 'required'])) {
            $caption = ['caption' => $this->request->getPost('caption')];
            $announcement_id = ['announcement_id' => $this->request->getPost('announcement_id')];
            
            if(isset($announcement_id)) {
                $ancmt->save(array_merge($caption, $announcement_id));
            } else {
                $ancmt->save($caption);
            }

            return redirect()->to('/announcements');
        }
            
        return redirect()->to('/announcements')->with('validation', $this->validator);
    }

    public function delete()
    {
        $ancmt = model(AnnouncementModel::class);

        $ancmt->delete($this->request->getPost('announcement_id'));

        return redirect()->to('/announcements');
    }
}