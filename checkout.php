<?php
session_start();
include "includes/db.php";

$user_id = $_SESSION['user']['id'];
$conn->query("DELETE FROM cart WHERE user_id = $user_id");

// [Optional: Insert order into an 'orders' table, trigger email]
echo "<script>alert('Checkout complete! Your order has been placed.');window.location='dashboard/user.php';</script>";
