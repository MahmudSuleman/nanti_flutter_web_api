<?php
include_once '../init.php';

$company = new \App\Models\Company();
echo $company->all();
