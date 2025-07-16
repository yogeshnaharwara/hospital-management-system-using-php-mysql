<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];
    $slot_time = $_POST['slot_time'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    // Server-side validation: appointment date must not be in the past
    $today = date('Y-m-d');  // current date in YYYY-MM-DD format
    if ($date < $today) {
        echo "<script>alert('Appointment date cannot be in the past. Please select a valid date.');</script>";
    } else {
        // Check if same slot already booked for same doctor on the same date
        $checkQuery = "SELECT * FROM appointment WHERE doctor = ? AND slot_time = ? AND date = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("sss", $doctor, $slot_time, $date);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo "<script>alert('This time slot is already booked for the selected doctor on this date. Please choose a different slot.');</script>";
        } else {
            // Proceed with booking
           $stmt = $conn->prepare("INSERT INTO appointment (name, phone, department, doctor, slot_time, date, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $phone, $department, $doctor, $slot_time, $date, $message);
$stmt->execute();
$appointment_id = $stmt->insert_id;
$stmt->close();
echo "<script>
    alert('Appointment Booked Successfully');
    window.location.href = 'appointment_slip.php?id=$appointment_id';
</script>";

        }
        $checkStmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Book Appointment - Khaitan Hospital</title>
  <style>
    .booked { color: red; }
    .disabled-option { background-color: #fdd; color: #999; }
    /* General */
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f4f7fc;
      color: #333;
    }

    h2 {
      text-align: center;
      margin-top: 30px;
      color: #004466;
    }

    /* Appointment Form */
    form {
      max-width: 600px;
      margin: 30px auto;
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    }

    form label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #004466;
    }

    form input,
    form select,
    form textarea {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: border-color 0.2s;
    }

    form input:focus,
    form select:focus,
    form textarea:focus {
      border-color: #0077cc;
      outline: none;
    }

    textarea {
      resize: vertical;
    }

    /* Submit Button */
    button[type="submit"] {
      background-color: #0077cc;
      color: white;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #005fa3;
    }

    /* Disabled/Booked Slot */
    .disabled-option {
      background-color: #ffe6e6;
      color: #999;
      font-style: italic;
    }

    /* Mobile Responsive */
    @media (max-width: 600px) {
      form {
        padding: 20px;
      }

      h2 {
        font-size: 22px;
      }
    }
  </style>
  <script>
    function fetchDoctors(department) {
      if (department === "") {
        document.getElementById("doctor").innerHTML = "<option value=''>-- Select Doctor --</option>";
        return;
      }

      var xhr = new XMLHttpRequest();
      xhr.open("GET", "fetch_doctors.php?department=" + department, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("doctor").innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }

    function fetchBookedSlots() {
      var doctor = document.getElementById("doctor").value;
      var date = document.getElementById("date").value;

      if (doctor === "" || date === "") return;

      var xhr = new XMLHttpRequest();
      xhr.open("GET", "fetch_booked_slots.php?doctor=" + doctor + "&date=" + date, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var bookedSlots = JSON.parse(xhr.responseText);
          var slotSelect = document.getElementById("slot_time");

          // Clear previous options
          slotSelect.innerHTML = "<option value=''>-- Choose Time --</option>";

          let start = 9 * 60, end = 12 * 60; // 9:00 to 12:00
          for (let time = start; time < end; time += 15) {
            let hour = String(Math.floor(time / 60)).padStart(2, '0');
            let min = String(time % 60).padStart(2, '0');
            let from = `${hour}:${min}`;
            let toMin = time + 15;
            let toHour = String(Math.floor(toMin / 60)).padStart(2, '0');
            let toMinStr = String(toMin % 60).padStart(2, '0');
            let slot = `${from} - ${toHour}:${toMinStr}`;

            let option = document.createElement("option");
            option.value = slot;
            option.innerText = slot;

            if (bookedSlots.includes(slot)) {
              option.disabled = true;
              option.classList.add("disabled-option");
              option.innerText += " (Booked)";
            }

            slotSelect.appendChild(option);
          }
        }
      };
      xhr.send();
    }
  </script>
</head>
<body>
  <h2>Book an Appointment</h2>
  <form method="post">
    <label>Full Name</label>
    <input type="text" name="name" required><br>

    <label>Phone</label>
    <input type="tel" name="phone" required><br>

    <label>Department</label>
    <select name="department" onchange="fetchDoctors(this.value)" required>
      <option value="">-- Choose Department --</option>
      <option value="Neurology">Neurology</option>
      <option value="Cardiology">Cardiology</option>
      <option value="Orthopedics">Orthopedics</option>
      <option value="Dentist">Dentist</option>
      <option value="General Physician">General Physician</option>
    </select><br>

    <label>Doctor</label>
    <select name="doctor" id="doctor" onchange="fetchBookedSlots()" required>
      <option value="">-- Select Doctor --</option>
    </select><br>

    <label>Date</label>
    <!-- Client-side min restriction to prevent selecting past dates -->
    <input type="date" name="date" id="date" onchange="fetchBookedSlots()" required min="<?php echo date('Y-m-d'); ?>"><br>

    <label>Time Slot</label>
    <select name="slot_time" id="slot_time" required>
      <option value="">-- Choose Time --</option>
    </select><br>

    <label>Message</label>
    <textarea name="message"></textarea><br>

    <button type="submit">Confirm Appointment</button>
  </form>
</body>
</html>
