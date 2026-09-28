<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "admin") {
    header("Location: admin_dashboard.php");
    exit();
}
?>

<h1>Welcome Admin</h1>
<p>You have full control over the system.</p>

<a href="logout.php">Logout</a>