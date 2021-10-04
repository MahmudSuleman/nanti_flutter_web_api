<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
if(isset($_POST['name'])){
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $serialNumber = $_POST['serialNumber'] ?? '';
    $model = $_POST['model'] ?? '';
    $manufacturer = $_POST['manufacturer'] ?? '';
    $device = new \App\Models\Device();
    echo $device->update($id,['name', 'manufacturer', 'serialNumber', 'model'], [$name, $manufacturer,$serialNumber,$model]);
}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
