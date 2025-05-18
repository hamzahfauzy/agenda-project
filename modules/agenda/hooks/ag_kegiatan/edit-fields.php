<?php

// use Core\Database;

// $db = new Database;
// $pendamping = $db->all('ag_pendamping_kegiatan', [
//     'kegiatan_id' => $_GET['id']
// ]);

// $ids = [];
// foreach($pendamping as $p)
// {
//     $ids[] = $p->pejabat_id;
// }

// $fields['pendamping']['attr']['value'] = $ids;

unset($fields['instruksi']);
unset($fields['deskripsi']);
unset($fields['pendamping']);
unset($fields['pelaksana']);

return $fields;