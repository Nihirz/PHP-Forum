<?php
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEail'];
    $pass = $_POST['LoginPass'];

    $sql = "select * from users where user_email='$email'";
    $result = mysqli_query($conn,$sql);

    $numRows = mysqli_num_rows($result);
    if ($numRows==1) {
      $row = mysqli_fetch_assoc($result);
          if (password_verify($pass,$row['user_pass'])) {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['useremail'] = $email;
              echo "loggedin".$email;
          }      
            header("Location:/forum/index.php");        
      
    }
    header("Location:/forum/index.php");  
}