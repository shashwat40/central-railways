<?php
session_start();
$connection = mysqli_connect("localhost:3306","root","","central_railways");
if(!$connection) {	
    die('Could not connect : ' .mysqli_error());
}
if(!empty($_POST['username'])) {
    if(!empty($_POST['passwd'])) {
	$username = $_POST['username'];
	$password = $_POST['passwd'];
	$login_query = "SELECT username, password FROM users WHERE username = '$username'";
	$result = mysqli_query($connection, $login_query) or die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) === 0) {
            echo "Incorrect Username.";
        }
        else {
            if(password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header('Location: http://localhost/central_railways/webpages/user_dashboard.php');
            }
            else {
                echo "Incorrect Password.";
            }
        }
    }
    else {
        echo "Please enter password.";
    }
}
else {
    echo "Please enter username.";
}
mysqli_close($connection);
?>