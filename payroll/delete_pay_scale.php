<?php
session_start();
require_once('db_config.php');

// Check if user is logged in (example)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete pay scale from database
    $sql = "DELETE FROM pay_scales WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_pay_scales.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
