<?php
session_start();
if(isset($_SESSION['username'])) {
      $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'],"central_railways");
      $emp_name = "";
      $desig = "";
      $dept = "";
      $station = "";
      $dob = "";
      $doa = "";
      if(isset($_POST['getdetails'])) {
            $_SESSION['empno'] = $_POST['empno'];
            $emp_no = $_POST['empno'];
            $result = mysqli_query($connection, "SELECT emp_name, desig, dept, station FROM employees WHERE emp_no = '$emp_no'");
            while($row = mysqli_fetch_assoc($result)) {
                  $emp_name = $row['emp_name'];
                  $desig = $row['desig'];
                  $dept = $row['dept'];
                  $station = $row['station'];
            }
      } else if(isset($_POST['submitdetails'])) {
            $emp_no = $_POST['empno'];
            $app_window_rcvd_date = $_POST['appwidow'];
            $name_of_minor = $_POST['nameofminor'];
            $dob_of_minor = $_POST['birthdate'];
            $dropdowndata = explode('~', $_POST['dropdowndata']);
            $aadhar = $_POST['aadhar'];
            $reg_no = $_POST['registration'];
            $result = mysqli_query($connection, "INSERT INTO minor_registration (emp_no, app_widow_rcvd_date, name_of_minor,
                                                dob_of_minor, gender, minor_relation, candidate_aadhar, reg_no) VALUES ($emp_no, '$app_window_rcvd_date',
                                                '$name_of_minor', '$dob_of_minor', '$dropdowndata[0]', '$dropdowndata[1]',
                                                '$aadhar', '$reg_no')");
            if(!$result) {
                  echo "<script> alert('Sorry! Data not inserted. Error: '". mysqli_error($connection) ."); </script>";
            } else {
                  echo "<script> alert('Data entered successfully.'); </script>";
                  unset($_SESSION['empno']);
            }
            mysqli_close($connection);
      }
} else {
      die("Error: Missing user credentials");
}
?>
<html>
    <head>
        <title>Minor Registration</title>
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
                <li><a href="cga_details.php" id=link>Details</a></li>
                <li><a class="active" href="minor_registration.php">Minor Registration</a></li>
                <li><a href="remarks.php">Remarks</a></li>
                <li><a href="file_upload.php">File Upload</a></li>
                <li><a href="view_uploaded_files.php">View Files</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="minor_registration.php">
            <fieldset>
                <legend><h2>Minor Registration: </h2></legend>
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
                        <tr class="spaceUnder">
                            <td width="165">Station :</td>
                            <td width="165"><input type="text" name="station" id="station" value="<?php echo $station; ?>" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Date of Birth :</td>
                            <td width="165"><input type="text" name="dob" id="dob" value="<?php echo $dob; ?>" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Date of Appointment :</td>
                            <td width="165"><input type="text" name="doa" id="doa" value="<?php echo $doa; ?>" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Last Pay :</td>
                            <td width="165"><input type="text" name="lastpay" id="lastpay" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">7thPC Level :</td>
                            <td width="165"><input type="text" name="7thpc" id="7thpc" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">PRAN :</td>
                            <td width="165"><input type="text" name="pran" id="pran" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">PAN :</td>
                            <td width="165"><input type="text" name="pan" id="pan" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">AADHAR :</td>
                            <td width="165"><input type="text" name="aadhar" id="aadhar" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                              <td><input type="submit" value="Get Details" name="getdetails"></td>
                              <td><input type="submit" value="Submit" name="submitdetails" onclick="getDropdownData();"></td>
                        </tr>
                    </table>
                    <table align="center" border="0">
                        <tr class="spaceUnder">
                            <td> Application from widow/widower for Minor Registration received.</td>
                            <td> <input type="checkbox" name="application" id="application" value="Yes" checked disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Application from widow/widower for Minor Registration received date :</td>
                            <td width="165"><input type="date" name="appwidow" id="appwidow"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Name of Minor:</td>
                            <td width="165"><input type="text" name="nameofminor" id="nameofminor"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Date of Birth of Minor :</td>
                            <td width="165"><input type="date" name="birthdate" id="birthdate"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Gender: </td>
                            <td>
				        <select id="gender">
                                    <option id="M">M</option>
                                    <option id="F">F</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Relation of Minor with late/Ex/Missing employee: </td>
                            <td>
                                <select id="relation">
                                    <option id="son">Son</option>
                                    <option id="daughter">Daughter</option>
                                    <option id="brother">Brother</option>
                                    <option id="sister">Sister</option>
                                    <option id="others">Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Adhar Card Number of candidate :</td>
                            <td width="165"><input type="text" name="aadhar" id="aadhar"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Minor Registration Number :</td>
                            <td width="165"><input type="text" name="registration" id="registration"></td>
                        </tr>
                    </table>
                    <input name="dropdowndata" id="dropdowndata" type="hidden">
            </fieldset>
	</form>
      <script type="text/javascript">
            function getDropdownData() {
                var listdata;
                listdata = document.getElementById('gender');
                document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                listdata = document.getElementById('relation');
                document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
            }
      </script>
    </body>
</html>
