<?php include "../includes/auth.php"; redirectIfNotLoggedIn(); ?>
<h2>Welcome, <?= $_SESSION['user']['name'] ?></h2>
<?php include "../products/view_all.php"; ?>
<a href="../cart/view.php">View Cart</a>
<a href="../logout.php">Logout</a>
