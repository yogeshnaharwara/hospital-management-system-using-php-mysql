<?php
include('config.php');

$department = $_GET['department'];

$sql = "SELECT * FROM doctors WHERE department = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $department);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<option value=''>-- Select Doctor --</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['doctor_name'] . "'>" . $row['doctor_name'] . "</option>";
    }
} else {
    echo "<option value=''>No doctors available</option>";
}
?>
