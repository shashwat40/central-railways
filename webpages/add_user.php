<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] == 'cradmin') {
  if(isset($_POST['adduser'])) {
    if(isset($_POST['username'])) {
      if(isset($_POST['passwd'])) {
        $username = $_POST['username'];
        $password = $_POST['passwd'];
        $privileges = $_POST['privileges'];
        $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
        $result = mysqli_query($connection, "CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'");
        if(strpos($privileges, '1') !== false) {
          $result1 = mysqli_query($connection, "GRANT SELECT ON central_railways.* TO '$username'@'localhost'");
          if(!$result1)
            die("Error while granting privileges : SELECT :". mysqli_error($connection));
        }
        if(strpos($privileges, '2') !== false) {
          $result2 = mysqli_query($connection, "GRANT INSERT ON central_railways.* TO '$username'@'localhost'");
          if(!$result2)
            die("Error while granting privileges : INSERT :". mysqli_error($connection));
        }
        if(strpos($privileges, '3') !== false) {
          $result3 = mysqli_query($connection, "GRANT DELETE ON central_railways.* TO '$username'@'localhost'");
          if(!$result3)
            die("Error while granting privileges : DELETE :". mysqli_error($connection));
        }
        if(strpos($privileges, '4') !== false) {
          $result4 = mysqli_query($connection, "GRANT UPDATE ON central_railways.* TO '$username'@'localhost'");
          if(!$result4)
            die("Error while granting privileges : UPDATE :". mysqli_error($connection));
        }
        echo "<script> alert('User successfully created.'); </script>";
        mysqli_close($connection);
      }
      else {
        echo "Invalid Password.";
      }
    }
    else {
      echo "Invalid Username.";
    }
  }
}
else
  die("Error: Missing admin credentials");
?>
<html>
    <head>
        <title>Add User</title>
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
                <li><a class="active" href="add_user.php" id=link>Add User</a></li>
                <li><a href="delete_user.php">Delete User</a>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="add_user.php">
            <fieldset>
                <legend><h2>Add New User</h2></legend>
                    <table align="left" border="0">
                        <tr class="spaceUnder">
                            <td width="165">Username :</td>
                            <td width="165"><input type="text" name="username" id="username"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Password :</td>
                            <td width="165"><input type="password" name="passwd" id="passwd"></td>
                            <td width="165"></td>
                            <td width="165"><input type="checkbox" onclick="showPassword();"> Show Password</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Privileges :</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">VIEW DATA</td>
                            <td width="165"><input type="checkbox" name="view" id="view"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">INSERT DATA</td>
                            <td width="165"><input type="checkbox" name="insert" id="insert"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">DELETE DATA</td>
                            <td width="165"><input type="checkbox" name="delete" id="delete"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">MODIFY DATA</td>
                            <td width="165"><input type="checkbox" name="modify" id="modify"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165"><br><input type="submit" value="Add" name="adduser" onclick="getPrivileges();"></td>
                            <td width="165"><input type="hidden" id="privileges" name="privileges"></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
        <script type="text/javascript">
            function getPrivileges() {
                if(document.getElementById('view').checked)
                    document.getElementById('privileges').value = document.getElementById('privileges').value + '1';
                if(document.getElementById('insert').checked)
                    document.getElementById('privileges').value = document.getElementById('privileges').value + '2';
                if(document.getElementById('delete').checked)
                    document.getElementById('privileges').value = document.getElementById('privileges').value + '3';
                if(document.getElementById('modify').checked)
                    document.getElementById('privileges').value = document.getElementById('privileges').value + '4';
            }
            function showPassword() {
              var passwordField = document.getElementById("passwd");
              if (passwordField.type === "password") {
                passwordField.type = "text";
              } else {
                passwordField.type = "password";
              }
            }
        </script>
    </body>
</html>
