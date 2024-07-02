<?php
session_start();
require_once('db_config.php');

// Check if user is logged in (example)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Sample query to fetch salary structures
$sql = "SELECT * FROM salary_structures";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Salary Structures</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Manage Salary Structures</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Basic Pay</th>
                            <th>Allowances</th>
                            <th>Deductions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['basic_pay']; ?></td>
                                <td><?php echo $row['allowances']; ?></td>
                                <td><?php echo $row['deductions']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <a href="add_salary_structure.php" class="btn btn-success mb-3">Add Salary Structure</a>
                <a href="manage_pay_scales.php" class="btn btn-primary mb-3">Manage Pay Scales</a>
            </div>
        </div>
    </div>
</body>
</html>
