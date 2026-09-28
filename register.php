<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $connect->prepare("INSERT INTO register (username,password) VALUES (?,?)");
    $stmt->bind_param("ss",$username,$password);

    if($stmt->execute()) {
        echo "Registered!";
        header("Location: login.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>

<!-- BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 450px;">

        <h3 class="text-center mb-3">Create Account</h3>
        <p class="text-center text-muted">Register to continue</p>

        <?php if (!empty($error)) : ?>
        <div class="alert alert-danger text-center">
            <?= $error ?>
        </div>
        <?php endif; ?>

    <form method="POST">

    <div class="mb-3">
        <label class="form-label">Email / Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter email or username" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
    </div>

    <!-- NEW USER/ADMIN ROLE SELECTION -->
    <div class="mb-3">
        <label class="form-label">Select Account Type</label>
        <select name="role" class="form-select" required>
            <option value="">-- Choose Account Type --</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary w-100">Register</button>

     <div class="text-center mt-3">
            <a href="login.php" class="text-decoration-none">Already have account Log in</a>
        </div>

</form>