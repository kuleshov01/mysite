<?php

if (!isset($_SESSION)) {
    session_start();
}
$connfile = '../config/dbconnection.php';
if (file_exists($connfile)) {
    require '../config/dbconnection.php';
    require 'Autoload.php';

    $login = new UserClass();
    $check = new CheckValidUser();
    $level = new AccessLevel();
} else {
    header('Location: ../installer/install.php');
    exit();
}
if ($login->isLoggedIn() === true) {

    header('Location: dashboard.php');
    exit();
} else {
    header('Location: ' . $base . 'signin/login.php');
    exit();
}
?>