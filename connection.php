<?php

// for localhost
$database = new mysqli("localhost", "root", "", "opto");
 if ($database->connect_error) {
     die("Connection failed:  " . $database->connect_error);
 }

//for webhost
// $database = new mysqli("localhost", "u128886969_opto", "123123Qq@", "u128886969_opto");
// if ($database->connect_error) {
//     die("Connection failed:  " . $database->connect_error);
// }

?>