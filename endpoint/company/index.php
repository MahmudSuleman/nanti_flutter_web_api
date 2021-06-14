<?php
include_once '../init.php';

$company = new \App\models\Company();
echo $company->all();
