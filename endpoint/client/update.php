<?php
include_once '../init.php';
header('Access-Control-Allow-Origin: *');
if(isset($_POST['name'])){
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $type = $_POST['client_type_id'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $company = new \App\Models\Client();
    echo $company->update($id,['name', 'contact', 'client_type_id'], [$name, $contact,$type]);
}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}