<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
if(isPost()){
    $id = $_POST['id'] ?? 0;

    $maintenance = new \App\Models\Maintenance();
    echo $maintenance->markDone($id);
}else{
    echo isPostError();
}
