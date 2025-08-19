<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<div class="container">
  <h2 class="title">Our Products</h2>
  <div class="grid">
    <?php foreach($products as $id => $product): ?>
      <div class="card">
        <img src="<?= $product['image']; ?>" alt="<?= htmlspecialchars($product['name']); ?>">
        <h3><?= htmlspecialchars($product['name']); ?></h3>
        <p>Rs <?= number_format($product['price']); ?></p>
        <form method="post" action="cart.php">
          <input type="hidden" name="id" value="<?= (int)$id; ?>">
          <button type="submit" name="add">Add to Cart</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include 'footer.php'; ?>
