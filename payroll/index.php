<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand text-danger" href="#">PayRoll-System</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a href="login.php" class="btn btn-primary mx-2">Login</a>        </li>
        <li class="nav-item">
<a href="register.php" class="btn btn-warning mx-2">Register</a>        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <h4 class="text-center text-success my-5">Welcome to Payroll System</h4>
        <div class="row  my-5">
            <div class="col py-2">
                <h4 class="text-warning text-center p-2 my-2">St Mercy Payroll System</h4>
                <p>
                Payroll System, designed to streamline payroll management and enhance employee satisfaction.
                At this company, we are committed to providing accurate, efficient, and transparent payroll services to empower our employees and enhance organizational efficiency.
                </p>

                <a href="register.php"><button class="btn btn-success my-5">Get Started>>></button></a>



            
            
           
        </div>
        <div class="col">
                <img src="https://media.istockphoto.com/id/690719352/photo/payroll-businessman-working-financial-accounting-concept.webp?b=1&s=170667a&w=0&k=20&c=99LSYWjdVqELZNJ2G8ocmVbuOsQiLcRF8ZXV-NDRcL0=" alt="">
            </div>
       
    </div>

    <footer class="bg-light w-100 p-5 mb-0">
        <p class="text-center text-danger">&copy; All Right Reserved 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
