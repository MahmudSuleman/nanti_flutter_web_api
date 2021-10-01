<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$devices = (new \App\Models\Device())->all();

$maintenance = (new \App\Models\Maintenance())->all();

$companies = (new \App\Models\User())->all();

$dispatches = (new \App\Models\Dispatch()) -> all();

$resource = json_encode(['success' => true,
    'data' => ['devices' => count($devices),
        'maintenances' => count($maintenance),
        'companies' => count($companies),
        'dispatches' => count($dispatches) ]]);


echo $resource;
