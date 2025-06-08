<?php

use Core\Database;
use Core\Response;

$table = 'posts';
$conn = conn();
$db   = new Database;
$post_id = $_GET['post_id'];

$comments = $db->all('comments',['post_id'=>$post_id]);
$comments = array_map(function($comment) use ($db){
    $comment->user = $db->single('users',['id' => $comment->user_id]);
    $comment->date = tgl_indo($comment->created_at, true);
    return $comment;
}, $comments);

return Response::json($comments, 'success');