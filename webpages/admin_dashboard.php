<!DOCTYPE html>
<html>
<head>
<title>Indian Railways</title>
<link rel="stylesheet" href="user_dashboard.css">
<link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
<script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
<script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>


</head>
<body>

	<img align= left height= 120px src="http://localhost/central_railways/images/logo.png"></img>
	<br><p><font align =right size=200 font face ="calibri">INDIAN RAILWAYS</font></p>
	<hr id=lower color=red>
	<hr id=upper color=red>

<div id=style>
    <b><p>  <?php session_start(); if(isset($_SESSION['username'])) { $user = $_SESSION['username']; echo "Hello, $user";} else {die("Error: Missing user credentials");} ?> </p></b>  <br>
<ul>
  <li><a href="details.php">Death Entry</a></li>
  <li><a href="cga_details.php">CGA</a></li>
   <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Settlement</a>
     <ul>
        <a href="#">Pending Case</a>
        <a href="#">Select Case</a>
        <a href="#">Search Date Wise</a>
	  </ul>
  </li>
  <li><a href="add_user.php">Admin</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</div>
</body>
</html>
