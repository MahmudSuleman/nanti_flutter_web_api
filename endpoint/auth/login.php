<?php

use App\Models\Auth;

include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$user = new Auth();
if (isPost()){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    echo $user->login($username,$password);
}else{
    echo isPostError();
}
//echo password_hash('1234', PASSWORD_DEFAULT);
