<?php
include "../includes/auth.php"; include "../includes/db.php"; redirectIfNotLoggedIn();
$id = $_GET['id'];
$conn->query("UPDATE products SET stock = stock - 1 WHERE id=$id AND stock > 0");
header("Location: view.php");
?>
