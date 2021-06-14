<?php
include_once '../init.php';

$device = new \App\models\Device();
echo $device->all();
