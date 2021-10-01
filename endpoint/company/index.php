<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$company = new \App\Models\Company();
echo json_encode($company->all());
