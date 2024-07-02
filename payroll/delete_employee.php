<?php
session_start();
require_once('db_config.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get employee ID to delete
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $employee_id = $_GET['id'];

    // Delete dependent records from attendance table
    $delete_attendance_sql = "DELETE FROM attendance WHERE employee_id = $employee_id";
    if ($conn->query($delete_attendance_sql) === TRUE) {
        // Now delete the employee
        $delete_employee_sql = "DELETE FROM employees WHERE id = $employee_id";
        if ($conn->query($delete_employee_sql) === TRUE) {
            echo "Employee and associated attendance records deleted successfully";
        } else {
            echo "Error deleting employee: " . $conn->error;
        }
    } else {
        echo "Error deleting attendance records: " . $conn->error;
    }
} else {
    echo "Invalid employee ID";
}

// Close connection
$conn->close();
?>
