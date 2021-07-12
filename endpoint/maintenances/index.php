<?php
include_once '../init.php';

$maintenance = new \App\Models\Maintenance();
echo $maintenance->raw();
