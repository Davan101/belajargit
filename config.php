<?php

$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "Trinix@123";
$port = 3306;
$db_name = "my_login";

try {    

$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
}
catch(PDOException $e) {
    
    die("Terjadi masalah: " . $e->getMessage());
}
