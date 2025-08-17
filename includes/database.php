<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

$connection = new mysqli($servername, $username, $password, $database);

if($connection->connect_error) {
  die("Chyba :" . $connection->connect_error);
}