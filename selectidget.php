<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods=GET');
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : "";
    $query = mysqli_query($connect, "select * from student where id=$id");
    $item = mysqli_fetch_assoc($query);
    if (!empty($item)) {
        http_response_code(200);
        echo json_encode([
            "status" => 1,
            "data" => $item
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "status" => 0,
            "message" => 'not found'
        ]);
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "status" => 0,
        "message" => "unable access"
    ));
}
