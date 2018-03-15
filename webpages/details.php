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
            $dropdown_array = explode('~',$_POST['dropdowndata']);
            $death_date = $_POST['deathdate'];
            $mobile_no = $_POST['mobile'];
            $contact_person_name = $_POST['cpn'];
            if($dropdown_array[10] == 'Others') {
                 $dropdown_array[10] = $dropdown_array[10] . '(' . $dropdown_array[11] . ')';
            } else if($dropdown_array[10] == 'Please select') {
              $dropdown_array[10] = '';
            }
            $result = mysqli_query($connection, "INSERT INTO death_details (emp_no, case_of, dod_mu_m, "
                                                . "wi_name, priority, funeral_adv, mob_no, contact_persn_name, "
                                                . "sr_top_pg_avl, leave_acc_avl, family_decl_avl, comb_nom_avl, "
                                                . "settl_sec_dlr_name, bill_sec_dlr_name, cga_clmd_by, cga_clmd_name, "
                                                . "cga_app_rcvd, cga_app_rcvd_date) VALUES ('$emp_no', "
                                                . "'$dropdown_array[0]','$death_date' ,'$dropdown_array[1]', "
                                                . "'$dropdown_array[2]', '$dropdown_array[3]', '$mobile_no', "
                                                . "'$contact_person_name', '$dropdown_array[4]', '$dropdown_array[5]', "
                                                . "'$dropdown_array[6]', '$dropdown_array[7]', '$dropdown_array[8]', "
                                                . "'$dropdown_array[9]', '$dropdown_array[10]', '$dropdown_array[12]', "
                                                . "'$dropdown_array[13]', '$dropdown_array[14]')");
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
        <title>Death Details</title>
        <link rel="stylesheet" href="user_dashboard.css">
	  <link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
	  <script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
        <script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
        <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
        <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#deathdate").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true});
                $("#appdate").datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true});
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
                  <li><a class="active" href="details.php" id=link>Details</a></li>
                  <li><a href="funeral_advance.php">Funeral Advance</a>
                  <li><a href="kkkosh.php">KKKOSH</a></li>
                  <li><a href="distress_fund.php">Disstress Fund</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="details.php">
            <fieldset>
                <legend><h2>Employee Death Entry:</h2></legend>
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
                    </table>
                    <table align="center" border="0">
                        <tr class="spaceUnder">
                            <td width="165">Case of</td>
                            <td width="165">
                                <select id="caseof">
                                    <option value="death">Death</option>
                                    <option value="medical">Medically Unfit</option>
                                    <option value="missing">Missing</option>
                                </select>
                                <input type="hidden" id="dropdowndata" name="dropdowndata">
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Date of Death/Medically Unfit/Missing</td>
                            <td width="165"><input type="date" name="deathdate" id="deathdate"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Welfare Inspector Name</td>
                            <td width="165">
                                <?php
                                    $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'],"central_railways");
                                    $inspector_list = mysqli_query($connection, "SELECT * FROM welfare_inspector");
                                    echo '<select id="wi">';
                                    while($row = mysqli_fetch_array($inspector_list)) {
                                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                    }
                                    echo '</select>';
                                    mysqli_close($connection);
                                ?>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Priority </td>
                            <td width="165">
                                <select id="priority" onchange="showPriorityType();">
                                    <option value="default">Please select</option>
                                    <option value="one">I</option>
                                    <option value="two">II</option>
                                    <option value="three">III</option>
                                    <option value="four">IV</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder" id="pfourtype" hidden>
                          <td width="165">Type </td>
                          <td width="165">
                              <select id="ptype">
                                  <option value="default">Please select</option>
                                  <option value="muf">MUF</option>
                                  <option value="missing">Missing</option>
                              </select>
                          </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Funeral Advance</td>
                            <td width="165">
                                <select id="fa">
                                    <option value="required">Required</option>
                                    <option value="notrequired" selected>Not Required</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Mobile No</td>
                            <td width="165"><input type="text" name="mobile" id="mobile"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Contact Person Name</td>
                            <td width="165"><input type="text" name="cpn" id="cpn"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">SR top page available</td>
                            <td width="165">
                                <select id="sr">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Leave Account available</td>
                            <td width="165">
                                <select id="la">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Family Declaration available</td>
                            <td width="165">
                                <select id="fd">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Combined Nomination available</td>
                            <td width="165">
                                <select id="cn">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Settlement Section Dealer Name</td>
                            <td width="165">
                                <?php
                                    $connection = mysqli_connect('localhost:3306', $_SESSION['username'], $_SESSION['passwd'],'central_railways');
                                    $result = mysqli_query($connection, "SELECT emp_name FROM employees WHERE dept = 'PERSONNEL'");
                                    echo "<select id='settldealer'>";
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option id='".$row['emp_name']."'>".$row['emp_name']."</option>";
                                    }
                                    echo "</select>";
                                    mysqli_close($connection);
                                ?>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Bill Section Dealer Name</td>
                            <td width="165">
                                <?php
                                    $connection = mysqli_connect('localhost:3306', $_SESSION['username'], $_SESSION['passwd'],'central_railways');
                                    $result = mysqli_query($connection, "SELECT emp_name FROM employees WHERE dept = 'PERSONNEL'");
                                    echo "<select id='billdealer'>";
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option id='".$row['emp_name']."'>".$row['emp_name']."</option>";
                                    }
                                    echo "</select>";
                                    mysqli_close($connection);
                                ?>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">CGA claimed by</td>
                            <td>
                                <select id="relation" onchange="enableName();">
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
                            <td id="pleasespecify" hidden>Please specify</td>
                            <td><input type="text" id="otherrelation" hidden></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>Name</td>
                            <td><input type="text" id="relativename" name="relativename" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>CGA application received</td>
                            <td>
                                <select id="cgaapp" onchange="enableDate();">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>Application received on</td>
                            <td><input type="date" id="appdate" name="appdate" disabled></td>
                        </tr>
                    </table>
                <input type="submit" value="Get Details" name="getdetails">
                <input type="submit" value="Submit" name="submitdetails" onclick="getDropdownData();">
            </fieldset>
        </form>
        <script type="text/javascript">
            function getDropdownData() {
                  var listdata;
                  listdata = document.getElementById('caseof');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('wi');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('priority');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('fa');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('sr');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('la');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('fd');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('cn');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('settldealer');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('billdealer');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('relation');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('otherrelation');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.value + '~';
                  listdata = document.getElementById('relativename');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.value + '~';
                  listdata = document.getElementById('cgaapp');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.options[listdata.selectedIndex].text + '~';
                  listdata = document.getElementById('appdate');
                  document.getElementById('dropdowndata').value = document.getElementById('dropdowndata').value + listdata.value + '~';
            }
            function enableName() {
                  var nameData = document.getElementById('relation');
                  if(nameData.options[nameData.selectedIndex].text !== "Please select") {
                      document.getElementById('relativename').disabled = false;
                  } else {
                      document.getElementById('relativename').disabled = true;
                  }
                  if(nameData.options[nameData.selectedIndex].text === "Others") {
                      document.getElementById('pleasespecify').hidden = false;
                      document.getElementById('otherrelation').hidden = false;
                  } else {
                      document.getElementById('pleasespecify').hidden = true;
                      document.getElementById('otherrelation').hidden = true;
                  }
            }
            function enableDate() {
                  var cgaAppData = document.getElementById('cgaapp');
                  if(cgaAppData.options[cgaAppData.selectedIndex].text !== "No") {
                      document.getElementById('appdate').disabled = false;
                  } else {
                      document.getElementById('appdate').disabled = true;
                  }
             }
             function showPriorityType() {
                   if(document.getElementById('priority').options[document.getElementById('priority').selectedIndex].text == "IV") {
                       document.getElementById('pfourtype').hidden = false;
                   } else {
                       document.getElementById('pfourtype').hidden = true;
                   }
             }
            /*$(document).ready(function() {
                  $('form').on('submit', function (e) {
                        e.preventDefault();
                        var enteredDate = new Date($('#deathdate').val());
                        var currentDate = new Date();
                        if (!$('#empno').val()) {
                              if ($("#empno").parent().next(".validation").length == 0) // only add if not added
                              {
                                    $("#empno").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter a valid employee number</div>");
                              }
                        } else {
                              $("#empno").parent().next(".validation").remove(); // remove it
                        }
                        if (!$('#deathdate').val()) {
                              if ($("#deathdate").parent().next(".validation").length == 0) // only add if not added
                              {
                                    $("#deathdate").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter date</div>");
                              } else if(enteredDate > currentDate){
                                    $("#deathdate").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter today's date or past date</div>");
                              }
                        } else {
                              $("#deathdate").parent().next(".validation").remove(); // remove it
                        }
                  });
            });*/
        </script>
    </body>
</html>
