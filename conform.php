<?php
session_name("session2");
session_start();
include ("database.php");

if (isset($_SESSION['emil_otp'])) {

    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Password Reset Form</title>
</head>
<body>
    <form action="update_password.php" method="post" id="passwordForm">
        <h2>Reset Password</h2>
        <input type="text" name="otp" id="otp" placeholder="Enter OTP" required>
        <input type="password" name="newPassword" id="newPassword" placeholder="Enter New Password" required>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm New Password" required>
        <button type="submit" name="submit">Submit</button>
        <div id="error" class="error"></div>
    </form>

    <script src="script.js"></script>
</body>
</html>


';



}



?>