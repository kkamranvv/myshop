<?php

require 'database.php';

$sql = "SELECT * FROM clients";
$result = $connection->query($sql);

while($row = $result->fetch_assoc()) {
  echo $row['name'];
}