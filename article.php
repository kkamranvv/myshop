<?php

require '/includes/database.php';

if (isset($_GET['id']) &&  is_numeric($_GET['id'])) {

$sql = "SELECT * 
        FROM clients 
        WHERE id = " . $_GET['id'];

$result = $connection->query($sql);

while($row = $result->fetch_assoc()) {
  echo $row['name'];
}

} else {
  $result = null;
}