<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
$maintenance = new \App\Models\Maintenance();
if (isPost()) {
    $companyId = $_POST['companyId'] ?? '';
    $deviceId = $_POST['deviceId'] ?? '';
    $problemDesc = $_POST['problemDescription'] ?? '';
    $dateSent = date('Y-m-d');

    echo $maintenance->send($deviceId,
        ['companyId',
        'deviceId',
        'problemDescription',
        'dateSent'],
        [$companyId,
        $deviceId,
        $problemDesc,
        $dateSent]);
} else {
    echo isPostError();
}

