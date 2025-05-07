<?php

use Core\Database;
use Core\Page;
use Core\Request;
use Modules\Default\Libraries\Sdk\Media;

if(Request::isMethod('POST'))
{
    $file = Media::singleUpload($_FILES['foto']);
    
    $db = new Database;
    if(auth()->profile)
    {
        $db->update('profile', [
            'pic' => $file->name
        ], [
            'user_id' => $file->created_by
        ]);
    }
    else
    {
        $db->insert('profile', [
            'pic' => $file->name,
            'user_id' => $file->created_by
        ]);
    }

    set_flash_msg(['success'=>"Foto berhasil di update"]);

    header('location:'.routeTo('default/profile'));
    die();
}