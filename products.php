<?php include 'header.php'; ?>

<style>
.products-container {
  max-width: 1200px;
  margin: 40px auto 0 auto;
  padding: 0 16px 32px 16px;
}
.products-title {
  text-align: left;
  font-size: 2.2rem;
  margin-bottom: 32px;
  color: #222;
  letter-spacing: 1px;
}
.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 28px;
}
.product-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 16px rgba(0,0,0,0.08);
  padding: 22px 18px 18px 18px;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: box-shadow 0.2s, transform 0.2s;
  position: relative;
}
.product-card:hover {
  box-shadow: 0 6px 24px rgba(0,0,0,0.14);
  transform: translateY(-4px) scale(1.02);
}
.product-card img {
  width: 100%;
  max-width: 160px;
  height: 160px;
  object-fit: contain;
  margin-bottom: 16px;
  border-radius: 6px;
  background: #f7f7f7;
}
.product-card h3 {
  font-size: 1.1rem;
  color: #222;
  margin: 0 0 8px 0;
  text-align: center;
}
.product-card p {
  color: #1a8917;
  font-weight: bold;
  margin: 0 0 14px 0;
  font-size: 1.05rem;
}
.product-card form {
  width: 100%;
  display: flex;
  justify-content: center;
}
.product-card button {
  background: #222;
  color: #fff;
  border: none;
  padding: 10px 28px;
  border-radius: 4px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.2s;
}
.product-card button:hover {
  background: #444;
}
@media (max-width: 600px) {
  .products-title { font-size: 1.3rem; }
  .product-card img { max-width: 100px; height: 100px; }
}
</style>

<?php
$products = [];
for($i=1; $i<=52; $i++){
  $products[$i] = [
    "name" => "Product $i",
    "price" => rand(1000,5000),
    // Cycle images 1-20 for all products
    "image" => "images/product" . (($i-1)%20+1) . ".jpg"
  ];
}
?>

<div class="products-container">
  <h2 class="products-title">Our Products</h2>
  <div class="products-grid">
    <?php foreach($products as $id => $product): ?>
      <div class="product-card">
        <img src="<?= $product['image']; ?>" alt="<?= htmlspecialchars($product['name']); ?>">
        <h3><?= htmlspecialchars($product['name']); ?></h3>
        <p>Rs <?= number_format($product['price']); ?></p>
        <form method="post" action="cart.php">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <button type="submit" name="add">Add to Cart</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include 'footer.php'; ?>
