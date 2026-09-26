<?php 
session_start();
include 'config.php';
/** @var mysqli $mysqli */

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['pw']);

    if(empty($username)) {header("Location: login.php?status=username"); exit(0);}
    if(empty($password)) {header("Location: login.php?status=password"); exit(0);}

    $masuk = mysqli_query($mysqli, "SELECT * FROM admin WHERE username='$username' AND BINARY password='$password'");

    if ($akun = mysqli_fetch_assoc($masuk)) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $akun['username'];

        header("Location: index.php?status=welcome");
        exit(0);
    } else {
        header("Location: login.php?status=akun-tidak-ada");
        exit(0);
    }
} else {
    header("Location: index.php");
    exit(0);
}
?>