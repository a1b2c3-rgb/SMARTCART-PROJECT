<?php
session_start();
include "includes/db.php";
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';
require 'includes/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$user_id = $_SESSION['user']['id'];
$user_email = $_SESSION['user']['email'];
$user_name = $_SESSION['user']['name'];

// Clear user's cart
$conn->query("DELETE FROM cart WHERE user_id = $user_id");

// Send confirmation email
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your mail server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com';     // Replace with your Gmail address
    $mail->Password = 'your_app_password';        // Replace with Gmail app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('your_email@gmail.com', 'SmartCart Charter');
    $mail->addAddress($user_email, $user_name);   // Send to logged-in user

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Order Confirmation - SmartCart Charter';
    $mail->Body = "Hi $user_name,<br><br>Your order has been placed successfully. Thank you for shopping with us!<br><br>- SmartCart Team";

    $mail->send();

    echo "<script>alert('Checkout complete and confirmation email sent!'); window.location='dashboard/user.php';</script>";
} catch (Exception $e) {
    echo "<script>alert('Checkout complete, but email failed: {$mail->ErrorInfo}'); window.location='dashboard/user.php';</script>";
}
