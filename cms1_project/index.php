<?php session_start();
 echo "Loaded index.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqYSDhgCecCxMW52nD2" crossorigin="anonymous">
</head>
<body background="img/bg.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <?php include "inc/header.php"; ?>

    <h1 class="text-center py-3 px-4" style="color: #000; text-align: left;">Student Grievance Portal</h1>

    <!-- Buttons section -->
    <div class="text-center mt-3">
        <!-- Login buttons -->
        <div class="mb-2">
            <button type="button" class="btn btn-primary me-2" onclick="location.href='login.php?role=student'">Student Login</button>
            <button type="button" class="btn btn-primary me-2" onclick="location.href='login.php?role=officer'">Officer Login</button>
            <button type="button" class="btn btn-primary me-2" onclick="location.href='login.php?role=admin'">Admin Login</button>
        </div>
        <!-- Register buttons -->
        <div>
            <button type="button" class="btn btn-primary me-2" onclick="location.href='register.php?role=student'">Student Register</button>
            <button type="button" class="btn btn-primary me-2" onclick="location.href='register.php?role=officer'">Officer Register</button>
            <button type="button" class="btn btn-primary me-2" onclick="location.href='register.php?role=admin'">Admin Register</button>
        </div>
    </div>

</body>
</html>
