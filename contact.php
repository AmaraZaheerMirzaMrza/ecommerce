<?php include 'header.php'; ?>

<style>
.contact-container {
  max-width: 500px;
  margin: 40px auto;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 12px rgba(0,0,0,0.08);
  padding: 32px 28px 24px 28px;
}
.contact-container h2 {
  margin-bottom: 10px;
  color: #222;
}
.contact-container p {
  color: #555;
  margin-bottom: 18px;
}
.contact-form input, .contact-form textarea {
  width: 100%;
  padding: 12px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background: #f9f9f9;
  resize: none;
}
.contact-form button {
  background: #222;
  color: #fff;
  border: none;
  padding: 12px 32px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.2s;
}
.contact-form button:hover {
  background: #444;
}
.contact-success {
  background: #e6f9e6;
  color: #207520;
  border: 1px solid #b6e2b6;
  padding: 12px;
  border-radius: 4px;
  margin-bottom: 18px;
}
.contact-error {
  background: #ffeaea;
  color: #b30000;
  border: 1px solid #ffb3b3;
  padding: 12px;
  border-radius: 4px;
  margin-bottom: 18px;
}
</style>

<div class="contact-container">
  <h2>Contact Us</h2>
  <p>We’d love to hear from you. Reach out anytime!</p>
  <?php
    // Set SMTP server for Windows/XAMPP (update to your real SMTP if needed)
    ini_set('SMTP', 'smtp.gmail.com');
    ini_set('smtp_port', 587);
    ini_set('sendmail_from', 'your-email@gmail.com');
    $success = $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = trim($_POST['name'] ?? '');
      $email = trim($_POST['email'] ?? '');
      $message = trim($_POST['message'] ?? '');
      if ($name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = 'support@minishop.com';
        $subject = "Contact Form Submission from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email";
        if (mail($to, $subject, $body, $headers)) {
          $success = '<strong>Thank you for reaching out!</strong><br>We have received your message and our support team will contact you within 24 hours. For urgent matters, please call our hotline or email support@minishop.com.';
        } else {
          $error = '<strong>Message not sent.</strong><br>There was a technical issue sending your message. Please try again later or contact us directly at support@minishop.com.';
        }
      } else {
        $error = '<strong>Form incomplete or invalid.</strong><br>Please fill in all fields and provide a valid email address.';
      }
    }
    if ($success) echo '<div class="contact-success">'.$success.'</div>';
    if ($error) echo '<div class="contact-error">'.$error.'</div>';
  ?>
  <form class="contact-form" method="post" action="" onsubmit="this.querySelector('button').disabled=true;this.querySelector('button').innerText='Sending...';">
    <input type="text" name="name" placeholder="Your Name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
    <input type="email" name="email" placeholder="Your Email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
    <textarea name="message" placeholder="Your Message" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
    <button type="submit">Send Message</button>
  </form>
</div>

<?php include 'footer.php'; ?>
