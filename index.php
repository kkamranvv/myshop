<?php
require_once 'includes/database.php'; 

$sql = "SELECT * FROM clients";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Shop</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
      <h2>List Of Clients</h2>
      <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
      <br><br>
      <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
              <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['address']) ?></td>
                <td><?= htmlspecialchars($row['created_at']) ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/myshop/edit.php?id=<?= htmlspecialchars($row['id']) ?>">Edit</a>
                  <a class="btn btn-danger btn-sm" href="/myshop/delete.php?id=<?= htmlspecialchars($row['id']) ?>">Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
      </table>
  </div>
</body>
</html>
