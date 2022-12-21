<?php

session_start();

require "functions/function.php";

if (isLoggedIn()) {
    logOut();
    header('Location:/login.php');
    exit;
} else {
    header('Location: /login.php');
    exit;
}
