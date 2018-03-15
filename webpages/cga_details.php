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
	    	$result = mysqli_query($connection, "SELECT emp_name, desig, dept, station, dob, doa FROM employees WHERE emp_no = '$emp_no'");
	    	while($row = mysqli_fetch_assoc($result)) {
	        	$emp_name = $row['emp_name'];
	        	$desig = $row['desig'];
	        	$dept = $row['dept'];
	        	$station = $row['station'];
	        	$dob = $row['dob'];
	        	$doa = $row['doa'];
	      }
	} else if(isset($_POST['submitdetails'])) {
	      $emp_no = $_POST['empno'];
	      if(!empty($_POST['appwidow'])) {
			$cga_app_rcvd_widow = $_POST['appwidow'];
			$cga_app_rcvd_candidate = "No";
		} else if(!empty($_POST['appcandidate'])) {
	            $cga_app_rcvd_candidate = $_POST['appcandidate'];
			$cga_app_rcvd_widow = "No";
	      }
	      $pan = $_POST['pan'];
	      $aadhar = $_POST['aadhar'];
	      $case_submitted_on = $_POST['casedate'];
	      $dropdowndata = explode('~', $_POST['dropdowndata']);
	      $result = mysqli_query($connection, "INSERT INTO cga_details (emp_no, cga_app_rcvd_widow, "
	                                          . "cga_app_rcvd_candidate, relation, pan, aadhar, education, "
	                                          . "case_date, pending_with, status) VALUES ('$emp_no', '$cga_app_rcvd_widow', '$cga_app_rcvd_candidate', "
	                                          . "'$dropdowndata[0]', '$pan', '$aadhar', '$dropdowndata[1]', '$case_submitted_on', '$dropdowndata[2]', '$dropdowndata[3]')");
	      if(!$result) {
	            echo "<script> alert('Sorry! Data not inserted. Error : '". mysqli_error($connection) ."); </script>";
	      } else {
	            echo "<script> alert('Data entered successfully.'); </script>";
	            unset($_SESSION['empno']);
	      }
	}
	mysqli_close($connection);
} else {
	die("Error: Missing user credentials");
}
?>
<html>
    <head>
        <title> CGA Details</title>
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
                <li><a class="active" href="cga_details.php" id=link>Details</a></li>
                <li><a href="minor_registration.php">Minor Registration</a></li>
                <li><a href="remarks.php">Remarks</a></li>
                <li><a href="file_upload.php">File Upload</a></li>
		    <li><a href="view_uploaded_files.php">View Files</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="cga_details.php">
            <fieldset>
                <legend><h2>Details:</h2></legend>
                    <table align="left" border="0">
                        <tr class="spaceUnder">
                            <td width="165">Employee No. :</td>
                            <td width="165"><input type="text" name="empno" id="empno" value="<?php echo isset($_SESSION['empno']) ? $_SESSION['empno'] : ''; ?>"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Name :</td>
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
		                  <td><input type="submit" value="Submit" name="submitdetails" onclick="getFinalCheckboxData();getDropdownData();"></td>
				</td>
                    </table>
                    <table align="center" border="0">
                        <tr class="spaceUnder">
                            <td width="200">CGA application received from Widow/Widower :</td>
                            <td><input type="checkbox" name="appwidow" id="appwidow" value="No"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>CGA application received from Candidate :</td>
                            <td><input type="checkbox" name="appcandidate" id="appcandidate" value="No" onchange="showRelation(this);"></td>
                        </tr>
                        <tr class="spaceUnder" id="candidaterelation" hidden>
                            <td width="165">Relationship of candidate with late employee/Ex-employee/Missing employee :</td>
                            <td>
                                <select id="relation">
                                    <option id="wife">Wife/Widow</option>
                                    <option id="son">Son</option>
                                    <option id="daughter">Daughter</option>
                                    <option id="brother">Brother</option>
                                    <option id="sister">Sister</option>
                                    <option id="others">Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">PAN of Candidate :</td>
                            <td width="165"><input type="text" name="pan" id="pan"></td>
				</tr>
                        <tr class="spaceUnder">
                            <td width="165">Aadhaar Card Number of candidate :</td>
                            <td width="165"><input type="text" name="aadhar" id="aadhar"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Educational qualification :</td>
                            <td>
                                <select id="education">
                                    <option id="default" selected>Please select</option>
                                    <option id="SSC">SSC</option>
                                    <option id="SSC+ITI">SSC + ITI</option>
                                    <option id="HSSC">HSSC</option>
                                    <option id="Graduate">Gradudate</option>
                                    <option id="Post Graduate">Post Graduate</option>
                                    <option id="BE">BE</option>
                                    <option id="others">Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td id="pleasespecify" hidden>Please specify</td>
                            <td><input type="text" id="othereducation" hidden></td>
                        </tr>
				<tr class="spaceUnder">
                            <td width="165">CGA Case submitted by Welfare Inspector on :</td>
                            <td width="165"><input type="date" name="casedate" id="casedate"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Pending with :</td>
                            <td width="165">
                                <select id="pendingwith">
                                    <option value="default">Please select</option>
                                    <option value="Welfare Inspector">Welfare Inspector</option>
                                    <option value="CGA Section">CGA Section</option>
                                    <option value="Rectt Section">Rectt Section</option>
                                    <option value="Confidential section">Confidential section</option>
                                    <option value="APO">APO</option>
                                    <option value="DPO">DPO</option>
                                    <option value="Sr.DPO">Sr.DPO</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">CGA Case Status :</td>
                            <td width="165">
                                <select id="casestatus">
                                    <option value="default">Please select</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="appointed">Appointed</option>
                                    <option value="disputed">Disputed</option>
                                    <option value="minorreg">Minor Reg.</option>
                                    <option value="timeasked">Time Asked</option>
						<option value="senttohq">Sent to HQ</option>
                                </select>
                            </td>
                            <td><input name="dropdowndata" id="dropdowndata" type="hidden"></td>
                        </tr>
                    </table>
                <br><br><br><br>
            </fieldset>
        </form>
    </body>
    <script>
        function showRelation(checkBox) {
              if(checkBox.checked) {
                    document.getElementById('candidaterelation').hidden = false;
              } else {
                    document.getElementById('candidaterelation').hidden = true;
              }
        }
        /*function ifChecked(checkBox) {
            if(checkBox.checked) {
                checkBox.value = "Yes";
                if(checkBox.getAttribute("name") === 'appwidow')
                    document.getElementById('relation').selectedIndex = 1;
            }
            else {
                checkBox.value = "No";
            }
	}*/
        function getDropdownData() {
              var listdata;
              listdata = document.getElementById('relation');
              document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
              listdata = document.getElementById('education');
              document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
              listdata = document.getElementById('pendingwith');
              document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
              listdata = document.getElementById('casestatus');
              document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
        }
	  function getFinalCheckboxData() {
		  var appcand = document.getElementById('appcandidate');
		  var appwid =  document.getElementById('appwidow');
		  if(appcand.checked) {
			  appcand.value = "Yes";
			  appwid.value = "No";
		  } else if(appwid.checked) {
			  appwid.value = "Yes";
			  appcand.value = "No";
		  }
	  }
    </script>
</html>
