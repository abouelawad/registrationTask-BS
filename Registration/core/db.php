<?php



// Create connection
$conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

function getOne(string $table, string $where)
{
  global $conn;

  $sql = "SELECT * FROM $table WHERE $where LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    return (mysqli_fetch_assoc($result));
  } else {
    return [];
  }
  mysqli_close($conn);
}


function getAll(string $table): array
{
  global $conn;
  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    return (mysqli_fetch_all($result, MYSQLI_ASSOC));
  } else {
    return [];
  }

  mysqli_close($conn);
}

function insert(string $table, string $data): bool
{
  global $conn;
  $sql = "INSERT INTO $table $data";
  if (mysqli_query($conn, $sql)) {
    return True;
  } else {
    return False;
  }

  mysqli_close($conn);
}

function insertData(string $table, array $data): bool
{
  global $conn;
  $keys = '';
  $values = '';
  foreach ($data as $key => $value) {
    $keys .= $key . ',';                // "$keys,"
    $values .= '\'' . $value . '\',';      // "'$value',"
  }
  $keys = rtrim($keys, ',');
  $values = rtrim($values, ',');

  // echo $keys . "|" . $values ; 
  $sql = " INSERT INTO $table  ($keys) VALUES ($values)";
  // echo $sql ;
  if (mysqli_query($conn, $sql)) {
    return True;
  } else {
    return False;
  }

  mysqli_close($conn);
}

function update(string $table, array $data, string $where): bool
{
  global $conn;
  $set = '';
  foreach ($data as $key => $value) {
    $set .= "$key = '$value',";
  }
  // echo $set . '<br />';
  $set = rtrim($set, ',');

  // echo $set . '<br />';

  //UPDATE MyGuests SET lastname='Doe' WHERE id=2
  $sql = " UPDATE $table SET $set WHERE $where";
  // echo $sql ;
  if (mysqli_query($conn, $sql)) {
    return True;
  } else {
    return False;
  }

  mysqli_close($conn);
}

function delete(string $table, string $where)
{
  global $conn;
  $sql = "DELETE FROM $table WHERE $where LIMIT 1";

  return mysqli_query($conn, $sql);
  mysqli_close($conn);
}
