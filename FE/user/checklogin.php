<?php
require "connectDB.php";

header('Content-Type: application/json');


$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$response = array();

if (isset($input["info"]) && !empty($input["info"])) {

    $info = $input["info"];


    if ($info == $_COOKIE['info']) {
        // Đăng nhập thành công
        $response["success"] = true;
        $response["message"] = "Đăng nhập thành công!";


        $username = getUsernameFromCookie($info);
        $userData = getUserDataFromDatabase($username);
        $response["user"] = $userData;
    } else {

        $response["success"] = false;
        $response["message"] = "Thông tin đăng nhập không chính xác!";
    }
} else {

    $response["success"] = false;
    $response["message"] = "Thiếu thông tin đăng nhập!";
}


echo json_encode($response);


function getUserDataFromDatabase($username)
{
    global $conn;


    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";


    $stmt = $conn->prepare($query);


    $stmt->bind_param("s", $username);
    $stmt->execute();


    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user;
    } else {

        return null;
    }


    $stmt->close();
}

// Hàm để lấy username từ cookie
function getUsernameFromCookie($cookieInfo)
{

    $decodedInfo = json_decode(base64_decode($cookieInfo), true);


    if (isset($decodedInfo['username'])) {
        return $decodedInfo['username'];
    } else {
        return null;
    }
}
?>