<?php
include_once  '../init.php';
header('Access-Control-Allow-Origin: *');
$dispatch = new \App\Models\Dispatch();
echo json_encode($dispatch->raw());
