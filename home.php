<script>
// Disable reload for all forms on the page (newsletter, search, etc.)
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('form').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      // Optionally show a message or handle AJAX here
    });
  });
});
</script>
<!-- Chat Button -->
<style>
.chat-btn {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 1000;
  background: #23272f;
  <h2 style="color:#ffd600; margin-left:16px;">Shop by Category</h2>
  <div class="categories-grid">
    <a class="cat-card" href="products.php?category=women"><img src="images/women.jpg"><h3>Women</h3></a>
    <a class="cat-card" href="products.php?category=men"><img src="images/men.jpg"><h3>Men</h3></a>
    <a class="cat-card" href="products.php?category=kids"><img src="images/kids.jpg"><h3>Kids</h3></a>
    <a class="cat-card" href="products.php?category=accessories"><img src="images/accessories.jpg"><h3>Accessories</h3></a>
  </div>
  border: none;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  box-shadow: 0 4px 16px rgba(0,0,0,0.18);
  cursor: pointer;
  transition: background 0.2s, color 0.2s, box-shadow 0.2s;
}
.chat-btn:hover {
      color: #23272f;
  color: #23272f;
  box-shadow: 0 6px 24px rgba(0,0,0,0.22);
}
@media (max-width: 700px) {
  .chat-btn {
    width: 48px;
    height: 48px;
    font-size: 1.4rem;
    bottom: 14px;
    right: 14px;
  }
}
</style>
<button class="chat-btn" title="Chat with us" onclick="alert('Chat feature coming soon!')">
  <span style="display:inline-block;line-height:1;">
    &#128172;
  </span>
</button>
<?php include 'header.php'; ?>

<!-- Hero Banner -->
<style>
.hero {
  position: relative;
  width: 100%;
  min-height: 420px;
  overflow: hidden;
  margin-bottom: 32px;
}
.hero img {
  width: 100%;
  <h2 style="color:#ffd600; margin-left:16px;">Shop by Category</h2>
  object-fit: cover;
  display: block;
}
.hero-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: rgba(29, 33, 37, 0.82);
  color: #fff;
  padding: 38px 48px 32px 48px;
  border-radius: 12px;
  text-align: center;
  box-shadow: 0 4px 24px rgba(0,0,0,0.13);
}
.hero-text h2 {
  font-size: 2.6rem;
  margin-bottom: 12px;
  color: #ffd600;
  letter-spacing: 1px;
}
.hero-text p {
  font-size: 1.3rem;
  margin-bottom: 18px;
  color: #fff;
}
.hero-text .btn {
  background: #ffd600;
  color: rgba(27, 37, 48, 0.82);
  font-weight: bold;
  border: none;
  padding: 12px 36px;
  border-radius: 4px;
  font-size: 1.1rem;
  text-decoration: none;
  transition: background 0.2s, color 0.2s;
}
.hero-text .btn:hover {
  background: #fff;
  color: rgba(38, 46, 56, 0.82);
}
@media (max-width: 700px) {
  .hero img { height: 220px; }
  .hero-text { padding: 18px 8px; }
  .hero-text h2 { font-size: 1.2rem; }
  .hero-text p { font-size: 1rem; }
}
</style>
<section class="hero">
  <div class="hero-text">
    <h2>End of Season Sale</h2>
    <p>Flat 50% Off on Selected Items</p>
    <a href="products.php" class="btn">Shop Now</a>
  </div>
</section>
<div style="width:100vw;left:50%;right:50%;margin-left:-50vw;margin-right:-50vw;height:6px;background:#23272f;"></div>

<!-- Categories -->
<style>
.categories .categories-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
  gap: 24px;
  margin-top: 18px;
}
.cat-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.08);
  overflow: hidden;
  text-align: center;
  transition: box-shadow 0.2s, transform 0.2s;
  cursor: pointer;
  padding: 0 0 12px 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  color: #222;
}
.cat-card:hover {
  box-shadow: 0 6px 24px rgba(0,0,0,0.14);
  transform: translateY(-4px) scale(1.03);
  color: rgba(39, 69, 104, 0.82);
}
.cat-card img {
  width: 100%;
  max-width: 120px;
  height: 120px;
  object-fit: cover;
  margin: 18px auto 10px auto;
  border-radius: 50%;
  background: #f7f7f7;
}
.cat-card h3 {
  margin: 0;
  font-size: 1.1rem;
  font-weight: 600;
  color: inherit;
}
@media (max-width: 700px) {
  .categories .categories-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
  .cat-card img { max-width: 70px; height: 70px; }
  .cat-card h3 { font-size: 0.98rem; }
}
</style>
<section class="categories container">
  <h2>Shop by Category</h2>
  <div class="categories-grid">
    <a class="cat-card" href="products.php?category=women"><img src="images/women.jpg"><h3>Women</h3></a>
    <a class="cat-card" href="products.php?category=men"><img src="images/men.jpg"><h3>Men</h3></a>
    <a class="cat-card" href="products.php?category=kids"><img src="images/kids.jpg"><h3>Kids</h3></a>
    <a class="cat-card" href="products.php?category=accessories"><img src="images/accessories.jpg"><h3>Accessories</h3></a>
  </div>
</section>

<!-- Featured Products -->
<section class="featured container">
  <h2>Featured Products</h2>
  <div class="grid">
    <?php
    $featured = [
      ["name"=>"Cotton Kurti","price"=>2500,"image"=>"images/product1.jpg"],
      ["name"=>"Denim Shirt","price"=>3200,"image"=>"images/product2.jpg"],
      ["name"=>"Kids T-Shirt","price"=>1500,"image"=>"images/product3.jpg"],
      ["name"=>"Leather Bag","price"=>4500,"image"=>"images/product4.jpg"],
    ];
    foreach($featured as $item): ?>
      <div class="card">
        <img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
        <h3><?= $item['name']; ?></h3>
        <p>Rs <?= number_format($item['price']); ?></p>
        <a href="products.php" class="btn">Shop Now</a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Promotional Banner -->

<style>
.promo-full {
  position: relative;
  width: 100vw;
  left: 50%;
  right: 50%;
  margin-left: -50vw;
  margin-right: -50vw;
  min-height: 480px;
  background: url('images/hero.jpg') center center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 40px;
  margin-bottom: 32px;
  overflow: hidden;
}
.promo-full-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(35, 39, 47, 0.72);
  z-index: 1;
}
.promo-full-content {
  position: relative;
  z-index: 2;
  text-align: center;
  color: #fff;
  padding: 54px 60px 48px 60px;
  border-radius: 18px;
  box-shadow: 0 4px 24px rgba(35,39,47,0.13);
  width: 100%;
  max-width: 900px;
  background: rgba(35, 39, 47, 0.55);
}
.promo-full-content h2 {
  font-size: 2.6rem;
  margin-bottom: 12px;
  color: #ffd600;
}
.promo-full-content p {
  font-size: 1.3rem;
  margin-bottom: 18px;
  color: #fff;
}
.promo-full-content .btn {
  background: #ffd600;
  color: rgba(39, 69, 104, 0.82);
  font-weight: bold;
  border: none;
  padding: 14px 44px;
  border-radius: 4px;
  font-size: 1.1rem;
  text-decoration: none;
  transition: background 0.2s, color 0.2s;
}
.promo-full-content .btn:hover {
  background: #fff;
  color: rgba(12, 21, 31, 0.82);
}
@media (max-width: 900px) {
  .promo-full-content { padding: 18px 8px; }
  .promo-full-content h2 { font-size: 1.2rem; }
  .promo-full-content p { font-size: 1rem; }
  .promo-full { min-height: 300px; }
}
</style>
<section class="promo-full">
  <div class="promo-full-overlay"></div>
  <div class="promo-full-content">
    <h2>New Arrivals</h2>
    <p>Discover the latest collection now</p>
    <a href="products.php" class="btn">Explore</a>
  </div>
</section>

<!-- Reviews Section -->
<style>
.reviews-section {
  background: #f7f7f7;
  padding: 48px 0 32px 0;
  margin-top: 40px;
}
.reviews-container {
  max-width: 900px;
  margin: 0 auto;
  padding: 0 16px;
}
.reviews-title {
  text-align: left;
  font-size: 2rem;
  color: #23272f;
  margin-bottom: 28px;
  font-weight: 700;
}
.reviews-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 24px;
}
.review-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  padding: 24px 20px 18px 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  min-height: 160px;
}
.review-text {
  font-size: 1.08rem;
  color: #23272f;
  margin-bottom: 14px;
}
.review-author {
  font-weight: 600;
  color: #1565c0;
  font-size: 1rem;
}
.review-rating {
  color: #ffd600;
  font-size: 1.1rem;
  margin-bottom: 6px;
}
@media (max-width: 700px) {
  .reviews-title { font-size: 1.2rem; }
  .review-card { padding: 14px 8px; }
}
</style>
<section class="reviews-section">
  <div class="reviews-container">
    <div class="reviews-title">What Our Customers Say</div>
    <div class="reviews-grid">
      <div class="review-card">
        <div class="review-rating">★★★★★</div>
        <div class="review-text">Great quality and fast delivery. Will shop again!</div>
        <div class="review-author">- Ayesha K.</div>
      </div>
      <div class="review-card">
        <div class="review-rating">★★★★★</div>
        <div class="review-text">Loved the variety and prices. Highly recommended.</div>
        <div class="review-author">- Bilal M.</div>
      </div>
      <div class="review-card">
        <div class="review-rating">★★★★★</div>
        <div class="review-text">Customer support was very helpful. Excellent service!</div>
        <div class="review-author">- Sana R.</div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
  <div class="container">
    <h2>Join Our Newsletter</h2>
    <p>Get updates about new arrivals and exclusive offers</p>
    <form>
      <input type="email" placeholder="Enter your email" required>
      <button type="submit">Subscribe</button>
    </form>
  </div>
</section>

<?php include 'footer.php'; ?>
