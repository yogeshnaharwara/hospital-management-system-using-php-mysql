<?php
// Include the config file for database connection
include 'config.php';

if (isset($_POST['submit'])) {
    // Get the form data
    $doctor_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);

    // Check if the doctor already exists by email
    $check_query = "SELECT * FROM doctors WHERE email = '$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Doctor already exists with this email.'); window.history.back();</script>";
    } else {
        // Insert new doctor into the database
        $insert_query = "INSERT INTO doctors (doctor_name, email, phone, department, experience) 
                         VALUES ('$doctor_name', '$email', '$phone', '$department', '$experience')";

        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('Doctor added successfully.'); window.location.href = 'adminpannel.php';</script>";
        } else {
            echo "<script>alert('Error: Could not add doctor. Please try again.'); window.history.back();</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Doctor - Khaitan Hospital</title>
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

/* Header styles */
header {
  background-color: #2d3e50;
  color: #fff;
  padding: 15px 0;
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Container for form */
.container {
  width: 80%;
  max-width: 900px;
  margin: 40px auto;
  padding: 20px;
}

/* Form styles */
form {
  background-color: #fff;
  padding: 30px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

form label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
  font-size: 16px;
}

form input {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
}

form input[type="number"] {
  -moz-appearance: textfield;
}

form button {
  width: 100%;
  padding: 15px;
  background-color: #ff8c00;
  border: none;
  border-radius: 5px;
  color: white;
  font-size: 18px;
  cursor: pointer;
}

form button:hover {
  background-color: #e77a00;
}

/* Footer styles */
footer {
  background-color: #2d3e50;
  color: #fff;
  text-align: center;
  padding: 20px 0;
  margin-top: 40px;
}

/* Alert styles */
.alert {
  color: #e74c3c;
  font-size: 16px;
  margin-top: 10px;
}
/* Label styling for department */
label[for="department"] {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
  font-size: 16px;
  color: #333;
}

/* Select dropdown styling for department */
select[name="department"] {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
  background-color: #fff;
  transition: border-color 0.3s ease;
}

/* Select dropdown hover and focus styling */
select[name="department"]:hover,
select[name="department"]:focus {
  border-color: #ff8c00;
  outline: none;
}


  </style>
</head>
<body>

  <header>
    <h1>Khaitan Hospital - Add Doctor</h1>
  </header>

  <section>
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <label for="doctor_name">Doctor's Name:</label>
        <input type="text" name="doctor_name" id="doctor_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" required>

      
        <label for="department">Department</label>
      <select name="department" id="department" required>
        <option value="Neurology">Neurology</option>
        <option value="Cardiology">Cardiology</option>
        <option value="Orthopedics">Orthopedics</option>
        <option value="Dentistry">Dentistry</option>
        <option value="General Physician">General Physician</option>
      </select>

        <label for="experience">Years of Experience:</label>
        <input type="number" name="experience" id="experience" required>

        <button type="submit" name="submit">Register Doctor</button>
      </form>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Khaitan Hospital. All rights reserved.</p>
  </footer>

</body>
</html>
