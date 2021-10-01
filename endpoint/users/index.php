<?php

use App\Models\User;

include '../init.php';
header('Access-Control-Allow-Origin: *');
$users = new User();

echo json_encode($users->all());
