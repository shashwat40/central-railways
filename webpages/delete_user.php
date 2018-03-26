<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] == 'cradmin') {
  if(isset($_POST['deluser'])) {
    if(isset($_POST['username'])) {
      $username = $_POST['username'];
      $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
      $result = mysqli_query($connection, "DROP USER '$username'@'localhost'");
      if(!$result)
        echo "<script> alert('Error: Cannot delete user. Error : ". mysqli_error($connection) ."'); </script>";
      else
        echo "<script> alert('User successfully removed.'); </script>";
      mysqli_close($connection);
    }
  }
} else {
      die("Error: Missing admin credentials");
}
?>
<html>
    <head>
        <title>Delete User</title>
        <link rel="stylesheet" href="user_dashboard.css">
	  <link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
	  <script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
        <script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
        <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
        <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
    </head>
    <body>
        <img align= left height= 120px src="http://localhost/central_railways/images/logo.png"></img>
        <br><p><font align =right size=200 font face ="calibri">INDIAN RAILWAYS</font></p>
        <p><a href="<?php if($_SESSION['username'] == 'cradmin') {echo 'admin_dashboard.php';} else {echo 'user_dashboard.php';}?>" align="right">Home</a></p>
        <hr id=lower color=red>
        <hr id=upper color=red>
        <div id=style>
            <ul>
                <li><a href="add_user.php" id=link>Add User</a></li>
                <li><a class="active" href="delete_user.php">Delete User</a></li>
                <li><a href="employee_data_entry.php" id=link>Data Entry</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="delete_user.php">
            <fieldset>
                <legend><h2>Delete User</h2></legend>
                    <table align="left" border="0">
                        <tr class="spaceUnder">
                            <td width="165">Username :</td>
                            <td width="165"><input type="text" name="username" id="username"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165"><br><input type="submit" value="Delete" name="deluser"></td>
                        </tr>
            </fieldset>
        </form>
    </body>
</html>
