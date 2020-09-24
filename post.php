<?php
  $input = json_decode(file_get_contents("php://input"), true);
  $_POST=$input;
header('content-type: application/json; charset=utf-8');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

echo '<pre>';
var_dump($input,$_SERVER['REMOTE_ADDR'],$_POST);