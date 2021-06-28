<?php
include_once '../init.php';
$maintenance = new \App\models\Maintenance();
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

