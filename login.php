<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user info including role
    $stmt = $connect->prepare("SELECT id, password, role FROM register WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {

        $stmt->bind_result($id, $hashed, $role);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed)) {

            // Save session
            $_SESSION['user_id'] = $id;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === "admin") {
                header("Location: read.php");
            } else {
                header("Location: index.php");
            }
            exit;

        } else {
            echo "Invalid Password.";
        }

    } else {
        echo "Invalid Username.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<!-- BOOTSTRAP 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card shadow p-4" style="width: 380px;">
        <h3 class="text-center mb-3">Login</h3>

        <?php if (!empty($error)) : ?>
        <div class="alert alert-danger text-center">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Username / Email</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <!-- NEW ROLE DROPDOWN -->
            <div class="mb-3">
                <label class="form-label">Select Role</label>
                <select name="role" class="form-select" required>
                    <option value="">-- Choose Role --</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

        </form>

        <div class="text-center mt-3">
            <a href="forgot_password.php" class="text-decoration-none">Forgot Password?</a>
        </div>
    </div>
</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>