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
                <li><a class="active" href="minor_registration.php">Minor Registration</a></li>
                <li><a href="remarks.php">Remarks</a></li>
                <li><a href="file_upload.php">File Upload</a></li>
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
                    </table>
                    <table align="center" border="0">
                        <tr class="spaceUnder">
                            <td> Application from widow/widower for Minor Registration received.</td>
                            <td> <input type="checkbox" name="application" value=""></td>
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
                                    <option id="default" selected>Please select</option>
                                    <option id="Male">Male</option>
                                    <option id="Female">Female</option>
                                </select>
	   			<input type="hidden" id="dropdowndata" name="dropdowndata">
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Relation of Minor with late/Ex/Missing employee: </td>
                            <td>
                                <select id="relation">
                                    <option id="default" selected>Please select</option>
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
                            <td width="165">Adhar Card Number of candidate :</td>
                            <td width="165"><input type="text" name="aadhar" id="aadhar"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Minor Registration Number:</td>
                            <td width="165"><input type="text" name="registration" id="registration"></td>
                        </tr>
                    </table>
            </fieldset>
	</form>
    </body>
</html>