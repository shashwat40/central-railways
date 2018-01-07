<?php
session_start();
if(isset($_SESSION['username'])) {
$connection = mysqli_connect("localhost:3306","root","","central_railways");
$emp_name = "";
$desig = "";
$dept = "";
if(isset($_POST['getdetails'])) {
    $_SESSION['empno'] = $_POST['empno'];
    $emp_no = $_POST['empno'];
    $result = mysqli_query($connection, "SELECT emp_name, desig, dept FROM employees WHERE emp_no = $emp_no");
    while($row = mysqli_fetch_assoc($result)) {
        $emp_name = $row['emp_name'];
        $desig = $row['desig'];
        $dept = $row['dept'];
    }
}
if(isset($_POST['submit'])) {
    $remark = $_POST['remark'];
    $result = mysqli_query($connection, "INSERT INTO remarks (emp_no, remark) VALUES ('$emp_no', '$remark')");
    if(!$result) {
        echo "<script> alert('Sorry! Data not inserted. Try again.'); </script>";
    }
    else {
        echo "<script> alert('Data entered successfully.');</script>";
        session_destroy();
    }
}
mysqli_close($connection);
}
else 
    die("Error: Missing user credentials");
?>
<html>
    <head>
        <title>Indian Railways</title>
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
        <hr id=lower color=red>
        <hr id=upper color=red>
        <div id=style>
            <ul>
                <li><a href="cga_details.php" id=link>Details</a></li>
                <li><a  href="minor_registration.php">Minor Registration</a></li>
                <li><a class="active" href="remarks.php">Remarks</a></li>
                <li><a href="file_upload.php">File Upload</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="remarks.php">
	            <fieldset>
	                <legend><h2>Remarks: </h2></legend>
	                    <table align="left" border="0">
	                        <tr class="spaceUnder">
	                            <td width="165">Employee No. :</td>
	                            <td width="165"><input type="text" name="empno" id="empno" value="<?php echo isset($_SESSION['empno']) ? $_SESSION['empno'] : ''; ?>"></td>
	                        </tr>
	                        <tr class="spaceUnder">
	                            <td width="165">Name:</td>
	                            <td width="165"><input type="text" name="empname" id="empname" value="<?php echo $emp_name; ?>" disabled></td>
	                        </tr>
	                        <tr class="spaceUnder">
	                            <td width="165">Designation :</td>
	                            <td width="165"><input type="text" name="designation" id="designation" value="<?php echo $desig; ?>" disabled></td>
	                        </tr>
	                        <tr class="spaceUnder">
	                            <td width="165">Department :</td>
	                            <td width="165"><input type="text" name="department" id="department" value="<?php echo $dept; ?>" disabled></td>
                        </tr>
                        </table>
                    <table align="center" border="0">
                     <tr class="spaceUnder">
					                            <td width="165">Remark By: </td>
					                            <td>
									<select id="remark">
					                                    <option id="default" selected>Please select</option>
					                                    <option id="Welfare Inspector">Welfare Inspector</option>
					                                    <option id="CGA Dealer">CGA Dealer</option>
					                                </select>
						   			<input type="hidden" id="dropdowndata" name="dropdowndata">
					                            </td>
                        </tr>
                           <tr class="spaceUnder">
						                            <td width="165">Remark:</td>
                                                                            <td width="165"><textarea rows="10" cols="50" id="remark" name="remark"></textarea></td>
                        </tr>
                     </table>
					            </fieldset>
						</form>
					    </body>
</html>