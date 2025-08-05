<?php
include "../includes/db.php";
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    $conn->query("UPDATE products SET name='$name', description='$desc', price=$price, quantity=$qty WHERE id = $id");

    echo "<script>alert('Product updated successfully!'); window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
<h2>Edit Product</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
    Description: <textarea name="description" required><?= $product['description'] ?></textarea><br>
    Price: <input type="number" name="price" value="<?= $product['price'] ?>" required><br>
    Quantity: <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required><br>
    <button type="submit">Update Product</button>
</form>
</body>
</html>
