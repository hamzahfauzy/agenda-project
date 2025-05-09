<?php

$_POST['pendamping'] = $data['pendamping'];

unset($data['pendamping']);

$data['instruksi'] = implode(',', $data['instruksi']);