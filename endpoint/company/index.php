<?php
include_once '../init.php';

$company = new \App\Models\Company();
echo json_encode($company->all());
