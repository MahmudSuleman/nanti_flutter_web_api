<?php
include_once '../init.php';

if(isset($_POST['name'])){
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $company = new \App\models\Company();


        echo $company->store(['name', 'type', 'contact'], [$name, $type,$contact]);

}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
