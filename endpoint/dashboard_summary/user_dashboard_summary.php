<?php
include_once '../init.php';

if(isGet()){
    $id = trim($_GET['id']);

//    $devices = (new \App\models\Device())->all('', " where companyId = $id");

    $maintenance = (new \App\models\Maintenance())->all('', " where companyId = $id");

//    $companies = (new \App\models\User())->all('', " where companyId = $id");

    $dispatches = (new \App\Models\Dispatch())->all('', " where companyId = $id");

    $resource = json_encode(['success' => true,
        'data' => [
//            'devices' => count(json_decode($devices)),
            'maintenances' => count(json_decode($maintenance)),
//            'companies' => count(json_decode($companies)),
            'dispatches' => count(json_decode($dispatches)) ]]);


    echo $resource;
}else{
    echo isGetError();
}

