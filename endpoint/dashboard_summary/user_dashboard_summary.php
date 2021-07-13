<?php

use App\Models\Dispatch;
use App\Models\Maintenance;

include_once '../init.php';

if(isGet()){
    $id = trim($_GET['id']);

    $maintenance = (new Maintenance())->all(" where companyId = $id");
    $dispatches = (new Dispatch())->all(" where companyId = $id");
    $resource = json_encode(['success' => true,
        'data' => [
            'maintenances' => count($maintenance),
            'dispatches' => count($dispatches) ]]);
    echo $resource;
}else{
    echo isGetError();
}

