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
                <li><a href="minor_registration.php">Minor Registration</a></li>
                <li><a href="remarks.php">Remarks</a></li>
                <li><a class="active" href="file_upload.php">File Upload</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="file_upload.php">
             <fieldset>
		   	                <legend><h2>File Upload: </h2></legend>
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

						  <td width="165"><input type="file" id="myFile"></td>
						  </tr>
						  <tr class="spaceUnder">
						<td width="165"><button onclick="myFunction()">Upload</button></td>
						</tr>
						<script>
						function myFunction() {
						    var x = document.getElementById("myFile");
						    x.disabled = true;
						}
						</script>
						 </tr>
						                     </table>
											            </fieldset>
												</form>
											    </body>
</html>

						</body>
</html>