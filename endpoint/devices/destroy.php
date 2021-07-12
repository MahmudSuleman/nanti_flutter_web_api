<?php
include_once  '../init.php';
if(isset($_POST['id'])){
    $id = trim($_POST['id']) ?? 0;
    $device = new \App\Models\Device();
    echo $device->destroy($id);
}else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST with id param']);
}
