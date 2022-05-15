<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods=GET');
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = mysqli_query($connect, "select * from student");
    $data = [];
    foreach ($query as $item) {
        array_push($data, [
            "id" => $item['id'],
            "firstname" => $item['firstname'],
            "lastname" => $item['lastname'],
            "fathername" => $item['fathername'],
            "age" => $item['age'],
            "email" => $item['email'],
            "address" => $item['address']
        ]);
    }
    http_response_code(200);
    echo json_encode($data);
} else {
    http_response_code(500);
    echo json_encode(array(
        "status" => 0,
        "message" => "unable access"
    ));
}