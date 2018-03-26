<?php
session_start();
if(isset($_SESSION['username'])) {
      $connection = mysqli_connect("localhost:3306", "cradmin", "crindadmin", "central_railways");
      if(isset($_POST['subemp'])) {
            $emp_no = $_POST['empno'];
            $death_list = mysqli_query($connection, "SELECT * FROM death_details WHERE emp_no = '$emp_no' AND settlmnt_status = 'Pending'");
      } else if(isset($_POST['subdate'])) {
            $date = $_POST['searchdate'];
            $death_list = mysqli_query($connection, "SELECT * FROM death_details WHERE DATE_FORMAT(record_date, '%Y-%m-%d') = DATE_FORMAT('$date', '%Y-%m-%d') AND settlmnt_status = 'Pending'");
      } else {
            $death_list = mysqli_query($connection, "SELECT * FROM death_details WHERE settlmnt_status = 'Pending'");
      }
      while($row = mysqli_fetch_array($death_list)) {
            echo "<br><br/><br></br>";
            echo "<button class='accordion'>" . $row['emp_no'] . "</button>";
            echo "<div class='panel'>
                  <form action='display_settlement_details.php' method='post'>
                        <input name='empno' id='empno' value='" . $row['emp_no'] . "' type='hidden'>
                        Booklet Received Yes/No:
                        <select id='bklt_rcvd' name='bklt_rcvd'>
                              <option value='Yes'>Yes</option>
                              <option value='No' selected>No</option>
                        </select><br><br>
                        Booklet Received date:
                        <input type='text' class='datepick' name='bklt_rcvd_date' id='bklt_rcvd_date'><br><br>
                        Service Register recd Yes/No:
                        <select id='service_reg_rcvd' name='service_reg_rcvd'>
                              <option value='Yes'>Yes</option>
                              <option value='No' selected>No</option>
                        </select><br><br>
                        Service Register recd date:
                        <input type='text' class='datepick' name='service_reg_rcvd_date' id='service_reg_rcvd_date'><br><br>
                        Case sent to Accounts on date:
                        <input type='text' class='datepick' name='case_sent_to_acc_date' id='case_sent_to_acc_date'><br><br>
                        Account Head:
                        <select id='head_name' name='head_name'>
                              <option value='default'>NULL</option>
                              <option value='PF'>PF</option>
                              <option value='DCRG'>DCRG</option>
                              <option value='Leave Salary'>Leave Salary</option>
                              <option value='CGIS'>CGIS</option>
                              <option value='Others'>Others</option>
                        </select><br><br>
                        Amount :
                        <input type='text' name='amt' id='amt' value='NULL'><br><br>
                        <input type='submit' value='Submit' name='submit_setlmnt'>
                  </form>
                  </div><br>";
      }
      if(isset($_POST['submit_setlmnt'])) {
            $emp_no = $_POST['empno'];
            $bklt_rcvd = $_POST['bklt_rcvd'];
            $bklt_rcvd_date = $_POST['bklt_rcvd_date'];
            $service_reg_rcvd = $_POST['service_reg_rcvd'];
            $service_reg_rcvd_date = $_POST['service_reg_rcvd_date'];
            $case_sent_to_acc = $_POST['case_sent_to_acc_date'];
            $acc_head_name = $_POST['head_name'];
            $amount = $_POST['amt'];

            $result = mysqli_query($connection, "INSERT INTO settlement (emp_no, booklet_rcvd, booklet_rcvd_date, service_register_rcvd,
                                                                         service_register_rcvd_date, case_sent_acc_date, accnts_head, amount)
                                                                         VALUES ('$emp_no', '$bklt_rcvd', '$bklt_rcvd_date', '$service_reg_rcvd',
                                                                         '$service_reg_rcvd_date', '$case_sent_to_acc', '$acc_head_name', '$amount')");
            $update_status = mysqli_query($connection, "UPDATE death_details SET settlmnt_status = 'Complete' WHERE emp_no = '$emp_no'");
            if(!$result && !$update_status) {
                  echo "<script> alert('Sorry! Data not inserted. Error : '" . mysqli_error($connection) . "); </script>";
            } else {
                  echo "<script> alert('Data entered successfully.'); window.history.go(-2); document.getElementById('viewall').click(); </script>";
            }
      }
      mysqli_close($connection);
} else {
      die("Error: Missing user credentials");
}
?>

<html>
      <head>
            <link rel="stylesheet" href="user_dashboard.css">
            <link rel="stylesheet" href="http://localhost/central_railways/bootstrap/css/bootstrap.min.css">
            <script src="http://localhost/central_railways/bootstrap/js/jquery-3.2.1.js"></script>
            <script src="http://localhost/central_railways/bootstrap/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="http://localhost/central_railways/plugins/jquery/jquery-ui.css">
            <script src="http://localhost/central_railways/plugins/jquery/external/jquery/jquery.js"></script>
            <script src="http://localhost/central_railways/plugins/jquery/jquery-ui.min.js"></script>
      </head>
      <body>
            <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                  acc[i].addEventListener("click", function() {
                        this.classList.toggle("active1");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                              panel.style.maxHeight = null;
                        } else {
                              panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                  });
            }
            </script>
            <script>
            $('.datepick').each(function(){
                  $(this).datepicker({ dateFormat : 'yy-mm-dd', changeYear: true, changeMonth: true});
            });
            </script>
      </body>
</html>
