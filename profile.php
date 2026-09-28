<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Using read to update php</title>
</head>
<body>

<table border="1" >
   <tr>
      <th>id</th>
      <th>email</th>
      <th>password</th>
   </tr>

   <?php
   include("config.php");

   $read = $connect->query("SELECT * FROM contact");

   while ($row = $read->fetch_assoc()) {
   ?>
      <tr>
         <td><?= $row["id"] ?></td>
         <td><?= $row["email"] ?></td>
         <td><?= $row["password"] ?></td>
          <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
          </td>
     </tr>
   <?php
   }
   ?>
</table>
  </body>
</html>