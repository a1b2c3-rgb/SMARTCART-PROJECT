<?php
include "../includes/db.php";
$id = $_GET['id'];

$conn->query("DELETE FROM products WHERE id = $id");

echo "<script>alert('Product deleted successfully!'); window.location='admin.php';</script>";
?>
