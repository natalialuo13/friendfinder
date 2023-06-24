<?php

// Establish a connection to the database
$conn = mysqli_connect("localhost", "id20825700_root", "Natalia@1303", "id20825700_friendfinder");

// Check if the connection was successful
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
