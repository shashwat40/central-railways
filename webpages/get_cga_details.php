<!DOCTYPE html>
<html>
    <head>
        <title>View Details</title>
        <link rel="stylesheet" href="user_dashboard.css">
	  <link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
	  <script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
        <script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
        <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
        <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
	  <script>
            $(document).ready(function() {
                $("#searchdate").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true});
            });
        </script>
    </head>
    <body>
        <img align= left height= 120px src="http://localhost/central_railways/images/logo.png"></img>
        <br><p><font align =right size=200 font face ="calibri">INDIAN RAILWAYS</font></p>
	  <p><a href="<?php session_start(); if($_SESSION['username'] == 'cradmin') {echo 'admin_dashboard.php';} else {echo 'user_dashboard.php';}?>" align="right">Home</a></p>
        <hr id=lower color=red>
        <hr id=upper color=red>
        <div id=style>
            <ul>
                <li><a class="active" href="get_cga_details.php" id=link>Details</a></li>
                <li><a href="get_mr_details.php">Minor Registration</a></li>
                <li><a href="get_remark_details.php">Remarks</a></li>
            </ul>
        </div>
        <br>
	  <br>
	  <form method="post" action="display_cga_details.php">
		  <fieldset>
	  		  <table align="left" border="0"  style="margin-left:254px">
				  <tr class="spaceUnder">
					  <td width="165">Employee No. :</td>
					  <td width="165"><input type="text" name="empno" id="empno" value="<?php echo isset($_SESSION['empno']) ? $_SESSION['empno'] : ''; ?>"></td>
					  <td width="165" align="right"><input type="submit" name="subemp" value="Go"></td>
				  </tr>
				  <tr class="spaceUnder">
					  <td width="165"></td>
					  <td width="165">OR</td>
				  </tr>
				  <tr class="spaceUnder">
              			<td width="165">Date: </td>
            			<td width="165"><input type="text" id="searchdate" name="searchdate"></td>
					<td width="165" align="right"><input type="submit" name="subdate" value="Go"></td>
				</tr>
				<tr class="spaceUnder">
					<td width="165"></td>
					<td width="165">OR</td>
				</tr>
				<tr class="spaceUnder">
					<td width="165">Click "View All" to</td>
					<td width="165">view all records.</td>
				</tr>
			</table>
		</fieldset>
		<input type="submit" name="viewall" value="View All">
	</form>
   </body>
</html>
