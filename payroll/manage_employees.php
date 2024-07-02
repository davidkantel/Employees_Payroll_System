<?php
session_start();
require_once('db_config.php');

// Check if user is logged in (example)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Sample query to fetch employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Manage Employees</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['department']; ?></td>
                                <td>
                                    <a href="edit_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="add_employee.php" class="btn btn-success mb-3">Add Employee</a>
            </div>
        </div>
    </div>
</body>
</html>
