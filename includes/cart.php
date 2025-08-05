<?php
session_start();
include "db.php";

$user_id = $_SESSION['user']['id'] ?? 0;

if (!$user_id) {
    header("Location: ../login.php");
    exit();
}

// ADD TO CART
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $check = $conn->query("SELECT * FROM cart WHERE user_id=$user_id AND product_id=$product_id");

    if ($check->num_rows > 0) {
        $conn->query("UPDATE cart SET quantity = quantity + $quantity WHERE user_id=$user_id AND product_id=$product_id");
    } else {
        $conn->query("INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)");
    }
    header("Location: ../cart/mycart.php");
    exit();
}

// REMOVE ITEM
if (isset($_GET['remove'])) {
    $cart_id = $_GET['remove'];
    $conn->query("DELETE FROM cart WHERE id=$cart_id AND user_id=$user_id");
    header("Location: ../cart/mycart.php");
    exit();
}

// UPDATE QUANTITY
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $cart_id => $qty) {
        $conn->query("UPDATE cart SET quantity = $qty WHERE id = $cart_id AND user_id = $user_id");
    }
    header("Location: ../cart/mycart.php");
    exit();
}
