<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$clientTyoe = new \App\Models\ClientType();
echo json_encode($clientTyoe->all());