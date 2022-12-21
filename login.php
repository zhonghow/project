<?php

session_start();

require "functions/authentication.php";
require "functions/function.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new Authentication();
    $message = $auth->login(
        $email,
        $password
    );
}

if ( 
    isset( $_GET["status"] ) && 
    $_GET["status"] == 'registered' ) {
    $message = "Successfully registered. Please sign into your account to start posting";
}

?>

<?php
require "templates/header.php";
?>


<div class="login container d-flex flex-column justify-content-center align-items-center">
    <!-- login form -->
    <div class="card rounded shadow-sm mx-auto">
        <div class="card-body p-3">
            <h5 class="card-title text-center mb-3 py-3 border-bottom">
                Login To Your Account
            </h5>

            <?php require "templates/error_alert.php"; ?>

            <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-fu">
                        Login <i class="bi bi-person-fill"></i>
                    </button>
                    <a href="index.php" class="btn btn-danger mt-2">Go Back <i class="bi bi-house-fill"></i></a>
                </div>
            </form>
        </div>
    </div>

    <!-- links -->
    <div class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-1">
        <a href="signup.php" class="text-decoration-none small text-black">Don't have an account? Sign up here
        </a>
    </div>

</div>

<?php
require "templates/footer.php";
?>