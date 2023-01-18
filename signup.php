<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
    $oras = $_POST['oras'];
	$adress = $_POST['adress'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($phone) && !empty($email) && !empty($oras) && !empty($adress)){
        // $user_id = random_num(20);
        $query = "insert into users_table (user_name,phone,email,city,adress,password) values ('$user_name','$phone', '$email','$oras', '$adress','$password')";
        mysqli_query($con, $query);

			header("Location: login.php");
			die;
    }else{
		echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-US-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="login.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div id="box">
        <form method="post">
            <div class="login" style="font-size:20px; ">Sign Up</div><br>
            <label class="label" for="user_name" style="color: black; ">Nume:</label><br>
            <input type="text" name="user_name" required><br><br>
            <label class="label" for="phone" style="color: black;  ">Telefon:</label><br>
            <input type="phone" name="phone" required><br><br>
            <label class="label" for="email" style="color: black; ">Email:</label><br>
            <input type="email" name="email" required><br><br>
            <label class="label" for="oras" style="color: black; ">Oras:</label><br>
            <input type="text" name="oras" required><br><br>
            <label class="label" for="adress" style="color: black; ">Adresa:</label><br>
            <input type="text" name="adress" required><br><br>
            <label class="label" for="password" style="color: black; ">Parola:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Sign Up"><br><br>
            <a class="login" href="login.php" style="margin:35%">Click pentru Login</a><br><br>
        </form>
    </div>
</body>

</html>