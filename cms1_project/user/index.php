<!-- <?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <?php include "../inc/header.php" ?>
        <h1 class="py-3 px-3">Welcome, to complaint system!</h1>
        <div class = "px-5">
            <button type="button" class="btn btn-primary" onclick="location.href='/student_complaint_system/user/complaint.php'">Make Complaint</button>
            <button type="button" class="btn btn-primary" onclick="location.href='/student_complaint_system/user/view.php'">View Complaint</button>
        </div>
    </body>
</html> -->






<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- <style>
        body {
            background-image: url('uschoice.jpg'); /* Adjust the image file name if needed */
            background-size: cover;
        }
    </style> -->
</head>
<body background="choice.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php include "../inc/header.php"; ?>
    <h1 class="py-3 px-3 text-center" style="margin-right: 300px;" >Raise Your Issue</h1>
    <div class="px-5">
        <div>
    <button type="submit" class="btn btn-primary mb-2" onclick="location.href='complaint.php'" style="margin-left: 500px;">Make Complaint</button>
</div>
<!-- Updated file path for View Complaint button -->
<div>
    <button type="button" class="btn btn-primary" onclick="location.href='view.php'" style="margin-left: 500px;">View Complaint</button>
</div>

    </div>
</body>
</html>



