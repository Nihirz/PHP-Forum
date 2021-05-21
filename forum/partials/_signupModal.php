<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //$exists=false;
    //chech the existing username
    $existSql = "SELECT * FROM `users`WHERE email ='$email'";
    $result =  mysqli_query($conn, $existSql);
    $numExistrows = mysqli_num_rows($result);
    if ($numExistrows > 0) {
        $showError = "Email already exists";
       // $exists = true;
    } else {
       // $exists = false;
            if (($password == $cpassword)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `email`, `password`, `dt`) VALUES ('$email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}
?>








<!-- Modal -->




<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">sign Up to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/_handleSignup.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="signupEmail" class="form-control" id="signupEmail" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                    </div>>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>