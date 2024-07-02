<?php
session_start();
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $basic_pay = $_POST['basic_pay'];
    $allowances = $_POST['allowances'];
    $deductions = $_POST['deductions'];

    $sql = "INSERT INTO salary_structures (name, basic_pay, allowances, deductions) VALUES ('$name', '$basic_pay', '$allowances', '$deductions')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Salary Structure</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Salary Structure</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="basic_pay">Basic Pay</label>
                        <input type="text" class="form-control" id="basic_pay" name="basic_pay" required>
                    </div>
                    <div class="form-group">
                        <label for="allowances">Allowances</label>
                        <input type="text" class="form-control" id="allowances" name="allowances">
                    </div>
                    <div class="form-group">
                        <label for="deductions">Deductions</label>
                        <input type="text" class="form-control" id="deductions" name="deductions">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Salary Structure</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
