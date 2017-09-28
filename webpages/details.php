<?php
//error_reporting(E_ERROR);
$connection = mysqli_connect("localhost:3306","root","","central_railways");
$emp_name = "";
$desig = "";
$dept = "";
$station = "";
$dob = "";
$doa = "";
if(isset($_POST['getdetails'])) {
    $emp_no = $_POST['empno'];
    $result = mysqli_query($connection, "SELECT emp_name, desig, dept, station, dob, doa FROM employee WHERE emp_no = $emp_no");
    while($row = mysqli_fetch_assoc($result)) {
        $emp_name = $row['emp_name'];
        $desig = $row['desig'];
        $dept = $row['dept'];
        $station = $row['station'];
        $dob = $row['dob'];
        $doa = $row['doa'];
    }
}
mysqli_close($connection);
?>
<html>
    <head>
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
                    <li><a class="active" href="details.php" id=link>Details</a></li>
                    <li><a href="funeral_advance.php">Funeral Advance</a>
                    <li><a href="kkkosh.php">KKKOSH</a></li>
                    <li><a href="distress_fund.php">Distress Fund</a></li>
            </ul>
        </div>
        <br><br>
        <form method="post" action="details.php">
            <fieldset>
                <legend><h2>Employee Death Entry:</h2></legend>
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
                        <tr>
                            <td width="165">Date of Birth :</td>
                            <td width="165"><input type="text" name="dob" id="dob" value="<?php echo $dob; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td width="165">Date of Appointment :</td>
                            <td width="165"><input type="text" name="doa" id="doa" value="<?php echo $doa; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td width="165">Last Pay :</td>
                            <td width="165"><input type="text" name="lastpay" id="lastpay" disabled></td>
                        </tr>
                        <tr>
                            <td width="165">7thPC Level :</td>
                            <td width="165"><input type="text" name="7thpc" id="7thpc" disabled></td>
                        </tr>
                        <tr>
                            <td width="165">PRAN :</td>
                            <td width="165"><input type="text" name="pran" id="pran" disabled></td>
                        </tr>
                        <tr>
                            <td width="165">PAN :</td>
                            <td width="165"><input type="text" name="pan" id="pan" disabled></td>
                        </tr>
                        <tr>
                            <td width="165">AADHAR :</td>
                            <td width="165"><input type="text" name="aadhar" id="aadhar" disabled></td>
                        </tr>
                    </table>
                    <table align="center" border="0">
                        <tr>
                            <td width="165">Case of</td>
                            <td width="165">
                                 <select>
                                    <option value="death">Death</option>
                                    <option value="medical">Medically Unfit</option>
                                    <option value="missing">Missing</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Date of Death/Medically Unfit/Missing</td>
                            <td width="165"><input type="text" name="deathdate" id="deathdate"></td>
                        </tr>
                        <tr>
                            <td width="165">Welfare Inspector Name</td>
                            <td width="165">
                                <select>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Priority </td>
                            <td width="165">
                                <select>
                                    <option value="one">I</option>
                                    <option value="two">II</option>
                                    <option value="three">III</option>
                                    <option value="four">IV</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Funeral Advance</td>
                            <td width="165">
                                <select>
                                    <option value="required">Required</option>
                                    <option value="notrequired">Not Required</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Mobile No</td>
                            <td width="165"><input type="text" name="mobile" id="mobile"></td>
                        </tr>
                        <tr>
                            <td width="165">Contact Person Name</td>
                            <td width="165"><input type="text" name="cpn" id="cpn"></td>
                        </tr>
                        <tr>
                            <td width="165">SR top page available</td>
                            <td width="165">
                                <select>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Leave Account available</td>
                            <td width="165">
                                <select>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Family Declaration available</td>
                            <td width="165">
                                <select>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Combined Nomination available</td>
                            <td width="165">
                                <select>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="165">Settlement Section Dealer Name</td>
                            <td width="165"><input type="text" name="ssdn" id="ssdn"></td>
                        </tr>
                        <tr>
                            <td width="165">Bill Section Dealer Name</td>
                            <td width="165"><input type="text" name="bsdn" id="bsdn"></td>
                        </tr>
                    </table>
                <input type="submit" value="Get Details" name="getdetails">
            </fieldset>
        </form>
    </body>
</html>
