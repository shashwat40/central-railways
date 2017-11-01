<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Indian Railways</title>
<link rel="stylesheet" href="user_dashboard.css">

</head>
<body>

	<img align= left height= 120px src="http://localhost/central_railways/images/logo.png"></img>
	<br><p><font align =right size=200 font face ="calibri">INDIAN RAILWAYS</font></p>
	<hr id=lower color=red>
	<hr id=upper color=red>

<div id=style>
<ul>
  <li><a href="details.php">Death Entry</a></li>
  <li><a href="#CGA">CGA</a></li>
   <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Settlement</a>
      <div class="dropdown-content">
        <a href="#">Pending Case</a>
        <a href="#">Select Case</a>
        <a href="#">Search Date Wise</a>
      </div>
  </li>
  <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Admin</a>
      <div class="dropdown-content">
        <a href="AddUser.php">Add User</a>
        <a href="#">abc</a>
        <a href="#">xyz</a>
      </div>
  </li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</div>
<div class="subblock2">
                    <table >
                            <form action="AddUser.php" method="post">
                                    <tr >
                                       <td > Enter UserName : </td><td><input type="text" name="SUusername" id="SUusername"></td>
                                    </tr>
                                    <tr>
                                       <td> Enter Password : </td><td><input type="password" name="SUpassword" id="SUpassword"></td>
                                    </tr>
                                    <tr>
                                        <td>Assign Privileges : </td>
                                        <td><input type="checkbox" name="privileges[]" value="SELECT"/>SELECT
                                            <input type="checkbox" name="privileges[]" value="INSERT"/>INSERT
                                            <input type="checkbox" name="privileges[]" value="UPDATE"/>UPDATE
                                            <input type="checkbox" name="privileges[]" value="DELETE"/>DELETE
                                            <input type="checkbox" name="privileges[]" value="FILE"/>FILE
                                        </td>
                                    </tr>
                                <tr >
                                       <td><input type="submit" name="createUserSubmit" value="CREATE"></td>
                                    </tr>
                                    

                                </form>
                     </table>

        </div>
</body>
</html>

<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='central_railways';
if(isset($_POST['createUserSubmit']))
{

$dblink=new mysqli($hostname,$username,$password,$dbname);
   
$user=$_POST["SUusername"];
$pass=$_POST["SUpassword"];   

echo $user;
echo $pass;
if($dblink)
{
$query1 = "CREATE USER IF NOT EXISTS '".$user."'@'".$hostname."' IDENTIFIED BY '".$pass."'"; 
echo $query1;
$result= mysqli_query($dblink,$query1);
if($result)
{
echo "<br>User Created <br>";
if(!empty($_POST['privileges']))
{
    
    foreach($_POST['privileges'] as $abc=>$value)
    {
       
        $per=$_POST['privileges'][$abc];
        $query2="GRANT ".$per."ON".$dbname.".* TO "."'".$user."'@'".$hostname."'";
        echo "$per permission grnated";
    }
} 
}else
{
    echo "<br>ERROR!!! File  not uploaded".mysqli_connect_error();
}
   
}
}

?>