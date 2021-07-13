<?php

use App\Models\Maintenance;

include_once '../init.php';

$maintenance = new Maintenance();
echo json_encode($maintenance->raw());
