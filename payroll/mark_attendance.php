<?php
session_start();
require_once('db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $attendance_date = $_POST['attendance_date'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO attendance (employee_id, attendance_date, status, remarks) VALUES ('$employee_id', '$attendance_date', '$status', '$remarks')";

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
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Mark Attendance</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <?php
                            // Fetch employees
                            $sql = "SELECT id, name FROM employees";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="attendance_date">Date</label>
                        <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Mark Attendance</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
