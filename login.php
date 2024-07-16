<?php
session_name("session1");
session_start();
include ("database.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .login-container h2 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
      text-align: center;
    }

    .login-container label {
      font-size: 14px;
      color: #333;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0 16px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .login-container input[type="submit"] {
      width: 100%;
      background-color: #4caf50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .login-container input[type="submit"]:hover {
      background-color: #45a049;
    }

    .login-container .options {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .login-container .options a {
      font-size: 14px;
      color: #4caf50;
      text-decoration: none;
    }

    .login-container .options a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <input type="submit" name="submit" value="Login" />
    </form>
    <div class="options">
      <a href="signin.php">Sign Up</a>
      <a href="forget.php">Forgot Password?</a>
    </div>
  </div>

  <?php
  if (isset($_POST['submit'])) {
    $Name = $_POST['username'];
    $Password = $_POST['password'];
    if (!empty($Name) && !empty($Password)) {
      $que = "SELECT * FROM users where name='$Name' LIMIT 1";
      $data = mysqli_query($conn, $que);
      if (
        $data && mysqli_num_rows($data) > 0
      ) {
        $fetch = mysqli_fetch_assoc($data);
        if (
          $fetch["password"] == $Password
        ) {
          $_SESSION['username'] = $Name;
          $_SESSION['loggedin'] = true;
          header("location:admin.php");
        } else {
          echo "
    <script>
      alert('Wrong User Name and Password');
    </script>
    ";
        }
      } else {
        echo "
    <script>
      alert('Wrong User Name and Password');
    </script>
    ";
      }
    } else {
      echo "
    <script>
      alert('Invalid Entry');
    </script>
    ";
    }
  } ?>
</body>

</html>