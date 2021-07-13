<?php
include '../init.php';
$users = new \App\Models\User();

echo json_encode($users->all());
