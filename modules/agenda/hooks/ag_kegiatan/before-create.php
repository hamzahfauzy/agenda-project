<?php

$_POST['pendamping'] = $data['pendamping'];

unset($data['pendamping']);

$data['instruksi'] = implode(',', $data['instruksi']);

if(empty($data['pejabat_id']))
{
    unset($data['pejabat_id']);
}