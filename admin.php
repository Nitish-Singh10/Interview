<?php
session_name("session1");
session_start();
error_reporting(0);
include ("database.php");
$admin = $_SESSION['admin'];
if (isset($_SESSION['loggedin'])) {
    echo '
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <title>Welcome</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Welcome, ';
    echo $_SESSION['username'];
    echo '!</h1>';
    echo '
        <a href="update.php" class="btn btn-primary mb-3">Update Data</a>
        <a href="delete.php" class="btn btn-danger mb-3">Delete Data</a>
        <table id="myTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>';
    $query = "SELECT * FROM users";

    if ($result = $conn->query($query)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                echo '<tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->name . '</td>
                        <td>' . $row->email . '</td>
                        <td>' . $row->created_at . '</td>
                      </tr>';
            }
        }
    }
    echo '</tbody>
        </table>
        <p><a href="logout.php" class="btn btn-secondary mt-3">Logout</a></p>
    </div>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>
</body>
</html>';
} else {
    header('location:login.php');
}
?>