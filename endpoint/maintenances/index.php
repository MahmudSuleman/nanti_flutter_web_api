<?php

use App\Models\Maintenance;

include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$maintenance = new Maintenance();
echo json_encode($maintenance->raw());
