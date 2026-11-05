<?php include('header.inc'); ?>

<h2>User Login</h2>

<?php 
if (isset($_GET['error'])) {
    echo '<p style="color:red;">Invalid username or password. Please try again.</p>';
}
?>

<form action="process.php" method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="hidden" name="token" value="MKSWS02154">

    <input type="submit" value="Login">
</form>

<?php include('footer.inc'); ?>