<?php
include_once '../init.php';

if(isset($_POST['name'])){
    $name = $_POST['name'] ?? '';
    $serialNumber = $_POST['serialNumber'] ?? '';
    $manufacturer = $_POST['manufacturer'] ?? '';
    $device = new \App\Models\Device();
//    check if serial number is not already available
    if ($device->serialNumberExist($serialNumber)){

//        todo: data could be updated instead if the serial number already exist
        echo json_encode(['success'=>'false', 'message' => 'Serial number already exist']);
    }else{
        echo $device->store(['name', 'manufacturer', 'serialNumber'], [$name, $manufacturer,$serialNumber]);
    }

}
else{
    echo json_encode(['success' => 'false', 'message'=> 'unsupported request type, try using POST']);
}
