<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<h1>Welcome to your dashboard</h2>
<a href="logout.php">Logout</a>