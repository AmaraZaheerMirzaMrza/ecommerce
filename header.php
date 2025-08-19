<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEAR & WRAP</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .header {
      background: #23272f;
      color: #fff;
      padding: 0;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    }
    .header-center {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 6px 24px 6px 24px;
    }
    .logo a {
      color: #fff;
      text-decoration: none;
      font-size: 1.5rem;
      font-weight: 700;
      letter-spacing: 1px;
      transition: color 0.2s;
      line-height: 1;
      padding: 0;
    }
    .logo a:hover {
      color: #ffd600;
    }
    .navbar {
      display: flex;
      gap: 24px;
    }
    .navbar a {
      color: #fff;
      text-decoration: none;
      font-size: 1.08rem;
      font-weight: 500;
      padding: 6px 0;
      border-bottom: 2px solid transparent;
      transition: color 0.2s, border-bottom 0.2s;
    }
    .navbar a:hover, .navbar a.active {
      color: #ffd600;
      border-bottom: 2px solid #ffd600;
    }
    @media (max-width: 700px) {
      .header-center { flex-direction: column; gap: 10px; padding: 12px 6px; }
      .logo a { font-size: 1.3rem; }
      .navbar { gap: 12px; font-size: 0.98rem; }
    }
  </style>
</head>
<body>

<header class="header">
  <div class="container header-center">
    <h1 class="logo"><a href="home.php">WEAR & WRAP</a></h1>
    <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="products.php">Products</a>
      <a href="contact.php">Contact</a>
      <a href="cart.php">Cart (<?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>)</a>
      <a href="checkout.php">Checkout</a>
    </nav>
  </div>
</header>
