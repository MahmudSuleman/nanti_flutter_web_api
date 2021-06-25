<?php
include_once __DIR__.'/../vendor/autoload.php';

function isPost(){
    return $_SERVER["REQUEST_METHOD"] == "POST";
}

function isPostError() :string
{
    return json_encode(['success'=> false, 'message'=>'Invalid request type, this route only supports POST requests']);
}
