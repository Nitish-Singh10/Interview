<?php
session_name("session2");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <style>
    /* styles.css */

    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
      margin: 0;
    }

    form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 15px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <form action="" method="post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required /><br /><br />
    <input type="submit" name="submit" value="Send OTP" />
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $static_otp = 111;

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "nitishsingh282016@gmail.com";
    $mail->Password = "jmnz ycpk ysyp erar";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom('nitishsingh282016@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'OTP to reset password';
    $mail->Body = 'Your OTP is' . $static_otp . '.';
    $mail->send();


    $_SESSION['email'] = $email;
    $_SESSION['otp'] = $static_otp;
    $_SESSION['emil_otp'] = true;
    header("location:conform.php");

  }

  ?>
</body>

</html>