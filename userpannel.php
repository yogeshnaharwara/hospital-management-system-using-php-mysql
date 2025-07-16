<?php
session_start(); // Required at the top of every PHP page using sessions
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Khaitan Hospital</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Header -->
<header class="header">
  <div class="container nav-container">
    <h1 class="logo">Khaitan Hospital</h1>
    <nav class="nav">
      <ul class="nav-list">
        <li><a href="userpannel.php" class="active">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="doctors.php">Doctors</a></li>
        <li><a href="contact.html">Contact</a></li>

        <!-- Login/Logout Toggle -->
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>

        <li><a href="appointment.php" class="btn-appoint">Book Appointment</a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- Hero Section -->
<section class="hero simple-hero">
  <div class="container">
    <h2>Welcome to Khaitan Hospital</h2>
    <p>Advanced care with expert doctors and modern facilities.</p>
  </div>
</section>

<!-- Services Section -->
<section class="services-section">
  <div class="container">
    <h3 class="section-title">Our Specialties</h3>
    <div class="services-grid">
      <a href="doctors.html#neurology" class="service-card">Neurology</a>
      <a href="doctors.html#cardiology" class="service-card">Cardiology</a>
      <a href="doctors.html#orthopedics" class="service-card">Orthopedics</a>
      <a href="doctors.html#dentistry" class="service-card">Dentistry</a>
      <a href="doctors.html#general-physician" class="service-card">General Physician</a>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="cta">
  <div class="container">
    <h3>Need a Consultation?</h3>
    <p>Book an appointment with our experienced doctors now.</p>
    <a href="appointment.html" class="btn-primary">Book Now</a>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p>&copy; 2025 Khaitan Hospital. All rights reserved.</p>
  </div>
</footer>

<script type="module" src="doctors.js"></script>
</body>
</html>
