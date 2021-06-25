<?php
include_once '../init.php';

$maintenance = new \App\models\Maintenance();
echo $maintenance->raw();
