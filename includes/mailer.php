<?php
function sendConfirmation($to, $subject, $body) {
    $headers = "From: no-reply@smartcart.com";
    mail($to, $subject, $body, $headers); // You can replace with PHPMailer for SMTP
}
?>
