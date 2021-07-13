<?php

use App\Models\Device;

include_once '../init.php';
if(isset($_GET['id'])){
    $id = $_GET['id'] ?? 0;
    $device = new Device();
    echo json_encode($device->findById($id));
}
