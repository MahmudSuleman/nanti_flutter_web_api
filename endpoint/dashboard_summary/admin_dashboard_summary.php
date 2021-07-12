<?php
include_once '../init.php';

$devices = (new \App\Models\Device())->all();

$maintenance = (new \App\Models\Maintenance())->all();

$companies = (new \App\Models\User())->all();

$dispatches = (new \App\Models\Dispatch()) -> all();

$resource = json_encode(['success' => true,
    'data' => ['devices' => count(json_decode($devices)),
        'maintenances' => count(json_decode($maintenance)),
        'companies' => count(json_decode($companies)),
        'dispatches' => count(json_decode($dispatches)) ]]);


echo $resource;
