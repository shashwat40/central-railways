<?php
$connection = mysqli_connect("localhost:3306","root","","central_railways");
$emp_name = "";
$desig = "";
$dept = "";
$station = "";
if(isset($_POST['getdetails'])) {
    $emp_no = $_POST['empno'];
    $result = mysqli_query($connection, "SELECT emp_name, desig, dept, station FROM employee WHERE emp_no = $emp_no");
    while($row = mysqli_fetch_assoc($result)) {
        $emp_name = $row['emp_name'];
        $desig = $row['desig'];
        $dept = $row['dept'];
        $station = $row['station'];
    }
}
mysqli_close($connection);
?>
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
            <ul>
                <li><a href="details.php">Details</a></li>
                <li><a href="funeral_advance.php">Funeral Advance</a></li>
                <li><a class="active" href="kkkosh.php" id=link>KKKOSH</a></li>
                <li><a href="distress_fund.php">Distress Fund</a></li>
            </ul>
        </div>
	<br><br>
        <form method="post" action="kkkosh.php">
            <fieldset>
                <legend><h2>KKKOSH Details:</h2></legend>
                <table align="left" border="0">
                    <tr>
                        <td width="165">Employee No. :</td>
                        <td width="165"><input type="text" name="empno" id="empno"></td>
                    </tr>
                    <tr>
                        <td width="165">Name:</td>
                        <td width="165"><input type="text" name="empname" id="empname" value="<?php echo $emp_name; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td width="165">Designation :</td>
                        <td width="165"><input type="text" name="designation" id="designation" value="<?php echo $desig; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td width="165">Department :</td>
                        <td width="165"><input type="text" name="department" id="department" value="<?php echo $dept; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td width="165">Station :</td>
                        <td width="165"><input type="text" name="station" id="station" value="<?php echo $station; ?>" disabled></td>
                    </tr>
                </table>
                <table align="center" border="0">
                    <tr>
                        <td width="165">KKKOSH Cheque No:</td>
                        <td width="165"><input type="text" name="kkkoshchequeno" id="kkkoshchequeno"></td>
                    </tr>
                    <tr>
                        <td width="165">KKKOSH ChequeDate :</td>
                        <td width="165"><input type="text" name="chequedate" id="chequedate"></td>
                    </tr>
                    <tr>
                        <td width="165">KKKOSH Amount</td>
                        <td width="165"><input type="text" name="kkkoshamount" id="kkkoshamount"></td>
                    </tr>
                    <tr>
                        <td width="165">KKKOSH Paid By :</td>
                        <td width="165"><input type="text" name="kkkoshpaidto" id="kkkoshpaidto">
                    </tr>
                </table>
                <input type="submit" value="Get Details" name="getdetails">
            </fieldset>
        </form>
     </body>
</html>
