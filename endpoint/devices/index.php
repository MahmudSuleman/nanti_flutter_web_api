<?php
include_once '../init.php';

$device = new \App\Models\Device();
echo $device->all(' order by isAvailable desc');
