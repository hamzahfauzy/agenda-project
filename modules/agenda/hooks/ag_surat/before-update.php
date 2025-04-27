<?php

use Core\Storage;

$file = $_FILES['file_url'];
$data['file_url'] = Storage::upload($file);