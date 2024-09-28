<?php


// # connection by mySQLi procedural

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = 'company';

// #Create connection
// $conn = mysqli_connect($servername, $username, $password,$database);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO users (name, email, password)
// VALUES ('one', 'a@a.com', '1234567')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }



// $conn->close();



# connect using PDO
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = 'company';

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "INSERT INTO users (name, email, password)
//           VALUES ('two', 'b@a.com', '123456')";
//   // use exec() because no results are returned
//   $conn->exec($sql);
//   echo "New record created successfully";
// } catch(PDOException $e) {
//   echo $sql . "<br>" . $e->getMessage();
// }

// $conn = null;
