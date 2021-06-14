<?php
include_once '../init.php';

if(isset($_POST['name'])){
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $serialNumber = $_POST['serialNumber'] ?? '';
    $manufacturer = $_POST['manufacturer'] ?? '';
    $device = new \App\models\Device();
    echo $device->update(['name', 'manufacturer', 'serialNumber'], [$name, $manufacturer,$serialNumber], $id);
}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
