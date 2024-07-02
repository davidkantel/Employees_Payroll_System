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

    // Fetch pay scale details from database
    $sql = "SELECT * FROM pay_scales WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Pay scale not found";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $min_salary = $_POST['min_salary'];
    $max_salary = $_POST['max_salary'];
    $description = $_POST['description'];

    // Update pay scale in database
    $sql = "UPDATE pay_scales SET name='$name', min_salary='$min_salary', max_salary='$max_salary', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_pay_scales.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pay Scale</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Pay Scale</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Min Salary:</label>
                        <input type="number" name="min_salary" class="form-control" value="<?php echo $row['min_salary']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Max Salary:</label>
                        <input type="number" name="max_salary" class="form-control" value="<?php echo $row['max_salary']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control"><?php echo $row['description']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Pay Scale</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
