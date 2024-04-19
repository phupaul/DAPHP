<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];
    $_SESSION["cart"][$product_id] = isset($_SESSION["cart"][$product_id]) ? $_SESSION["cart"][$product_id] + 1 : 1;
    echo "Product added to cart successfully!";
} else {
    http_response_code(400);
    echo "Invalid request!";
}
?>
