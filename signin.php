<!DOCTYPE html>
<html>

<head>
  <title>SignIn Form</title>
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
    .login-container input[type="email"],
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
      justify-content: center;
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
    <h2>Sign In</h2>
    <form action="" method="post">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <input type="submit" name="submit" value="Sign In" />
    </form>
    <div class="options">
      <a href="login.php">Already have an account? Login</a>
    </div>
  </div>
  <?php
  include ("database.php");


  if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (id, name, email, created_at, password) VALUES (NULL,?, ?,NULL,?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
      header("Location: signin.php");
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
  }
  ?>
</body>

</html>