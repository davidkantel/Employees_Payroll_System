<?php
session_start();
require_once('db_config.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all employees with their payroll details
$sql = "SELECT e.id, e.name, e.email, 
               s.basic_pay, s.allowances, s.deductions
        FROM employees e
        LEFT JOIN salary_structures s ON e.id = s.employee_id"; // Assuming correct column names and relationships
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Payroll</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body">
    <div class="container mt-5">
        <h2 class="text-center text-warning mb-4">Payroll</h2>
        <div class="row bg-success p-5">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Basic Pay(ksh)</th>
                            <th>Allowances(ksh)</th>
                            <th>Deductions(ksh)</th>
                            <th>Gross Pay(ksh)</th>
                            <th>Net Pay(ksh)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Debugging statements
                                // var_dump($row); // Uncomment to inspect fetched data

                                // Calculate gross pay and net pay based on fetched data
                                $basic_pay = (float)$row['basic_pay'];
                                $allowances = (float)$row['allowances'];
                                $deductions = (float)$row['deductions'];
                                $gross_pay = $basic_pay + $allowances;
                                $net_pay = $gross_pay - $deductions;

                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . number_format($basic_pay, 2) . "</td>";
                                echo "<td>" . number_format($allowances, 2) . "</td>";
                                echo "<td>" . number_format($deductions, 2) . "</td>";
                                echo "<td>" . number_format($gross_pay, 2) . "</td>"; // Display gross pay
                                echo "<td>" . number_format($net_pay, 2) . "</td>"; // Display net pay
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No employees found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
