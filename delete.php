<?php
session_name("session1");
session_start();
error_reporting(0);
include ("database.php");
$admin = $_SESSION['admin'];
if (isset($_SESSION['loggedin'])) {
    echo '
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <form action="" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        // Prepare and bind
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute the query
        if ($stmt->execute()) {
            header("Location: admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    header('location:login.php');
}

?>