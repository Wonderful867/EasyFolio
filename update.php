<?php
include 'config.php';

$id = $_GET["id"];
$result = $connect -> query("SELECT* FROM register WHERE id =$id");
$user = $result ->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $created_at = $_POST['created_at'];
    $role = $_POST['role'];

    $connect ->query("UPDATE register SET username='$username',password='$password', created_at='created_at',role='$role' WHERE id=$id");
    header("Location: read.php");
    exit();
}
?>

<?php
include 'config.php';

$id = $_GET["id"];
$result = $connect -> query("SELECT* FROM contact WHERE id =$id");
$user = $result ->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name= $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $connect ->query("UPDATE contact SET name='$name', email='$email',address='$address',password='$password' WHERE id=$id");
    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit User</title>

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
   <div class="row justify-content-center">
      <div class="col-md-6">

         <div class="card shadow">
            <div class="card-header bg-primary text-white">
               <h4 class="mb-0">Edit User</h4>
            </div>

            <div class="card-body">

               <form method="post">

                  <div class="mb-3">
                     <label class="form-label">Username</label>
                     <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required>
                  </div>

                  <div class="mb-3">
                     <label class="form-label">Password</label>
                     <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control" required>
                  </div>

                  <div class="mb-3">
                     <label class="form-label">Created At</label>
                     <input type="text" name="created_at" value="<?= $user['created_at'] ?>" class="form-control" required>
                  </div>

                  <div class="mb-3">
                     <label class="form-label">Role</label>
                     <input type="text" name="role" value="<?= $user['role'] ?>" class="form-control" required>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Update</button>

               </form>

            </div>

            <div class="card-footer text-center">
               <a href="read.php" class="btn btn-secondary w-100">Back</a>
            </div>

         </div>

      </div>
   </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

   <a href="read.php">Back</a>
</html> 