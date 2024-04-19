<?php
session_start();

$cart_quantity = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;

echo $cart_quantity;
?>
