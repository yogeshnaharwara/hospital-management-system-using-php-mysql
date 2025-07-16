<?php
// Include database connection
include('config.php');

// Fetch all doctors
$sql = "SELECT * FROM doctors";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .doctor-card {
            display: flex;
            justify-content: space-between;
            background: #f0f8ff;
            padding: 15px 20px;
            margin: 15px 0;
            border-left: 5px solid #1976d2;
            border-radius: 6px;
        }
        .doctor-info p {
            margin: 6px 0;
            color: #444;
        }
        .actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .btn-edit {
            background-color: #f0ad4e;
        }
        .btn-delete {
            background-color: #d9534f;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>All Doctors</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="doctor-card">
                    <div class="doctor-info">
                        <p><strong>Name:</strong> ' . htmlspecialchars($row['doctor_name']) . '</p>
                        <p><strong>Email:</strong> ' . htmlspecialchars($row['email']) . '</p>
                        <p><strong>Phone:</strong> ' . htmlspecialchars($row['phone']) . '</p>
                        <p><strong>Department:</strong> ' . htmlspecialchars($row['department']) . '</p>
                        <p><strong>Experience:</strong> ' . htmlspecialchars($row['experience']) . ' years</p>
                        <p><strong>Joined On:</strong> ' . htmlspecialchars($row['created_at']) . '</p>
                    </div>
                    <div class="actions">
                        <a class="btn btn-edit" href="edit_doctor.php?id=' . $row['id'] . '">Edit</a>
                        <a class="btn btn-delete" href="delete_doctor.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this doctor?\')">Delete</a>
                    </div>
                  </div>';
        }
    } else {
        echo "<p>No doctors found in the database.</p>";
    }

    mysqli_close($conn);
    ?>
</div>

</body>
</html>
