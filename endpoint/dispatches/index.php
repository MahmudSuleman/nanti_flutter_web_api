<?php
include_once  '../init.php';
$dispatch = new \App\Models\Dispatch();
echo json_encode($dispatch->raw());
