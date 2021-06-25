<?php
include_once  '../init.php';
$dispatch = new \App\Models\Dispatch();
echo ($dispatch->raw());
