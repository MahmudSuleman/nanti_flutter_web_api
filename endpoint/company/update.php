<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
if(isset($_POST['name'])){
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $company = new \App\Models\Company();
    echo $company->update($id,['name', 'contact', 'type'], [$name, $contact,$type]);
}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
