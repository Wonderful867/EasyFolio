<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));
    $expires = date("Y-m-d H:i:s", time() + 3600); // 1 hour

    $stmt = $connect->prepare("UPDATE member SET reset_token = ?, reset_token_expires = ? WHERE username");
    $stmt->bind_param("sss",$token,$expires,$email);
    $stmt->execute();

    $resetlink = "http://yourdomain.com/reset_password.php?token=$token";
    echo "Reset link (for testing): <a href='$resetlink'>$resetlink</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Reset Password</title>

<!-- BOOTSTRAP 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
        
        <h3 class="text-center mb-3">Reset Password</h3>
        <p class="text-center text-muted">Enter your email to receive a reset link</p>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your registered email" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>

        </form>

    </div>
</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>