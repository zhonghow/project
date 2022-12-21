<?php

session_start();

require "functions/authentication.php";
require "functions/function.php";

?>

<?php
require "templates/header.php";
?>

<div class="container">
    <header class="auth p-3 mt-5 d-flex justify-content-between align-items-center">
        <a href="/" class="m-0"><i class="bi bi-window pe-2"></i>Forums</a>
        <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
            <div>

                <?php if (isLoggedIn()) : ?>
                    <?= "Welcome, *User* *Badge*"  ?>
                    <a href="logout.php" class="ms-3 btn btn-danger m-0">Log Out <i class="bi bi-person-fill-x"></i></a>
                <?php endif ?>

                <?php if (!isLoggedIn()) : ?>
                    <a href="login.php" class="btn btn-success m-0">Log In <i class="bi bi-person-fill"></i></a>
                    <a href="signup.php" class="btn btn-success m-0">Sign Up <i class="bi bi-person-fill-add"></i></a>

                <?php endif ?>

            </div>
        </form>
    </header>

</div>

</div>

<?php
require "templates/footer.php";
?>