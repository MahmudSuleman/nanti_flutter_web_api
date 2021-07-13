<?php

use App\Models\Device;
use App\Models\Dispatch;

include_once '../init.php';

if(isset($_POST)){
    $deviceId = $_POST['deviceId'] ?? '';
    $companyId = $_POST['companyId'] ?? '';
    $dispatch = new Dispatch();
    $msg =  $dispatch->store(['deviceId', 'companyId'], [$deviceId, $companyId]);
    if($msg){
        echo  (new Device())->update($deviceId, ['isAvailable'], [0]);
    }

}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
