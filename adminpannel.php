<?php
// Start session and DB connection
session_start();
$conn = mysqli_connect("localhost", "root", "", "hospital_db");
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Dummy login session for demo
if (!isset($_SESSION['logged_in'])) {
  $_SESSION['logged_in'] = true;
  $_SESSION['role'] = 'admin'; // Change to 'user' to test user view
  $_SESSION['username'] = 'AdminUser';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Khaitan Hospital - Admin Panel</title>
  <style>
    body { margin: 0; font-family: Arial, sans-serif; background: #f4f7fc; }
    .header { background: #2d3e50; color: white; padding: 20px; display: flex; justify-content: space-between; align-items: center; }
    .logo { font-size: 24px; font-weight: bold; }
    .nav-list { list-style: none; display: flex; gap: 20px; }
    .nav-list li { position: relative; }
    .nav-list a { color: white; text-decoration: none; font-size: 16px; }
    .dropdown-content { display: none; position: absolute; background: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1); top: 100%; left: 0; min-width: 180px; z-index: 1000; }
    .dropdown-content li { padding: 10px 20px; }
    .dropdown-content li a { color: #333; }
    .dropdown:hover .dropdown-content { display: block; }
    .hero { padding: 40px; text-align: center; background: #fff; }
    .appointments { padding: 30px; background: #fff; margin: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 12px; border: 1px solid #ccc; text-align: left; }
    th { background: #2d3e50; color: white; }
  </style>
</head>
<body>

<!-- Header -->
<header class="header">
  <div class="logo">Khaitan Hospital</div>
  <nav>
    <ul class="nav-list">
      <li><a href="#">Home</a></li>
      <?php if ($_SESSION['role'] === 'admin'): ?>
      <li class="dropdown">
        <a href="#">Admin Panel ▾</a>
        <ul class="dropdown-content">
          <li><a href="#">All Appointments</a></li>
          <li><a href="adddoctor.php">Add New Doctor</a></li>
          <li><a href="viewdoctor.php">View All Doctors</a></li>
          <li><a href="#">Add New Admin</a></li>
        </ul>
      </li>
      <?php endif; ?>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

<!-- Hero -->
<section class="hero">
  <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
  <p>This is the admin dashboard of Khaitan Hospital.</p>
</section>

<!-- Appointments Section -->
<?php
if ($_SESSION['role'] === 'admin') {
  $result = mysqli_query($conn, "SELECT * FROM appointment ORDER BY id DESC");
  echo '<section class="appointments">';
  echo '<h2>All Appointments</h2>';
  echo '<table>';
  echo '<tr><th>Name</th><th>Phone</th><th>Department</th><th>Date</th><th>Message</th><th>Doctors</th><th>Time Slot</th></tr>';
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    // echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    //  echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['department'] . '</td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['message'] . '</td>';
    echo '<td>' . $row['doctor'] . '</td>';
    echo '<td>' . $row['slot_time'] . '</td>';
    
    echo '</tr>';
  }
  echo '</table>';
  echo '</section>';
}
?>

</body>
</html>
