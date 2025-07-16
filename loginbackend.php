<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check email in DB
    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // ✅ Set session values
            $_SESSION['logged_in'] = true;
            $_SESSION['username']  = $user['username'];
            $_SESSION['role']      = $user['role'];
            $_SESSION['email']     = $user['email'];

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header("Location: adminpannel.php");
            } else {
                header("Location: userpannel.php");
            }
            exit;
        } else {
            echo "<script>alert('Invalid password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.'); window.history.back();</script>";
    }
}
?>
