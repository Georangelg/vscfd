<?php
$server = "172.43.1.124";
$username = "admin_scfd";
$password = "pr3supu3st0";
$database = "scfd";
 
// Create connection
$conni = new mysqli($server, $username, $password, $database);
// Check connection
if ($conni->connect_error) {
    die("Connection failed: " . $conni->connect_error);
} 
?>