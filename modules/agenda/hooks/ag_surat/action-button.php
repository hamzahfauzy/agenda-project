<?php

$user = auth();

$button = '';

if(is_allowed(parsePath(routeTo('agenda/surat/view')), $user->id))
{
    $button .= '<a href="'.routeTo('agenda/surat/view', ['id' => $data->id]).'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lihat<a> ';
}

return $button;