<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Doctors - Khaitan Hospital</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0; padding: 0;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f9ff;
      color: #333;
    }
    /* Navbar styles */
    header.navbar {
      background-color: #0077cc;
      color: white;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      flex-wrap: wrap;
    }
    header.navbar .logo {
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }
    nav.nav {
      flex: 1;
      margin-left: 20px;
    }
    nav.nav ul.nav-list {
      list-style: none;
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      align-items: center;
    }
    nav.nav ul.nav-list li a {
      color: white;
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 4px;
      font-weight: 600;
    }
    nav.nav ul.nav-list li a.active,
    nav.nav ul.nav-list li a:hover {
      background-color: #005fa3;
    }
    nav.nav ul.nav-list li .btn-appoint {
      background-color: #28a745;
      padding: 8px 15px;
      color: white;
      font-weight: 700;
      border-radius: 6px;
    }
    nav.nav ul.nav-list li .btn-appoint:hover {
      background-color: #218838;
    }

    /* Search & Filter container */
    .search-filter-container {
      max-width: 1200px;
      margin: 30px auto 10px;
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
    }
    .search-filter-container input[type="text"],
    .search-filter-container select {
      padding: 10px 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 16px;
      width: 250px;
      transition: border-color 0.3s ease;
    }
    .search-filter-container input[type="text"]:focus,
    .search-filter-container select:focus {
      outline: none;
      border-color: #0077cc;
    }

    /* Doctors Section */
    .doctors-section {
      max-width: 1200px;
      margin: 20px auto 60px;
      padding: 0 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
    }
    .doctor-card {
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.07);
      padding: 25px;
      width: 300px;
      transition: transform 0.2s ease;
      cursor: default;
      text-align: center;
    }
    .doctor-card:hover {
      transform: translateY(-5px);
    }
    .doctor-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #0077cc;
    }
    .doctor-card h3 {
      color: #0077cc;
      margin-bottom: 10px;
    }
    .doctor-card p {
      font-size: 15px;
      margin-bottom: 8px;
      line-height: 1.5;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #0077cc;
      color: white;
      font-size: 14px;
    }
  </style>
</head>
<body>

<header class="navbar">
  <div class="logo">Khaitan <span>Hospital</span></div>
  <nav class="nav">
    <ul class="nav-list">
      <li><a href="userpannel.php">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="services.html">Services</a></li>
      <li><a href="doctors.php" class="active">Doctors</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="login.html">Login</a></li>
      <li><a href="appointment.php" class="btn-appoint">Book Appointment</a></li>
    </ul>
  </nav>
</header>

<div class="search-filter-container">
  <input type="text" id="searchInput" placeholder="Search doctors by name..." />
  <select id="departmentFilter">
    <option value="">Filter by Department</option>
    <?php
      $dep_sql = "SELECT DISTINCT department FROM doctors ORDER BY department ASC";
      $dep_result = mysqli_query($conn, $dep_sql);
      while ($dep_row = mysqli_fetch_assoc($dep_result)) {
        echo '<option value="'.htmlspecialchars($dep_row['department']).'">'.htmlspecialchars($dep_row['department']).'</option>';
      }
    ?>
  </select>
</div>

<div class="doctors-section" id="doctorsContainer">
  <?php
    // Fixed image for all doctors
    $fixedImage = 'doctor.png';  // Change path if needed

    $sql = "SELECT * FROM doctors ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="doctor-card" data-name="'.strtolower(htmlspecialchars($row['doctor_name'])).'" data-department="'.strtolower(htmlspecialchars($row['department'])).'">';
        echo '<img src="' . $fixedImage . '" alt="Dr. ' . htmlspecialchars($row['doctor_name']) . '">';
        echo '<h3>Dr. ' . htmlspecialchars($row['doctor_name']) . '</h3>';
        echo '<p><strong>Department:</strong> ' . htmlspecialchars($row['department']) . '</p>';
        echo '<p><strong>Email:</strong> ' . htmlspecialchars($row['email']) . '</p>';
        echo '<p><strong>Phone:</strong> ' . htmlspecialchars($row['phone']) . '</p>';
        echo '<p><strong>Experience:</strong> ' . htmlspecialchars($row['experience']) . ' years</p>';
        echo '<p><strong>Joined:</strong> ' . date('d M Y', strtotime($row['created_at'])) . '</p>';
        echo '</div>';
      }
    } else {
      echo "<p>No doctors found in the database.</p>";
    }
  ?>
</div>

<footer>
  &copy; 2025 Khaitan Hospital | All Rights Reserved
</footer>

<script>
  const searchInput = document.getElementById('searchInput');
  const departmentFilter = document.getElementById('departmentFilter');
  const doctorsContainer = document.getElementById('doctorsContainer');
  const doctorCards = doctorsContainer.querySelectorAll('.doctor-card');

  function filterDoctors() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedDepartment = departmentFilter.value.toLowerCase();

    doctorCards.forEach(card => {
      const name = card.getAttribute('data-name');
      const department = card.getAttribute('data-department');

      const matchesSearch = name.includes(searchTerm);
      const matchesDepartment = selectedDepartment === '' || department === selectedDepartment;

      if (matchesSearch && matchesDepartment) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  }

  searchInput.addEventListener('input', filterDoctors);
  departmentFilter.addEventListener('change', filterDoctors);
</script>

</body>
</html>
