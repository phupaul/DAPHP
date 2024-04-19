<?php
session_start();
$response = ['success' => false];

if (isset($_POST['product_id'], $_POST['action'])) {
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    if ($action == 'add') {
        $_SESSION['cart'][$productId]++;
    } elseif ($action == 'remove' && $_SESSION['cart'][$productId] > 1) {
        $_SESSION['cart'][$productId]--;
    } elseif ($action == 'remove') {
        unset($_SESSION['cart'][$productId]);
    }

    $response = [
        'success' => true,
        'newQuantity' => $_SESSION['cart'][$productId] ?? 0,
        'totalItems' => array_sum($_SESSION['cart']), 
        'totalPrice' => calculateTotalPrice() 
    ];
}

echo json_encode($response);
function calculateTotalPrice() {
    $total = 0;
    include '../config/dbconnect.php';

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $quantity) {
            $stmt = $conn->prepare("SELECT price FROM product WHERE product_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $price = $row['price'];

                $total += $price * $quantity;
            }

            $stmt->close();
        }
    }

    return $total;
}
?>
