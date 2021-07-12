<?php
include_once '../init.php';
if(isset($_GET['id'])){
    $id = $_GET['id'] ?? 0;
    $device = new \App\Models\Device();
    echo $device->findById($id);
}
