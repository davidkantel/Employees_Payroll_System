<?php
session_start();
require_once('db_config.php');

// Check if user is logged in (example)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($employee = $result->fetch_assoc()) {
        $employee_id = $employee['id'];
        
        // Check if salary_structure_id exists
        if (isset($employee['salary_structure_id'])) {
            $salary_structure_id = $employee['salary_structure_id'];

            // Fetch salary structure details
            $sql_salary = "SELECT * FROM salary_structures WHERE id = $salary_structure_id";
            $result_salary = $conn->query($sql_salary);
            if ($result_salary->num_rows > 0) {
                $salary_structure = $result_salary->fetch_assoc();

                // Calculate gross pay based on salary structure
                $basic_pay = $salary_structure['basic_pay'];
                $allowances = $salary_structure['allowances'] ?? 0;
                $deductions = $salary_structure['deductions'] ?? 0;

                // Calculate net pay (example calculation)
                $net_pay = $basic_pay + $allowances - $deductions;

                // Example: Update employee salary details or generate payslip
                $sql_update = "UPDATE employees SET net_pay = $net_pay WHERE id = $employee_id";
                if ($conn->query($sql_update) !== TRUE) {
                    echo "Error updating salary details: " . $conn->error;
                }
            } else {
                echo "No salary structure found for employee ID: $employee_id";
            }
        } else {
            echo "Salary structure ID not defined for employee ID: $employee_id";
        }
    }
} else {
    echo "No employees found.";
}

// Redirect or display success message
header("Location: manage_payroll.php");
exit();
?>
