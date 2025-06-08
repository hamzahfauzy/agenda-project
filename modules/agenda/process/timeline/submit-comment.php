<?php

use Core\Database;
use Core\Request;
use Core\Response;

$db   = new Database;

if(Request::isMethod('POST') && auth()->id)
{
    $user = auth();
    $post = $db->insert('comments',[
        'post_id' => $_POST['post_id'],
        'user_id' => $user->id,
        'content' => $_POST['content'],
        'status' => 'Publish' // $_POST['status'],
    ]);

    return Response::json([], 'success');
}

return Response::json([], 'fail', 400);