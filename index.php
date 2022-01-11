<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form action="main.php" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="lname">mail:</label><br>
    <input type="text" id="mail" name="mail"><br>
    <br>
    <input type="submit" value="Submit">
  </form>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn = new PDO("mysql:host=$servername;dbname=khizanishvili", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $conn->prepare("SELECT * FROM myguests");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $data = $stmt->fetchAll();

  foreach ($data as $k) {
    foreach ($k as $value) {
      echo $value, " ";
    }
    echo "<br>";
  }
  ?>
</body>

</html>