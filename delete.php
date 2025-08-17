<?php
require_once 'includes/database.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    try {
        // Delete order/orders
        $stmtOrders = $pdo->prepare("DELETE FROM orders WHERE client_id = :id");
        $stmtOrders->execute([':id' => $id]);

        // Delete client
        $stmtClient = $pdo->prepare("DELETE FROM clients WHERE id = :id");
        $stmtClient->execute([':id' => $id]);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

header("location: /myshop/index.php");
exit;