<?php

require 'common.php';

// Step 0: Validate the incoming data
// This code doesn't do that, but should ...
// For example, if the date is empty or bad, this insert fails.

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'INSERT INTO people (firstName, lastName, position, gender, email, address, dateofBirth, primaryNumber, secondaryNumber, isActive, radioNumber, stationNumber)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

$stmt->execute([
  $_POST['firstName'],
  $_POST['lastName'],
  $_POST['position'],
  $_POST['gender'],
  $_POST['email'],
  $_POST['address'],
  $_POST['dateofBirth'],
  $_POST['primaryNumber'],
  $_POST['secondaryNumber'],
  $_POST['isActive'],
  $_POST['radioNumber'],
  $_POST['stationNumber']
]);

// If needed, get auto-generated PK from DB
// $pk = $db->lastInsertId();  // https://www.php.net/manual/en/pdo.lastinsertid.php

// Step 4: Output
// Here, instead of giving output, I'm redirecting to the SELECT API,
// just in case the data changed by entering it
header('HTTP/1.1 303 See Other');
header('Location: ../members/get.php');

?>
