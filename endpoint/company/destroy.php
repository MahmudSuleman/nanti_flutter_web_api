<?php
include_once  '../init.php';
if(isset($_POST['id'])){
    $id = trim($_POST['id']) ?? 0;
    $company = new \App\models\Company();
    echo $company->destroy($id);
}else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using GET with id param']);
}
