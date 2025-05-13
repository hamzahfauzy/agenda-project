<?php

use Core\Database;
use Core\Page;

// init table fields
$tableName  = 'ag_surat';
$id         = $_GET['id'];
$table      = tableFields($tableName);
$fields     = $table->getFields();
$module     = $table->getModule();
$title      = _ucwords(__("$module.label.$tableName"));
$error_msg  = get_flash_msg('error');
$success_msg  = get_flash_msg('success');
$old        = get_flash_msg('old');

$db = new Database;
$db->query = "SELECT ag_surat.*, creator.name creator_name FROM ag_surat LEFT JOIN users creator ON creator.id = ag_surat.created_by WHERE ag_surat.id = $id";
$data = $db->exec('single');

$data->flow = $db->all('ag_surat_flow', [
    'surat_id' => $id
]);

$db->query = "SELECT ag_catatan_surat.created_at, ag_catatan_surat.deskripsi, ag_pejabat.nama FROM ag_catatan_surat LEFT JOIN ag_pejabat ON ag_pejabat.user_id = ag_catatan_surat.created_by  WHERE surat_id=$id";
$data->notes = $db->exec('all');

$data->take_action = $db->exists('ag_surat_flow', [
    'created_by' => auth()->id,
    'surat_id' => $id,
]) || $db->exists('ag_surat_flow', [
    'updated_by' => auth()->id,
    'surat_id' => $id,
]);

if(hasRole(auth()->id, 'Ajudan'))
{
    $data->take_action = $db->exists('ag_kegiatan', [
        'surat_id' => $data->id,
        'instruksi' => ['IS', NULL]
    ]);
}

$surat = $db->single('ag_surat', ['id' => $id]);
$receivers = forwardReceivers($surat);


// page section
Page::setActive("$module.$tableName");
Page::setTitle($title);
Page::setModuleName($title);

Page::pushHead('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />');
Page::pushHead('<script src="https://cdn.tiny.cloud/1/rsb9a1wqmvtlmij61ssaqj3ttq18xdwmyt7jg23sg1ion6kn/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>');
Page::pushHead('<style>.select2,.select2-selection{height:38px!important;} .select2-container--default .select2-selection--single .select2-selection__rendered{line-height:38px!important;}.select2-selection__arrow{height:34px!important;}</style>');
Page::pushFoot('<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>');
Page::pushFoot("<script>$('.select2insidemodal').select2({dropdownParent: $('#itemModal .modal-body')});</script>");
Page::pushFoot("<script>$('.select2insidemodal2').select2({dropdownParent: $('#forwardModal .modal-body')});</script>");
Page::pushFoot("<script>$('.select2insidemodal3').select2({dropdownParent: $('#attendModal .modal-body')});</script>");

return view('agenda/views/surat/view', compact('fields', 'tableName', 'data', 'receivers', 'error_msg', 'success_msg', 'old'));