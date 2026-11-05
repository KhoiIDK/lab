<?php
session_start();

$correct_user = 'Vo Minh Khoi'; 
$correct_pass = 'SWS02154'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $correct_user && $password === $correct_pass) {
        $_SESSION['user'] = $username;
        header('Location: welcome.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>