<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<?php include('header.inc'); ?>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
<p>You have successfully logged into the system.</p>
<p><a href="login.php">Log out</a></p>

<?php include('footer.inc'); ?>