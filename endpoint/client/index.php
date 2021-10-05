<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$company = new \App\Models\Client();
echo json_encode($company->all());