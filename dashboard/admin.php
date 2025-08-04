<?php include "../includes/auth.php"; redirectIfNotLoggedIn(); if (!isAdmin()) exit("Unauthorized"); ?>
<h2>Admin Dashboard</h2>
<a href="../products/add.php">Add Product</a>
<?php include "../products/view_all.php"; ?>
<a href="../logout.php">Logout</a>
