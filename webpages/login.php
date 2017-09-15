<?php

$connection = mysqli_connect("localhost:3306","root","","central_railways");
if(!$connection) {	
	die('Could not connect : ' .msqli_error());
}

if(!empty($_POST['username'])) {
	if(!empty($_POST['passwd'])) {
		$username = $_POST['username'];
		$password = $_POST['passwd'];
		$login_query = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($connection, $login_query) or die(mysqli_error($connection));
		if(mysqli_num_rows($result) === 0)
			echo "Either Username or Password is incorrect.";
		else
			echo "Login successful.";
	}
	else
		echo "Please enter password.";
}
else
	echo "Please enter username.";
?>