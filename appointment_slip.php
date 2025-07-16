<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM appointment WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Prescription Slip</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f8f9fa;
    }

    .navbar {
      background: #004080;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .slip-container {
      max-width: 800px;
      background: white;
      margin: 40px auto;
      padding: 30px;
      border: 2px solid #004080;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.15);
    }

    .slip-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 10px;
    }

    .slip-header .hospital-name {
      font-size: 22px;
      font-weight: bold;
      color: #004080;
    }

    .slip-header .date-time {
      font-size: 16px;
      color: #333;
    }

    .slip-body p {
      margin: 8px 0;
      font-size: 16px;
    }

    .slip-body strong {
      width: 160px;
      display: inline-block;
    }

    .doctor-area {
      margin-top: 40px;
      border: 2px dashed #004080;
      padding: 20px;
      min-height: 180px;
      border-radius: 8px;
    }

    .doctor-area h3 {
      margin-top: 0;
      color: #004080;
      font-size: 18px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 5px;
    }

    .print-btn {
      text-align: center;
      margin-top: 30px;
    }

    button {
      padding: 10px 20px;
      background-color: #004080;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #003366;
    }

    @media print {
      .navbar, .print-btn {
        display: none;
      }
      .slip-container {
        box-shadow: none;
        border: none;
      }
    }
  </style>
</head>
<body>
  <div class="navbar">Khaitan Hospital</div>

  <div class="slip-container">
    <div class="slip-header">
      <div class="hospital-name">Khaitan Hospital, Jaipur</div>
      <div class="date-time">
        Date: <?php echo htmlspecialchars($data['date']); ?><br>
        Time: <?php echo htmlspecialchars($data['slot_time']); ?>
      </div>
    </div>

    <div class="slip-body">
      <p><strong>Appointment ID:</strong> <?php echo $data['id']; ?></p>
      <p><strong>Patient Name:</strong> <?php echo htmlspecialchars($data['name']); ?></p>
      <p><strong>Phone:</strong> <?php echo htmlspecialchars($data['phone']); ?></p>
      <p><strong>Department:</strong> <?php echo htmlspecialchars($data['department']); ?></p>
      <p><strong>Doctor Name:</strong> Dr. <?php echo htmlspecialchars($data['doctor']); ?></p>
      <p><strong>Patient Message:</strong> <?php echo nl2br(htmlspecialchars($data['message'])); ?></p>
    </div>

    <div class="doctor-area">
      <h3>Doctor's Prescription / Notes:</h3>
      <!-- Doctor will write manually here after print -->
    </div>

    <div class="print-btn">
      <button onclick="window.print()">🖨️ Print Slip</button>
    </div>
  </div>
</body>
</html>
