<?php
include_once __DIR__.'/vendor/autoload.php';
$company = new \App\models\Company();
var_dump($company->store(['name', 'type', 'contact'],['name', 'type', 'contact']));
