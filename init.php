<?php
include_once __DIR__.'/vendor/autoload.php';
$company = new \App\models\Company();
echo json_encode($company->store(['name', 'type', 'contact'],['name', 'type', 'contact']));
