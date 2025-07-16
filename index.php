<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Login to Khaitan Hospital for patient or doctor access.">
  <meta name="keywords" content="Khaitan Hospital, login, healthcare">
  <title>Login - Khaitan Hospital</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Global styles */
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f4f7fc;
      color: #333;
    }

    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
    }

    /* Navbar styles */
    header {
      background-color: #2d3e50;
      color: #fff;
      padding: 15px 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      margin-left: 20px;
    }

    nav ul {
      display: flex;
      justify-content: flex-end;
      list-style-type: none;
      padding: 0;
    }

    nav ul li {
      margin: 0 15px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-size: 16px;
    }

    nav ul li a.active {
      font-weight: bold;
      color: #ff8c00;
    }

    nav ul li .btn-appoint {
      background-color: #ff8c00;
      padding: 10px 20px;
      border-radius: 5px;
      color: #fff;
      font-weight: bold;
    }

    /* Login Section Styles */
    .login-section {
      background-color: #fff;
      padding: 50px 0;
    }

    .login-form {
      background-color: #f8f9fb;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      width: 400px;
      margin: 0 auto;
    }

    .login-form h2 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      color: #333;
    }

    .form-group input:focus {
      border-color: #ff8c00;
      outline: none;
    }

    .btn-submit {
      width: 100%;
      padding: 15px;
      background-color: #ff8c00;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #e77a00;
    }

    /* Footer styles */
    footer {
      background-color: #2d3e50;
      color: #fff;
      text-align: center;
      padding: 20px 0;
    }
    
  </style>
</head>
<body>
  <!-- Navbar -->
  <header>
    <div class="container">
      <h1 class="logo">Khaitan Hospital</h1>
      <nav>
        <ul>
          <li><a href="userpannel.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="doctors.php">Doctors</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="register.php" class="active">Register</a></li>
          <!-- <li><a href="appointment.html" class="btn-appoint">Book Appointment</a></li> -->
        </ul>
      </nav>
    </div>
  </header>

  <!-- Login Form -->
  <section class="login-section">
    <div class="container">
      <div class="login-form">
        <h2>Login</h2>
        <form action="loginbackend.php" method="post" id="login-form">
          <div class="form-group">
            <label for="email">Email or Phone</label>
            <input type="text" id="email" name="email" required aria-required="true">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required aria-required="true">
          </div>
          <button type="submit" class="btn-submit">Login</button>
        </form>
        <div class="register-link">
          <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2025 Khaitan Hospital. All rights reserved.</p>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>
