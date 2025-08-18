<?php
require_once 'includes/database.php';

// Получаем ID клиента из URL
$client_id = $_GET['id'] ?? null;

if (!$client_id) {
    echo "Client ID not specified.";
    exit;
}

// Берем заказы только этого клиента
$stmt = $pdo->prepare("SELECT * FROM orders WHERE client_id = :client_id");
$stmt->execute([':client_id' => $client_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Берем имя клиента (для заголовка)
$stmtClient = $pdo->prepare("SELECT name FROM clients WHERE id = :id");
$stmtClient->execute([':id' => $client_id]);
$client = $stmtClient->fetch(PDO::FETCH_ASSOC);
$clientName = $client['name'] ?? 'Unknown Client';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders of <?= htmlspecialchars($clientName) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
      <h2>Orders of <?= htmlspecialchars($clientName) ?></h2>
      <a class="btn btn-secondary mb-3" href="/myshop/index.php">Back to Clients</a>
      <table class="table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product Name</th>
              <th>Amount</th>
              <th>Order Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($orders) : ?>
                <?php foreach($orders as $order) : ?>
                    <tr>
                        <td><?= htmlspecialchars($order['order_id']) ?></td>
                        <td><?= htmlspecialchars($order['product_name']) ?></td>
                        <td><?= htmlspecialchars($order['amount']) ?></td>
                        <td><?= htmlspecialchars($order['order_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr><td colspan="4">No orders found for this client.</td></tr>
            <?php endif; ?>
          </tbody>
      </table>
  </div>
</body>
</html>
