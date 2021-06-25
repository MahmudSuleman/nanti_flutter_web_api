<?php
include_once '../init.php';
$user = new \App\models\Auth();
if (isPost()){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    echo $user->login($username,$password);
}else{
    echo isPostError();
}
//echo password_hash('1234', PASSWORD_DEFAULT);
