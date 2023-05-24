<?php
$ini_array = parse_ini_file("secret.ini", true); //Gets creds from file not posted on github. If you would like to copy, use a format like this
# [STRINGS]
# DB_SERVER = server
# DB_USERNAME = username
# DB_PASSWORD = password
# DB_NAME = name
$DB_SERVER = $ini_array['STRINGS']['DB_SERVER'];
$DB_USERNAME = $ini_array['STRINGS']['DB_USERNAME'];
$DB_PASSWORD = $ini_array['STRINGS']['DB_PASSWORD'];
$DB_NAME = $ini_array['STRINGS']['DB_NAME'];
define("DB_SERVER", "$DB_SERVER");
define("DB_USERNAME", "$DB_USERNAME");
define("DB_PASSWORD", "$DB_PASSWORD");
define("DB_NAME", "$DB_NAME");

# Connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
