<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Shop</title>
</head>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "myshop";

  $connection = new mysqli($servername, $username, $password, $database);

  if ($connection->connect_error) {
    die("Chyba: " . $connection->connect_error);
  }

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    if (!empty($name) && !empty($email)) {
      $sql = "INSERT INTO clients (name, email, phone, address) 
      VALUES ('$name', '$email', '$phone', '$address')
      ";
      $result = $connection->query($sql);

      if($result === TRUE) {
        echo "Klient byl uspesne pridan";
      } else {
        echo "Chyba :" . $connection->error;
      }


    } else {
      echo "Name and Email are required";
    }
  }


  ?>
  <form method="POST">
  <div class="container">
    <div>
      <label for="">Name</label>
      <input type="text" name="name">
    </div>
    <div>
      <label for="">Email</label>
      <input type="text" name="email">
    </div>
    <div>
      <label for="">Phone</label>
      <input type="text" name="phone">
    </div>
    <div>
      <label for="">Address</label>
      <input type="text" name="address">
    </div>
    <button type="submit">Submit</button>
  </div>
  </form>
</body>
</html>

