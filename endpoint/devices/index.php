<?php
include_once '../init.php';

$device = new \App\Models\Device();
echo json_encode($device->all(' order by isAvailable desc'));
