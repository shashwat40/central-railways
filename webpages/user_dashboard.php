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
	<li class="dropdown">
    		<a href="javascript:void(0)" class="dropbtn">Death Entry</a>
    	  	<ul>
    		  	<a href="details.php">Data Entry</a>
    		  	<a href="get_death_details.php">Get Details</a>
    	  	</ul>
      </li>
	<li class="dropdown">
    	  <a href="javascript:void(0)" class="dropbtn">CGA</a>
    	  <ul>
    		  <a href="cga_details.php">CGA Entry</a>
    		  <a href="get_cga_details.php">Get Details</a>
    	  </ul>
      </li>
   <li><a href="get_settlement_details.php">Settlement</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</div>
<button class='accordion' id="empbday" name="empbday">Employee Birthdays</button>
<div class='panel' id="bdayp" name="bdayp">
	<?php
	if(isset($_SESSION['username'])) {
		$connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'],"central_railways");
		$result = mysqli_query($connection, "SELECT emp_name FROM employees WHERE DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')");
		echo "<br>";
		echo "<table>
			<tr>
			<td width='165'><font color='red'>Employee Name</font><br><br></td>
			</tr>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>
				<td width='165'>" . $row['emp_name'] . "<br>------------------------------------------------------</td>
				</tr>";
		}
		echo "</table>";
	} else {
	      die("Error: Missing user credentials");
	}
	?>
</div>
<br><br><br>
<button class='accordion' id="mtrmnr" name="mtrmnr">Maturing minor registrations</button>
<div class='panel' id="mtrp" name="mtrp">
	<?php
	if(isset($_SESSION['username'])) {
		$connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
		$result = mysqli_query($connection, "SELECT reg_no, name_of_minor FROM minor_registration WHERE TIMESTAMPDIFF(YEAR, dob_of_minor, CURRENT_DATE) = 18 AND DATE_FORMAT(dob_of_minor, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d')");
		echo "<br>";
		echo "<table>
			<tr>
			<td width='165'><font color='red'>Reg No.</font></td>
			<td width='165'><font color='red'>Name of Minor</font></td>
			</tr>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>
				<td width='165'>" . $row['reg_no'] . "<br>------------------------------------------------------</td>
				<td width='165'>" . $row['name_of_minor'] . "<br>------------------------------------------------------</td>
				</tr>";
		}
		echo "</table>";
	} else {
	      die("Error: Missing user credentials");
	}
	?>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function() {
		this.classList.toggle("active1");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight) {
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
		}
	});
}
</script>
</body>
</html>
