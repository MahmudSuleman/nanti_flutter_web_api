<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$manufacturer = new \App\Models\Manufacturer();
echo json_encode($manufacturer->all());
