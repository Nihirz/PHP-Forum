<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];
        // $sql = "select * from users where username='$username' AND password='$password' ";
        $sql = "select * from users where email='$email' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if (password_verify($password,$row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                }
                else{
                    $showError = "Invalid crendentional";
                }
            }
            
        }
    else{
        $showError = "Invalid crendentional";
    }
}
?>









<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">log in to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/_handleLogin.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginEail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEail" name="loginEail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="LoginPass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="LoginPass" name="LoginPass">
                    </div>>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>