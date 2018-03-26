<?php
session_start();
if(isset($_SESSION['username'])) {
      $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'],"central_railways");
      $emp_name = "";
      $desig = "";
      $dept = "";
      $station = "";
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
            $cheque_no = $_POST['dfchequeno'];
            $cheque_date = $_POST['chequedate'];
            $amount = $_POST['dfamount'];
            $paid_by = $_POST['dfpaidby'];
            $paid_to = $_POST['dfpaidto'];
            $relation = $_POST['dropdowndata'];
            $result = mysqli_query($connection, "INSERT INTO distress_fund (emp_no, dist_fund_cheq_no, dist_fund_cheq_date, "
                                                . "dist_fund_amt, dist_fund_paid_by, dist_fund_paid_to, relation) VALUES ("
                                                . "'$emp_no', '$cheque_no', '$cheque_date', $amount, '$paid_by', '$paid_to', "
                                                . "'$relation')");
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
        <title>Disstress Fund</title>
        <link rel="stylesheet" href="user_dashboard.css">
        <link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
        <script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
        <script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
        <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
        <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#chequedate").datepicker({ dateFormat : 'yy-mm-dd'});
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
                <li><a href="details.php">Details</a></li>
                <li><a href="funeral_advance.php">Funeral Advance</a></li>
                <li><a href="kkkosh.php">KKKOSH</a></li>
                <li><a class="active" href="distress_fund.php" id=link>Disstress Fund</a></li>
            </ul>
        </div>
	<br><br>
        <form method="post" action="distress_fund.php">
            <fieldset>
                <legend><h2>Distress Fund:</h2></legend>
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
                </table>
                <table align="center" border="0">
                    <tr class="spaceUnder">
                        <td width="165">Distress Fund Cheque No:</td>
                        <td width="165"><input type="text" pattern="(0|1|2|3)[0-9]{5}" title="Cheque number should begin with 0, 1, 2 or 3 and should contain 6 digits" name="dfchequeno" id="dfchequeno"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Distress Fund Cheque Date :</td>
                        <td width="165"><input type="text" name="chequedate" id="chequedate"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Distress Fund Amount</td>
                        <td width="165"><input type="text" name="dfamount" id="dfamount"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Distress Fund Paid By :</td>
                        <td width="165"><input type="text" name="dfpaidby" id="dfpaidby"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Distress Fund Paid To:</td>
                        <td width="165"><input type="text" name="dfpaidto" id="dfpaidto"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">Relation</td>
                        <td width="165">
                            <select id="relation">
                                <option id="default" selected>Please select</option>
                                <option id="wife">Wife/Widow</option>
                                <option id="son">Son</option>
                                <option id="daughter">Daughter</option>
                                <option id="brother">Brother</option>
                                <option id="sister">Sister</option>
                                <option id="others">Others</option>
                            </select>
                            <input type="hidden" id="dropdowndata" name="dropdowndata">
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Get Details" name="getdetails">
                <input type="submit" value="Submit" name="submitdetails" onclick="getDropdownData();">
            </fieldset>
        </form>
        <script>
            function getDropdownData() {
                  var listdata;
                  listdata = document.getElementById('relation');
                  document.getElementById('dropdowndata').value = listdata.options[listdata.selectedIndex].text;
            }
        </script>
    </body>
</html>
