<?php
session_start();
if(isset($_SESSION['username'])) {
      if(isset($_POST['submitdetails'])) {
            $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
            $emp_no = $_POST['empno'];
            $emp_name = $_POST['empname'];
            $desig = $_POST['desig'];
            $dept = $_POST['dept'];
            $station = $_POST['station'];
            $dob = $_POST['dob'];
            $doa = $_POST['doa'];
            $sex = $_POST['sex'];
            $bill_unit = $_POST['billunit'];
            $descr = $_POST['descr'];
            $pay_rate = $_POST['payrate'];
            $pay_band = $_POST['payband'];
            $rt_date = $_POST['rtdate'];
            $emp_type = $_POST['emptype'];
      	$scale_code = $_POST['scalecode'];
            $last_pay = $_POST['lastpay'];
            $pclvl = $_POST['pclvl'];
            $pan = $_POST['pan'];
            $pran = $_POST['pran'];
            $aadhar = $_POST['aadhar'];
            $result = mysqli_query($connection, "INSERT INTO employees (emp_no, emp_name, desig, dept, station, dob, doa,
                                                 sex, bill_unit, descr, scale_code, pay_rate, pay_band, rt_date,
                                                 emp_type, last_pay, pc_lvl, pran, pan, aadhar) VALUES ('$emp_no',
                                                 '$emp_name', '$desig', '$dept', ' $station', '$dob', '$doa', '$sex',
                                                 '$bill_unit', '$descr', '$scale_code', '$pay_rate', '$pay_band', '$rt_date',
                                                 '$emp_type', '$last_pay', '$pclvl', '$pran', '$pan', '$aadhar')");
            if(!$result) {
                  echo "<script> alert('Sorry! Data not inserted. Error : '". mysqli_error($connection) ."); </script>";
            } else {
                  echo "<script> alert('Data entered successfully.'); </script>";
            }
            mysqli_close($connection);
      }
} else {
      die("Error: Missing user credentials");
}
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
        <script>
            $(document).ready(function() {
                $("#dob").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "-100:+0"});
                $("#doa").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "-50:+100"});
                $("#rtdate").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true, yearRange: "-0:+100"});
            });
        </script>
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
                  <li><a href="delete_user.php">Delete User</a></li>
                  <li><a class="active" href="employee_data_entry.php">Data Entry</a></li>
            </ul>
        </div>
	<br><br>
        <form method="post" action="employee_data_entry.php">
            <fieldset>
                <legend><h2>Employee Data Entry:</h2></legend>
                <table align="left" border="0">
                    <tr class="spaceUnder">
                        <td width="165">Employee No.: </td>
                        <td width="165"><input type="text" pattern="[A-Z 0-9]{11}" title="Employee No can be alphanumeric and 11 characters long" name="empno"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Name: </td>
                        <td width="165"><input type="text" name="empname"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Designation: </td>
                        <td width="165">
                              <?php
                              $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
                              $desig_list = mysqli_query($connection, "SELECT desgn FROM designation");
                              echo "<select id='desiglist'>";
                              while($row = mysqli_fetch_assoc($desig_list)) {
                                    echo "<option id='". $row['desgn'] ."'>". $row['desgn'] . "</option>";
                              }
                              echo "</select>";
                              ?>
                        </td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Department: </td>
                        <td width="165">
                              <?php
                              $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
                              $desig_list = mysqli_query($connection, "SELECT dept_name FROM department");
                              echo "<select id='desiglist'>";
                              while($row = mysqli_fetch_assoc($desig_list)) {
                                    echo "<option id='". $row['dept_name'] ."'>". $row['dept_name'] . "</option>";
                              }
                              echo "</select>";
                              ?>
                        </td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Station: </td>
                        <td width="165">
                              <?php
                              $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
                              $desig_list = mysqli_query($connection, "SELECT statn_code FROM station");
                              echo "<select id='desiglist'>";
                              while($row = mysqli_fetch_assoc($desig_list)) {
                                    echo "<option id='". $row['statn_code'] ."'>". $row['statn_code'] . "</option>";
                              }
                              echo "</select>";
                              ?>
                        </td>
                    </tr>
			  <tr class="spaceUnder">
                        <td width="165">Sex: </td>
                        <td width="165">
                              <select id="gender" name="gender">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                              </select>
                        </td>
                    </tr>
			  <tr class="spaceUnder">
                        <td width="165">Bill Unit: </td>
                        <td width="165"><input type="text" name="billunit"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Description :</td>
                        <td width="165"><input type="text" name="descr"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Date of Birth: </td>
                        <td width="165"><input type="text" name="dob" id="dob" onchange="calcRetdDate();"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Date of Appointment: </td>
                        <td width="165"><input type="text" name="doa" id="doa"></td>
                    </tr>
                </table>
                <table align="center" border="0">
                    <tr class="spaceUnder">
                        <td width="165">Scale Code: </td>
                        <td width="165"><input type="text" name="scalecode"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Pay Rate: </td>
                        <td width="165"><input type="text" name="payrate"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Pay Band: </td>
                        <td width="165"><input type="text" name="payband"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Retirement Date: </td>
                        <td width="165"><input type="text" name="rtdate" id="rtdate"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Employee Type: </td>
                        <td width="165"><input type="text" name="emptype"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Last Pay: </td>
                        <td width="165"><input type="text" name="lastpay"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">7th PC Level: </td>
                        <td width="165"><input type="text" name="pclvl"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">PAN: </td>
                        <td width="165"><input type="text" pattern="[A-Z 0-9]{10}" title="PAN should be alphanumeric and 10 characters long" name="pan"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">PRAN: </td>
                        <td width="165"><input type="text" name="pran"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">AADHAR: </td>
                        <td width="165"><input type="text" pattern="[0-9]{12}" title="AADHAR should be numeric and 12 characters long" name="aadhar"></td>
                    </tr>
                </table>
            </fieldset>
			<input type="submit" value="Submit" name="submitdetails">
        </form>
        <script>
            function calcRetdDate() {
                  var dateOfBirth = new Date(document.getElementById('dob').value);
                  var retdDate = ((dateOfBirth.getFullYear() + 60).toString()) + "-" + ((dateOfBirth.getMonth() + 1).toString()) + "-";
                  if(((dateOfBirth.getMonth() + 1) == 4) ||
                     ((dateOfBirth.getMonth() + 1) == 6) ||
                     ((dateOfBirth.getMonth() + 1) == 9) ||
                     ((dateOfBirth.getMonth() + 1) == 11)) {
                        retdDate = retdDate + "30";
                  } else if(((dateOfBirth.getMonth() + 1) == 2) &&
                            (((dateOfBirth.getFullYear() + 60) % 4) == 0) &&
                            (((dateOfBirth.getFullYear() + 60) % 100) != 0) &&
                            (((dateOfBirth.getFullYear() + 60) % 400) == 0)) {
                        retdDate = retdDate + "29";
                  } else if((dateOfBirth.getMonth() + 1) == 2) {
                        retdDate = retdDate + "28";
                  } else {
                        retdDate = retdDate + "31";
                  }
                  document.getElementById('rtdate').value = retdDate;
            }
       </script>
    </body>
</html>
