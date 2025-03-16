<?php
    session_start();
    if(!isset($_SESSION['officerid'])){
        header('location: ../login.php');
        exit();
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Officer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center py-3">Welcome Officer</h1>
    <div class="text-center">
        <button class="btn btn-primary" onclick="location.href='viewcomplaint.php'">View Complaints</button>
    </div>
</body>
</html>
