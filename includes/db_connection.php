
<?php
 define("DB_SERVER", "127.0.0.1");
 define("DB_USER", "root");
 define("DB_PASS", "rickpet");
 define("DB_NAME", "vintory");

// Create connection
  $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }
    echo "Connected successfully" . "<br />";
?>
