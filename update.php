<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods=POST');
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = json_decode(file_get_contents("php://input"));
    if (!empty($params->firstname) && !empty($params->lastname) && !empty($params->fathername) && !empty($params->age)
        && !empty($params->email) && !empty($params->address)) {
        mysqli_query($connect, "update student set firstname='$params->firstname',lastname='$params->lastname',
                   fathername='$params->fathername',age='$params->age',email='$params->email',address='$params->address' where 
                   id=$params->id ");
        http_response_code(200);
        echo json_encode([
                "status" => 1,
                "message" => "ok, do update in the database"
        ]);
    } else {
        http_response_code(400);
        echo json_encode(array(
            "status" => 0,
            "message" => "bad request or failed"
        ));
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "status" => 0,
        "message" => "unable access"
    ));

}
