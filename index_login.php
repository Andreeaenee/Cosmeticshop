<?php 
session_start();
//    $_SESSION;
   include("connection.php");
   include("functions.php");

   $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-US-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyKSecret</title>
    <link href="login.css" rel="stylesheet">
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Index page</h1>
    <br>
    Hello!
</body>

</html>