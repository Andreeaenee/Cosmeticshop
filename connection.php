<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "cosmetic_catalog";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("faield to connect");
}