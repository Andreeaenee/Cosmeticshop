<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cosmetic_catalog";

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("failed to connect!");
}
?>