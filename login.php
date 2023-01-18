<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users_table where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result))
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-US-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="login.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div id="box">
        <form method="post">
            <div class="login" style="font-size:20px; ">Login</div><br>
            <label class="label" for="user_name" style="color: black;">Nume:</label><br>
            <input type="text" name="user_name" required><br><br>

            <label class="label" for="password" style="color: black; ">Parola:</label><br>
            <input type="password" name="password" required><br><br>


            <input type="submit" value="Login"><br><br>

            <a class="login" href="signup.php" style="margin:35%">Click pentru Signup</a><br><br>
        </form>
    </div>
</body>

</html>