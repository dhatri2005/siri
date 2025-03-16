<?php  
  ob_start();
  session_start();
  include("inc/conn.php");  

  if($_SERVER["REQUEST_METHOD"] == "POST")  
  {  
      $email = $_POST['emailAddress'];  
      $password = $_POST['password'];  
    
      // Fetch user credentials
      $sql = "SELECT * FROM credentials WHERE email='$email' AND password='$password'";  
      $run = mysqli_query($conn, $sql);  

      if(mysqli_num_rows($run) > 0)  
      {
          $resUser = mysqli_fetch_assoc($run);
          $credId = $resUser['cred_id'];
          $userType = $resUser['usertype']; // Fetch user type
          
          // Debugging messages
          echo "User Type: " . $userType . "<br>";
          echo "Credential ID: " . $credId . "<br>";

          $_SESSION['email'] = $email;
          $_SESSION['credid'] = $credId;

          // Redirect based on user type
          if ($userType == 0 || $userType == 1) {
              // Student or staff
              $sql = "SELECT * FROM users WHERE cred_id='$credId'";
              $run = mysqli_query($conn, $sql);
              $result = mysqli_fetch_assoc($run);
              
              if ($result) {
                  $_SESSION['userid'] = $result['id'];
                  echo "User login successful. Redirecting...";
                  header('Location: user/index.php');
                  exit();
              } else {
                  die("⚠️ Error: User data not found in the database!");
              }
          } 
          else if ($userType == 2) {
              // Officer
              $sql = "SELECT * FROM officers WHERE cred_id='$credId'";
              $run = mysqli_query($conn, $sql);
              $result = mysqli_fetch_assoc($run);
              
              if ($result) {
                  $_SESSION['officerid'] = $result['id'];
                  echo "Officer login successful. Redirecting...";
                  header('Location: officer/index.php');
                  exit();
              } else {
                  die("⚠️ Error: Officer data not found in the database!");
              }
          } 
          else if ($userType == 3) {
              // Admin
              $sql = "SELECT * FROM admins WHERE cred_id='$credId'";
              $run = mysqli_query($conn, $sql);
              $result = mysqli_fetch_assoc($run);
              
              if ($result) {
                  $_SESSION['adminid'] = $result['id'];
                  echo "Admin login successful. Redirecting...";
                  header('Location: admin/index.php');
                  exit();
              } else {
                  die("⚠️ Error: Admin data not found in the database!");
              }
          } 
          else {
              echo "<script>alert('Invalid userType! userType must be between 0 and 3');</script>";
              header('Refresh: 2; URL=login.php');
              exit();
          }
      }  
      else  
      {  
          echo "<script>alert('Email or password is incorrect!');</script>";
          header('Refresh: 2; URL=login.php');
          exit();
      }  
  }

  ob_end_flush();
?>
