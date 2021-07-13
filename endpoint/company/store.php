<?php
include_once '../init.php';

if(isset($_POST['name'])){
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $company = new \App\Models\Company();


        $result = $company->store(['name', 'type', 'contact'], [$name, $type,$contact]);
        echo json_encode($result);

}
else{
    echo json_encode(['success' => false, 'message'=> 'unsupported request type, try using POST']);
}
