<?php include 'header.php'; ?>

<style>
.checkout-container {
  max-width: 520px;
  margin: 40px auto;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.08);
  padding: 32px 28px 24px 28px;
}
.checkout-title {
  margin-bottom: 10px;
  color: #222;
  text-align: center;
}
.checkout-form input {
  width: 100%;
  padding: 12px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background: #f9f9f9;
}
.checkout-form button {
  background: #1565c0;
  color: #fff;
  border: none;
  padding: 12px 32px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.2s;
  margin-top: 8px;
}
.checkout-form button:hover {
  background: #003c8f;
}
.checkout-success {
  background: #e6f9e6;
  color: #207520;
  border: 1px solid #b6e2b6;
  padding: 12px;
  border-radius: 4px;
  margin-bottom: 18px;
  text-align: center;
}
.checkout-error {
  background: #ffeaea;
  color: #b30000;
  border: 1px solid #ffb3b3;
  padding: 12px;
  border-radius: 4px;
  margin-bottom: 18px;
  text-align: center;
}
.order-summary {
  background: #f7f7f7;
  border-radius: 6px;
  padding: 16px 18px;
  margin-bottom: 22px;
  font-size: 1.05rem;
}
.order-summary-title {
  font-weight: bold;
  margin-bottom: 8px;
  color: #1565c0;
}
.order-summary-list {
  margin: 0 0 8px 0;
  padding: 0;
  list-style: none;
}
.order-summary-list li {
  margin-bottom: 4px;
}
.order-summary-total {
  font-weight: bold;
  color: #1a8917;
  margin-top: 8px;
}
</style>

<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $address = trim($_POST['address'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  if ($name && $address && $phone) {
    $success = 'Thank you for your order, ' . htmlspecialchars($name) . '! Your order has been placed.';
    // Optionally clear cart after order
    $_SESSION['cart'] = [];
  } else {
    $error = 'Please fill in all fields.';
  }
}

// Order summary logic
$products = [];
for($i=1; $i<=52; $i++){
  $products[$i] = [
    "name" => "Product $i",
    "price" => rand(1000,5000),
    "image" => "images/product" . (($i-1)%20+1) . ".jpg"
  ];
}
$cart = $_SESSION['cart'] ?? [];
$orderItems = [];
$orderTotal = 0;
foreach($cart as $id => $qty) {
  if (isset($products[$id])) {
    $item = $products[$id];
    $item['qty'] = $qty;
    $item['subtotal'] = $item['price'] * $qty;
    $orderItems[] = $item;
    $orderTotal += $item['subtotal'];
  }
}
?>

<div class="checkout-container">
  <h2 class="checkout-title">Checkout</h2>
  <?php if ($success): ?>
    <div class="checkout-success"><?= $success ?></div>
  <?php elseif ($error): ?>
    <div class="checkout-error"><?= $error ?></div>
  <?php endif; ?>

  <?php if (!empty($orderItems)): ?>
    <div class="order-summary">
      <div class="order-summary-title">Order Summary</div>
      <ul class="order-summary-list">
        <?php foreach($orderItems as $item): ?>
          <li><?= htmlspecialchars($item['name']) ?> x <?= $item['qty'] ?> — Rs <?= number_format($item['subtotal']) ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="order-summary-total">Total: Rs <?= number_format($orderTotal) ?></div>
    </div>
  <?php endif; ?>

  <form class="checkout-form" method="post" action="">
    <input type="text" name="name" placeholder="Full Name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
    <input type="text" name="address" placeholder="Address" required value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>">
    <input type="text" name="phone" placeholder="Phone" required value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
    <p><strong>Payment Method:</strong> Cash on Delivery</p>
    <button type="submit">Place Order</button>
  </form>
</div>

<?php include 'footer.php'; ?>
