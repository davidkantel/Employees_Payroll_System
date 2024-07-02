<?php
session_start();
require_once('db_config.php');

// Check if user is logged in (example)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch pay scales from database
$sql = "SELECT * FROM pay_scales";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pay Scales</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Manage Pay Scales</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Min Salary</th>
                            <th>Max Salary</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['min_salary']; ?></td>
                                <td><?php echo $row['max_salary']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <a href="edit_pay_scale.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete_pay_scale.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this pay scale?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="add_pay_scale.php" class="btn btn-success mb-3">Add Pay Scale</a>
            </div>
        </div>
    </div>
</body>
</html>
