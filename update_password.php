<?php
session_name("session2");
session_start();
include ("database.php");

if (isset($_SESSION['emil_otp'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $otp = $_SESSION['otp'];
        $email = $_SESSION['email'];
        $Form_otp = $_POST['otp'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        if ($newPassword === $confirmPassword) {
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $newPassword, $email);
            if ($stmt->execute()) {
                header("location:login.php");
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Passwords do not match.";
        }


    }


}
?>