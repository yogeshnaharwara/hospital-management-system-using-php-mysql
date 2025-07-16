<?php
include('config.php');

$doctor = $_GET['doctor'];
$date = $_GET['date'];

$stmt = $conn->prepare("SELECT slot_time FROM appointment WHERE doctor = ? AND date = ?");
$stmt->bind_param("ss", $doctor, $date);
$stmt->execute();
$result = $stmt->get_result();

$booked = [];
while ($row = $result->fetch_assoc()) {
    $booked[] = $row['slot_time'];
}
echo json_encode($booked);
?>
