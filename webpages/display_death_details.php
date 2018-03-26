<?php
session_start();
if(isset($_SESSION['username'])) {
      $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
      if(isset($_POST['subemp'])) {
            $emp_no = $_POST['empno'];
            $death_list = mysqli_query($connection, "SELECT * FROM death_details WHERE emp_no = '$emp_no'");
      } else if(isset($_POST['subdate'])) {
            $date = $_POST['searchdate'];
            $death_list = mysqli_query($connection, "SELECT * FROM death_details WHERE DATE_FORMAT(record_date, '%Y-%m-%d') = DATE_FORMAT('$date', '%Y-%m-%d')");
      } else {
            $death_list = mysqli_query($connection, "SELECT * FROM death_details");
      }
      while($row = mysqli_fetch_array($death_list)) {
            echo "<br><br/><br></br>";
            echo "<button class='accordion'>" . $row['emp_no'] . "</button>";
            echo "<div class='panel'>
                  <p>
                  <br> Case of :                                  " . $row['case_of'] . "
                  <br> Date of Death/Medically Unfit/Missing :    " . $row['dod_mu_m'] . "
                  <br> Welfare Inspector :                        " . $row['wi_name'] . "
                  <br> Priority :                                 " . $row['priority'] . "
                  <br> Funeral Advance :                          " . $row['funeral_adv'] . "
                  <br> Mobile Number :                            " . $row['mob_no'] . "
                  <br> Contact Person Name :                      " . $row['contact_persn_name'] . "
                  <br> SR top page available :                    " . $row['sr_top_pg_avl'] . "
                  <br> Leave Account available :                  " . $row['leave_acc_avl'] . "
                  <br> Family Declaration available :             " . $row['family_decl_avl'] . "
                  <br> Combined Nomination available :            " . $row['comb_nom_avl'] . "
                  <br> Settlement Section Dealer Name :           " . $row['settl_sec_dlr_name'] . "
                  <br> Bill Section Dealer Name :                 " . $row['bill_sec_dlr_name'] . "
                  <br> CGA claimed by :                           " . $row['cga_clmd_by'] . "
                  <br> Name :                                     " . $row['cga_clmd_name'] . "
                  <br> CGA application received :                 " . $row['cga_app_rcvd'] . "
                  <br> Application received on :                  " . $row['cga_app_rcvd_date'] . "
                  </p>
                  </div>";
      }
      mysqli_close($connection);
} else {
      die("Error: Missing user credentials");
}
?>
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
      </head>
      <body>
            <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
            for (i = 0; i < acc.length; i++) {
                  acc[i].addEventListener("click", function() {
                        this.classList.toggle("active1");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight) {
                              panel.style.maxHeight = null;
                        } else {
                              panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                  });
           }
           </script>
     </body>
</html>
