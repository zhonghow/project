<?php

session_start();

require "functions/function.php";
require "functions/authentication.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $auth = new Authentication();
    $message = $auth->signup(
        $email,
        $password,
        $confirm_password
    );
}

?>

<?php

require "templates/header.php";

?>

<div class="container signup d-flex flex-column justify-content-center align-items-center">
    <!-- sign up form -->
    <div class="card rounded shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-body p-3">
            <h5 class="card-title text-center mb-3 py-3 border-bottom">
                Sign Up a New Account
            </h5>

            <?php require "templates/error_alert.php"; ?>

            <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-fu">
                        Sign Up <i class="bi bi-person-fill-add"></i>
                    </button>
                    <a href="index.php" class="btn btn-danger mt-2">Go Back <i class="bi bi-house-fill"></i></a>
                </div>
            </form>
        </div>
    </div>

    <!-- links -->
    <div class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-1" style="max-width: 500px;">
        <a href="login.php" class="text-decoration-none small text-black">Already have an account? Login here
            </a>
    </div>
</div>

<?php

require "templates/footer.php";

?>