<?php
include_once '../init.php';

if(isset($_POST['name'])){
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $company = new \App\models\Company();
    echo $company->update(['name', 'contact', 'type'], [$name, $contact,$type], $id);
}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
