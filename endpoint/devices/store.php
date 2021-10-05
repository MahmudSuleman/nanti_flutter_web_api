<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
if(isset($_POST['name'])){
    $name = $_POST['name'] ?? '';
    $serialNumber = $_POST['serialNumber'] ?? '';
    $manufacturer = $_POST['manufacturer'] ?? '';
    $model = $_POST['model'] ?? '';
    $device = new \App\Models\Device();
//    check if serial number is not already available
    if ($device->serialNumberExist($serialNumber)){

//        todo: data could be updated instead if the serial number already exist
        echo json_encode(['success'=>'false', 'message' => 'Device with same serial number already exist']);
    }else{
        echo json_encode($device->store(['name', 'manufacturer_id', 'serialNumber', 'model'], [$name, $manufacturer,$serialNumber,$model]));
    }

}
else{
    echo json_encode(['success' => 'false', 'message'=> 'unsupported request type, try using POST']);
}