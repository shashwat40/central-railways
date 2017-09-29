<?php
$connection = mysqli_connect("localhost:3306","root","","central_railways");
$emp_name = "";
$desig = "";
$dept = "";
$station = "";
session_start();
if(isset($_POST['getdetails'])) {
    $_SESSION['empno'] = $_POST['empno'];
    $emp_no = $_POST['empno'];
    $result = mysqli_query($connection, "SELECT emp_name, desig, dept, station FROM employees WHERE emp_no = $emp_no");
    while($row = mysqli_fetch_assoc($result)) {
        $emp_name = $row['emp_name'];
        $desig = $row['desig'];
        $dept = $row['dept'];
        $station = $row['station'];
    }
}
else if(isset($_POST['submitdetails'])) {
    $emp_no = $_POST['empno'];
    $fa_spo_no = $_POST['faspono'];
    $fa_spo_date = $_POST['faspodate'];
    $fa_amt = $_POST['faamt'];
    $dropdown_array = split('~', $_POST['dropdowndata']);
    $fa_paid_by = $_POST['fapaidby'];
    $fa_paid_to = $_POST['fapaidto'];
    $result = mysqli_query($connection, "INSERT INTO funeral_advance (emp_no, fa_spo_no, fa_spo_date, "
                                        . "fa_amt, fa_paid_stn, fa_paid_by, fa_paid_to, relation) VALUES"
                                        . " ('$emp_no', '$fa_spo_no', '$fa_spo_date', $fa_amt, '$dropdown_array[0]'"
                                        . ", '$fa_paid_by', '$fa_paid_to', '$dropdown_array[1]')");
    if(!$result) {
        echo "<script> alert('Sorry! Data not inserted. Try again.'); </script>";
    }
    else {
        echo "<script> alert('Data entered successfully.');</script>";
        unset($_SESSION['empno']);
        session_destroy();
    }
}
mysqli_close($connection);
?>
<html>
    <head>
        <title>Indian Railways</title>
            <link rel="stylesheet" href="user_dashboard.css">
<link rel="stylesheet" href="user_dashboard.css">
<link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
<script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
<script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
        <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
        <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#faspodate").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true});
                });
            </script>
    </head>
    <body>
	<img align= left height= 120px src="http://localhost/central_railways/images/logo.png"></img>
	<br><p><font align =right size=200 font face ="calibri">INDIAN RAILWAYS</font></p>
	<hr id=lower color=red>
        <hr id=upper color=red>
        <div id=style>
            <div id=holder>
		<ul>
                    <li><a href="details.php" >Details</a></li>
                    <li><a class="active" href="funeral_advance.php" id=link>Funeral Advance</a></li>
                    <li><a href="kkkosh.php">KKKOSH</a></li>
                    <li><a href="distress_fund.php">Distress Fund</a></li>
		</ul>
            </div>
	</div>
	<br>
	<br>
        <form method="post" action="funeral_advance.php">
            <fieldset>
                <legend><h2>Funeral Advance:</h2></legend>
                <table align="left" border="0">
                    <tr>
                        <td width="165">Employee No. :</td>
                        <td width="165"><input type="text" name="empno" id="empno" value="<?php echo isset($_SESSION['empno']) ? $_SESSION['empno'] : ''; ?>"></td>
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
                        <td width="165">FA SPO No(6 digit)</td>
                        <td width="165"><input type="text" name="faspono" id="faspono"></td>
                    </tr>
                    <tr>
                        <td width="165">FA SPO Date:</td>
                        <td width="165"><input type="text" name="faspodate" id="faspodate"></td>
                    </tr>

                    <tr>
                        <td width="165">FA Amount</td>
                        <td width="165"><input type="text" name="faamt" id="faamt"></td>
                    </tr>
                    <tr>
                        <td width="165">FA Paid At Station</td>
                        <td width="165">
                            <?php
                                $connection = mysqli_connect("localhost:3306","root","","central_railways");
                                $station_list = mysqli_query($connection, "SELECT full_name FROM station");
                                echo '<select id="fapaidatstation">';
                                while($row = mysqli_fetch_array($station_list)) {
                                    echo '<option value="'.$row['full_name'].'">'.$row['full_name'].'</option>';
                                }
                                echo '</select>';
                                mysqli_close($connection);
                            ?>
                        </td>
                        <input type="hidden" id="dropdowndata" name="dropdowndata">
                    </tr>
                    <tr>
                        <td width="165">FA Paid By</td>
                        <td width="165"><input type="text" name="fapaidby" id="fapaidby"></td>
                    </tr>
                    <tr>
                        <td width="165">FA Paid To</td>
                        <td width="165"><input type="text" name="fapaidto" id="fapaidto"></td>
                    </tr>
                    <tr>
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
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Get Details" name="getdetails">
                <input type="submit" value="Submit" name="submitdetails" onclick="getDropdownData();">
            </fieldset>
        </form>
        <script type="text/javascript">
            function getDropdownData() {
                var listdata;
                listdata = document.getElementById('fapaidatstation');
                document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                listdata = document.getElementById('relation');
                document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
            }
        </script>
     </body>
</html>
