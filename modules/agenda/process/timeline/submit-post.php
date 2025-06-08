<?php

use Core\Database;
use Core\Request;
use Core\Response;

$db   = new Database;

if(Request::isMethod('POST') && auth()->id)
{
    $user = auth();
    $post = $db->insert('posts',[
        'user_id' => $user->id,
        'content' => $_POST['content'],
        'status' => 'Publish' // $_POST['status'],
    ]);

    if(isset($_FILES['files']) && $_FILES['files']["name"][0] != "")
    {
        $files = do_upload($_FILES['files'],'uploads',false, true);
        foreach($files as $file)
        {
            $db->insert('post_files',[
                'post_id' => $post->id,
                'file_url' => $file
            ]);
        }
    }

    return Response::json([], 'success');
}
return Response::json([], 'fail', 400);