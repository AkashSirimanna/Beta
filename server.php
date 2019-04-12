<?php
$database = mysqli_connect('localhost','root','','persona') or die("could not connect to database");

$username = "";
$password = "";

$errors = array();


//Registration
if (isset($_POST['register_btn'])){
	session_start();

	//Registration
	$username = mysqli_real_escape_string($database,$_POST['username']);
	$password1 = mysqli_real_escape_string($database,$_POST['password1']);
	$password2 = mysqli_real_escape_string($database,$_POST['password2']);
	$email = mysqli_real_escape_string($database,$_POST['email']);

	//push to errors array if any field is empty or passwords dont match
	if(empty($username) || empty($email) || empty($password1)){
		echo "Fields are empty";
		echo "<br>";
		array_push($errors, "ERROR");
	}

	if($password1 != $password2){
		echo "Passwords do not match";
		echo "<br>";
		array_push($errors, "ERROR");
	}

	//does the username already exist in the database
	$db_users = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";

	$results = mysqli_query($database,$db_users);
	$current_users = mysqli_fetch_assoc($results);

	if($current_users){
		if ($current_users['username'] === $username || $current_users['email'] === $email){
			echo "Username or Email Already Exists";
			echo "<br>";
			array_push($errors, "ERROR");
		}
	}

	if(count($errors) == 0){
	$password = md5($password1);
	$query = "INSERT INTO users(username,password,email) VALUES ('$username','$password','$email')";
	mysqli_query($database,$query);
	$_SESSION['username'] = $username;
	$_SESSION['loggedin'] = true;
	header('location: login.php');
	}
}

//Login
if (isset($_POST['login_btn'])){
	session_start();

	//Registration
	$username = mysqli_real_escape_string($database,$_POST['username']);
	$password = mysqli_real_escape_string($database,$_POST['password']);

	//push to errors array if any field is empty
	if(empty($username) || empty($password)){
		array_push($errors,"Username or password is empty");
	}

	if (count($errors) == 0){
		$password = md5($password);

		//does the username already exist in the database
		$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";

		$results = mysqli_query($database,$query);

		if(mysqli_num_rows($results)){
				$_SESSION['username'] = $username;
				$_SESSION['loggedin'] = true;
				header('location: index.php');
		}
		else{
			echo "Incorrect username and password combination";
		}
	}
	else{
    		echo "Username or password field is empty";
	}
}
?>