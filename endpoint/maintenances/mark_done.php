<?php
include_once '../init.php';
if(isPost()){
    $id = $_POST['id'] ?? 0;

    $maintenance = new \App\models\Maintenance();
    echo $maintenance->markDone($id);
}else{
    echo isPostError();
}
