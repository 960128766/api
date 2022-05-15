<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods=POST');
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = json_decode(file_get_contents("php://input"));
    if (!empty($params->firstname) && !empty($params->lastname) && !empty($params->fathername) && !empty($params->age)
        && !empty($params->email) && !empty($params->address)) {
        http_response_code(200);
        mysqli_query($connect, "insert into student(firstname,lastname,fathername,age,email,address) 
values('$params->firstname','$params->lastname','$params->fathername','$params->age',
       '$params->email','$params->address')");
        echo json_encode(array(
            "status" => 1,
            "message" => "ok, do create in the database"
        ));
    } else {
        http_response_code(400);
        echo json_encode(array(
            "status" => 0,
            "message" => "please send all parameters in the page"
        ));
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "status" => 0,
        "message" => "unable access"
    ));
}