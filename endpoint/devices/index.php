<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$device = new \App\Models\Device();
echo json_encode($device->all(' order by `isAvailable` DESC,id DESC'));
