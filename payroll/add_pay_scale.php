<?php
session_start();
require_once('db_config.php');

// Check if user is logged in (example)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $min_salary = $_POST['min_salary'];
    $max_salary = $_POST['max_salary'];
    $description = $_POST['description']; // Ensure this matches your form field name

    // Insert into database
    $sql = "INSERT INTO pay_scales (name, min_salary, max_salary, description) VALUES ('$name', '$min_salary', '$max_salary', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_pay_scales.php");
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
    <title>Add Pay Scale</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Pay Scale</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Min Salary:</label>
                        <input type="number" name="min_salary" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Max Salary:</label>
                        <input type="number" name="max_salary" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Pay Scale</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
