<?php
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    //check whether this email exist
    $existSql = "select * from `users` where user_email='$user_email'";
    $reasult = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($reasult);
    if ($numRows>0) {
      $showError = "Email Already in use";
    }
    else{
        if ($pass == $cpass) {
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `user_email`, `user_password`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $reasult = mysqli_query($conn,$sql);
            if ($reasult) {
                $showAlert = true;
                header("Location:/forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Password Do not match";
            
        }
    }
    //header("Location:/forum/index.php?signupsuccess=false$showError");


}

?>