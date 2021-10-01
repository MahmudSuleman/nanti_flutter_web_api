<?php

use App\Models\Dispatch;
use App\Models\Maintenance;
use App\Models\User;
header('Access-Control-Allow-Origin: *');
include_once '../init.php';
;
if(isGet()){
    $id = trim($_GET['id']);

    $maintenance = (new Maintenance())->all(" where companyId = $id");
    $dispatches = (new Dispatch())->all(" where companyId = $id");
    $users = (new User())->all(" where companyId = $id");
    $resource = json_encode(['success' => true,
        'data' => [
            'maintenances' => count($maintenance),
            'dispatches' => count($dispatches),
            'users' => count($users) ]]);
    echo $resource;
}else{
    echo isGetError();
}

