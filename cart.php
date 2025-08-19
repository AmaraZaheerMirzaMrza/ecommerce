<?php
session_start();
if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }

// Add to cart logic
if (isset($_POST['add'])) {
  $id = $_POST['id'];
  if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = 1;
  } else {
    $_SESSION['cart'][$id]++;
  }
}
// Update quantity logic
if (isset($_POST['update']) && isset($_POST['id'])) {
  $id = $_POST['id'];
  $qty = max(1, (int)$_POST['qty']);
  $_SESSION['cart'][$id] = $qty;
}
// Remove item logic
if (isset($_POST['remove']) && isset($_POST['id'])) {
  $id = $_POST['id'];
  unset($_SESSION['cart'][$id]);
}

// Product data (same as products.php, 52 products, cycling images 1-20)
$products = [];
for($i=1; $i<=52; $i++){
  $products[$i] = [
    "name" => "Product $i",
    "price" => rand(1000,5000),
    "image" => "images/product" . (($i-1)%20+1) . ".jpg"
  ];
}
?>
<?php include 'header.php'; ?>

<style>
.cart-container {
  max-width: 900px;
  margin: 40px auto 0 auto;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.08);
  padding: 32px 24px 24px 24px;
}
.cart-title {
  font-size: 2rem;
  margin-bottom: 24px;
  color: #222;
  text-align: center;
}
.cart-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 24px;
}
.cart-table th, .cart-table td {
  padding: 14px 10px;
  text-align: center;
}
.cart-table th {
  background: #f7f7f7;
  color: #222;
  font-weight: 600;
}
.cart-table td {
  border-bottom: 1px solid #eee;
  vertical-align: middle;
}
.cart-table img {
  width: 60px;
  height: 60px;
  object-fit: contain;
  border-radius: 6px;
  background: #f7f7f7;
}
.cart-table input[type="number"] {
  width: 60px;
  padding: 6px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 1rem;
}
.cart-table button, .checkout-btn {
  background: #222;
  color: #fff;
  border: none;
  padding: 8px 18px;
  border-radius: 4px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.2s;
}
.cart-table button:hover, .checkout-btn:hover {
  background: #444;
}
.cart-total {
  text-align: right;
  font-size: 1.2rem;
  font-weight: bold;
  margin-bottom: 18px;
  color: #1a8917;
}
.checkout-btn {
  display: block;
  margin: 0 auto;
  margin-top: 10px;
  padding: 12px 38px;
}
.empty-cart {
  text-align: center;
  color: #888;
  font-size: 1.1rem;
  margin: 40px 0;
}
@media (max-width: 700px) {
  .cart-table th, .cart-table td { padding: 8px 2px; font-size: 0.95rem; }
  .cart-title { font-size: 1.2rem; }
}
</style>

<div class="cart-container">
  <h2 class="cart-title">Your Cart</h2>
  <?php if (empty($_SESSION['cart'])): ?>
    <div class="empty-cart">Your cart is empty.</div>
  <?php else: ?>
    <form method="post">
      <table class="cart-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          <?php foreach($_SESSION['cart'] as $id => $qty): ?>
            <?php
              $product = $products[$id] ?? null;
              if (!$product) continue;
              $subtotal = $product['price'] * $qty;
              $total += $subtotal;
            ?>
            <tr>
              <td><?= htmlspecialchars($product['name']); ?></td>
              <td><img src="<?= $product['image']; ?>" alt="<?= htmlspecialchars($product['name']); ?>"></td>
              <td>Rs <?= number_format($product['price']); ?></td>
              <td>
                <form method="post" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $id; ?>">
                  <input type="number" name="qty" value="<?= $qty; ?>" min="1">
                  <button type="submit" name="update">Update</button>
                </form>
              </td>
              <td>Rs <?= number_format($subtotal); ?></td>
              <td>
                <form method="post" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $id; ?>">
                  <button type="submit" name="remove">Remove</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </form>
    <div class="cart-total">Total: Rs <?= number_format($total); ?></div>
    <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
  <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
