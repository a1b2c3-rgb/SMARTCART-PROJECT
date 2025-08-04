<?php include "../includes/db.php"; $products = $conn->query("SELECT * FROM products"); ?>
<ul>
<?php while($p = $products->fetch_assoc()): ?>
    <li>
        <?= $p['name'] ?> - Stock: <?= $p['stock'] ?> - $<?= $p['price'] ?>
        <a href="../cart/add.php?id=<?= $p['id'] ?>">Add to Cart</a>
        <?php if (isAdmin()): ?>
            <a href="edit.php?id=<?= $p['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $p['id'] ?>">Delete</a>
        <?php endif; ?>
    </li>
<?php endwhile; ?>
</ul>
