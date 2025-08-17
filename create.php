<?php
require_once 'includes/database.php';

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $phone = $_POST["phone"] ?? '';
    $address = $_POST["address"] ?? '';

    if (!empty($name) && !empty($email)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO clients (name, email, phone, address) VALUES (:name, :email, :phone, :address)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':address' => $address
            ]);
            $successMessage = "Client added successfully!";
        } catch (PDOException $e) {
            $errorMessage = "Error: " . $e->getMessage();
        }
    } else {
        $errorMessage = "Name and Email are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Shop - Add Client</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
      <h2>New Client</h2>

      <?php if (!empty($errorMessage)) : ?>
        <div class="alert alert-danger"><?= $errorMessage ?></div>
      <?php endif; ?>

      <?php if (!empty($successMessage)) : ?>
        <div class="alert alert-success"><?= $successMessage ?></div>
      <?php endif; ?>

      <form method="POST">
          <div class="mb-3">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($name ?? '') ?>">
          </div>
          <div class="mb-3">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="<?= htmlspecialchars($email ?? '') ?>">
          </div>
          <div class="mb-3">
              <label>Phone</label>
              <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($phone ?? '') ?>">
          </div>
          <div class="mb-3">
              <label>Address</label>
              <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($address ?? '') ?>">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/myshop/index.php" class="btn btn-secondary">Cancel</a>
      </form>
  </div>
</body>
</html>
<<<<<<< HEAD

=======
>>>>>>> 85b3a62 (Refactor: switch database access to PDO)
