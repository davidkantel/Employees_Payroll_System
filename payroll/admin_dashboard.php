<?php
session_start();
require_once('db_config.php');

// Check if user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Sample queries (replace with your actual queries)
$sqlEmployees = "SELECT * FROM employees";
$resultEmployees = $conn->query($sqlEmployees);

$sqlSalaryStructures = "SELECT * FROM salary_structures";
$resultSalaryStructures = $conn->query($sqlSalaryStructures);

$sqlAttendance = "SELECT * FROM attendance";
$resultAttendance = $conn->query($sqlAttendance);

$sqlLeaveRequests = "SELECT * FROM leave_requests";
$resultLeaveRequests = $conn->query($sqlLeaveRequests);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand text-danger" href="#">ADMIN</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a href="manage_salary_structures.php" class="btn btn-primary">Manage Salary</a>        <li class="nav-item">
        <a href="manage_employees.php" class="btn btn-primary mx-5">Manage Employees</a>        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Admin Dashboard</h2>
        
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="manage_employees.php" class="list-group-item list-group-item-action">Manage Employees</a>
                    <a href="add_salary_structure.php" class="list-group-item list-group-item-action">Manage Salary Structures</a>
                    <a href="mark_attendance.php" class="list-group-item list-group-item-action">Manage Attendance</a>
                    <a href="manage_leave_requests.php" class="list-group-item list-group-item-action">Manage Leave Requests</a>
                    <a href="process_payroll.php" class="list-group-item list-group-item-action">Process Payroll</a>
                    <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Employees
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Employee Information</h5>
                        <a href="add_employee.php" class="btn btn-success mb-3">Add Employee</a>
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
                                <?php while ($row = $resultEmployees->fetch_assoc()): ?>
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
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        Salary Structures
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Salary Structures</h5>
                        <a href="add_salary_structure.php" class="btn btn-success mb-3">Add Salary Structure</a>
                        <a href="manage_pay_scales.php" class="btn btn-primary mb-3">Manage Pay Scales</a>
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
                                <?php while ($row = $resultSalaryStructures->fetch_assoc()): ?>
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
                    </div>
                </div>
                
                <!-- Additional sections for attendance, leave requests, payroll processing, etc. -->
                
            </div>
        </div>
        
    </div>
</body>
</html>
<!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a href="manage_salary_structures.php" class="btn btn-primary">Manage Salary</a>        </li>
        <li class="nav-item">
<a href="manage_employees.php" class="btn btn-primary">Manage Employees</a>        </li>
        
      </ul> -->
