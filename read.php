<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard - Users</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
   <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link text-white" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Settings</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="logout.php">Logout</a></li>
         </ul>
      </div>
   </div>
</nav>

<!-- Main container -->
<div class="container py-5">

   <h2 class="fw-bold mb-4 text-center">Registered Users</h2>

   <div class="card shadow-sm">
      <div class="card-body">

         <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover align-middle">
               <thead class="table-dark">
                  <tr>
                     <th>ID</th>
                     <th>Password</th>
                     <th>Username</th>
                     <th>Created At</th>
                     <th>Role</th>
                     <th>Actions</th>
                  </tr>
               </thead>

               <tbody>
               <?php
                  include("config.php");
                  $read = $connect->query("SELECT * FROM register");

                  while ($row = $read->fetch_assoc()) {
               ?>
                  <tr>
                     <td><?= $row["id"] ?></td>
                     <td><?= $row["password"] ?></td>
                     <td><?= $row["username"] ?></td>
                     <td><?= $row["created_at"] ?></td>
                     <td><?= $row["role"] ?></td>

                     <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>"
                           onclick="return confirm('Are you sure?')"
                           class="btn btn-sm btn-danger">Delete</a>
                     </td>
                  </tr>
               <?php } ?>
               </tbody>

            </table>
         </div>

      </div>
   </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
