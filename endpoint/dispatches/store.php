<?php

use App\models\Device;
use App\models\Dispatch;

include_once '../init.php';

if(isset($_POST)){
    $deviceId = $_POST['deviceId'] ?? '';
    $companyId = $_POST['companyId'] ?? '';
    $dispatch = new Dispatch();
    $msg =  $dispatch->store(['deviceId', 'companyId'], [$deviceId, $companyId]);
    if($msg){
        echo  (new Device())->update(['isAvailable'], [0], $deviceId);
    }

}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
