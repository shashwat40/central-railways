<?php
$username = $_POST['username'];
$password = $_POST['passwd'];
$connection = mysqli_connect("localhost:3306", $username, $password,"central_railways");
session_start();
if(!$connection) {	
    die('Could not connect : ' .mysqli_error());
}
if(!empty($_POST['username'])) {
    if(!empty($_POST['passwd'])) {
        $_SESSION['username'] = $username;
        $_SESSION['passwd'] = $password;
	echo "<script type='text/javascript'> alert('Login successful'); </script>";
        if($username == 'cradmin') {
            header('Location: http://localhost/central_railways/webpages/admin_dashboard.php');
        }
        else {
            header('Location: http://localhost/central_railways/webpages/user_dashboard.php');
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