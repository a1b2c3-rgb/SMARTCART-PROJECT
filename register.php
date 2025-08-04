<?php
include "includes/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    $conn->query($sql);
    header("Location: login.php");
}
?>
<form method="post">
    <input name="name" required>
    <input name="email" type="email" required>
    <input name="password" type="password" required>
    <select name="role"><option value="user">User</option><option value="admin">Admin</option></select>
    <button>Register</button>
</form>
