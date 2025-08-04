<?php
session_start();
function isLoggedIn() {
    return isset($_SESSION['user']);
}
function isAdmin() {
    return $_SESSION['user']['role'] === 'admin';
}
function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header("Location: ../login.php");
        exit;
    }
}
?>
