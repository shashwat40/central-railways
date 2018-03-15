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
            $cheque_no = $_POST['kkkoshchequeno'];
            $cheque_date = $_POST['chequedate'];
            $amount = $_POST['kkkoshamount'];
            $paid_by = $_POST['kkkoshpaidby'];
            $result = mysqli_query($connection, "INSERT INTO kkkosh (emp_no, kkkosh_cheq_no, kkkosh_cheq_date, kkkosh_cheq_amt, "
                                                . "kkkosh_paid_by) VALUES ('$emp_no', '$cheque_no', '$cheque_date', $amount, '$paid_by')");
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
        <title>KKKOSH</title>
            <link rel="stylesheet" href="user_dashboard.css">
			<link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
			<script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
			<script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
                  <link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
                  <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
                  <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#chequedate").datepicker({ dateFormat : 'yy-mm-dd', orientation: "auto"});
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
                  <li><a class="active" href="kkkosh.php" id=link>KKKOSH</a></li>
                  <li><a href="distress_fund.php">Disstress Fund</a></li>
               </ul>
           </div>
        <br>
        <br>
        <form method="post" action="kkkosh.php">
            <fieldset>
                <legend><h2>KKKOSH Details:</h2></legend>
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
                        <td width="165">KKKOSH Cheque No:</td>
                        <td width="165"><input type="text" name="kkkoshchequeno" id="kkkoshchequeno"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">KKKOSH Cheque Date :</td>
                        <td width="165"><input type="text" name="chequedate" id="chequedate"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">KKKOSH Amount</td>
                        <td width="165"><input type="text" name="kkkoshamount" id="kkkoshamount"></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td width="165">KKKOSH Paid By :</td>
                        <td width="165"><input type="text" name="kkkoshpaidby" id="kkkoshpaidby">
                    </tr>
                </table>
                <br>
                <br>
                <input type="submit" value="Get Details" name="getdetails">
                <input type="submit" value="Submit" name="submitdetails">
            </fieldset>
        </form>
     </body>
</html>
