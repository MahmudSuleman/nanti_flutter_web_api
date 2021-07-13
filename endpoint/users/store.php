<?php
include '../init.php';
use App\Models\User;

if(isPost()){
    $username = trim($_POST['username']) ?? '';
    $company_id = trim($_POST['company_id']) ?? '';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? '';

    $user = new User();
    $result = $user->store(['username', 'companyId', 'password'], [$username, $company_id, $password]);
//    echo json_encode($_POST);
    echo json_encode($result);
}else{
    echo isPostError();
}
