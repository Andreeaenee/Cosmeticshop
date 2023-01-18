<?php
   include("connection.php");
   ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-US-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="login.css" rel="stylesheet">
</head>

<body>
    <?php

function introduction($con){
	if(isset($_SESSION['user_id'])){
		$id = $_SESSION['user_id'];
		$query = "select * from users_table where user_id = '$id' limit 1";
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);?>


    <div class="wellcome" style="float:right;  margin-right: 20px;">
        <p>Welcome <?php echo $row['user_name'];        ?>
            <a id="logout" href="logout.php"
                style="padding: 14px 16px; text-decoration: none; font-size: 17px; color:black; text-decoration:underline 3px solid white ">Logout</a>
        </p>
    </div>
</body>

</html>
<?php
		}
	}
}


function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users_table where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}


// Calculeaza 15% reducere din pretul original
function bestPrice($price){
	$best_price = (85 / 100)* $price;
	return round($best_price, 2);
}

//Adaugarea unui produs in cos

// function add_to_cart($productID, $userID, $cantitate)
// {
// 	$db = mysqli_connect('localhost', 'root', '', 'cosmetic_catalog');

//     // Prepare SQL statement to update the cart
// 	$status = 0;
//     $query = "insert into cart (user_id,product_id,cantitate,STATUS) VALUES ('$userID', '$productID', '$cantitate', '$status')";
// 	// mysqli_query($conn2, $sql);
// 	if(!$result = $db->query($query)){
//         die('There was an error running the query [' . $db->error . ']');
//     }
// 	// header("Location: cart.php");
// 	die;
    
// }

function schimba_cantitate($productID, $cantitate){
	$db = mysqli_connect('localhost', 'root', '', 'cosmetic_catalog');

	$query = "update product set cantitate='$cantitate' wherehere  product_id = $productID";
	if(!$result = $db->query($query)){
        die('There was an error running the query [' . $db->error . ']');
    }
	header("Location: cart.php");
	die;
    
}

function productPriceperQ($p, $q){
	return $p * $q;
}

function function1($total_cost){
	   
$conn = mysqli_connect("localhost", "root", "", "cosmetic_catalog");
$user_id = $_SESSION['user_id'];
// Retrieve user's data
$sql = "select * from users_table u 
		join cart c on u.user_id = c.user_id
		join product p on c.product_id = p.id  
		WHERE u.user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Construct email message body
$message = 
"Confirmarea comenzii:
Nume: {$user['user_name']}
Ai completat urmatoarea comanda in valoare de $total_cost.
Comanda va fi livrata in urmatoarele 5 zile
Orasul:{$user['city']}
Adresa:{$user['adress']}
Verificati,
Your Website: MyKSecret.ro";

// Send email
$to = $user['email'];
$subject = "User Details";
$headers = "From: myksecret9@gmail.com";

 $bool = mail($to, $subject, $message, $headers);

if ($bool){
    // echo $succes;
    echo '<script>alert("Cumparatura reusita!")</script>';
}
else {
    echo '<script>alert("Ceva nu a mers bine!Incercati din nou")</script>' ;
}
           
}

?>