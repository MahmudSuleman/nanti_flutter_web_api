<?php

use App\Models\Auth;

include_once '../init.php';
header('Access-Control-Allow-Origin: *');
if (isPost()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $companyId = $_POST['companyId'] ?? 0;
    $userType = $_POST['userType'] ?? 2;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $user = new Auth();
    if ($user->usernameExist($username)){
        echo json_encode(['success'=>false, 'message'=>'Username taken']);
    }else{
        $result = $user->store(['username', 'password', 'userTypeId', 'companyId'], [$username, $password,$userType,$companyId]);
        if ($result)
            echo $result;
        else
            echo json_encode(['success'=>false]);
    }


} else {
    echo json_encode(isPostError());
}

