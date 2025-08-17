<!-- <

$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

$connection = new mysqli($servername, $username, $password, $database);

if($connection->connect_error) {
  die("Chyba :" . $connection->connect_error);
 } -->

<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

