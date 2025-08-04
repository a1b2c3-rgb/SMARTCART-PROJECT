<?php
include "includes/db.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: dashboard/" . $user['role'] . ".php");
    } else {
        echo "Invalid credentials";
    }
}
?>
<form method="post">
    <input name="email" type="email" required>
    <input name="password" type="password" required>
    <button>Login</button>
</form>
