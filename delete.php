<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods=DELETE');
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $param = json_decode(file_get_contents("php://input"));
    if (!empty($param->id)) {
        mysqli_query($connect, "delete from student where id=$param->id");
        http_response_code(200);
        echo json_encode(array(
            "status" => 1,
            "message" => "successfully delete"
        ));
    } else {
        http_response_code(400);
        echo json_encode(array(
            "status" => 0,
            "message" => "not found"
        ));
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "status" => 0,
        "message" => "unable access"
    ));
}