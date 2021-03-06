<?php
session_start();
if(isset($_SESSION['username'])) {
      $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
      if(isset($_POST['subemp'])) {
            $emp_no = $_POST['empno'];
            $cga_list = mysqli_query($connection, "SELECT * FROM cga_details WHERE emp_no = '$emp_no'");
      } else if(isset($_POST['subdate'])) {
            $date = $_POST['searchdate'];
            $cga_list = mysqli_query($connection, "SELECT * FROM cga_details WHERE DATE_FORMAT(record_date, '%Y-%m-%d') = DATE_FORMAT('$date', '%Y-%m-%d')");
      } else {
            $cga_list = mysqli_query($connection, "SELECT * FROM cga_details");
      }
      while($row = mysqli_fetch_array($cga_list)) {
            echo "<br><br/><br></br>";
            echo "<button class='accordion'>" . $row['emp_no'] . "</button>";
            echo "<div class='panel'>
                  <p>
                  <br> CGA Application received from widow/widower :          " . $row['cga_app_rcvd_widow'] . "
                  <br> CGA Application received from candidate :              " . $row['cga_app_rcvd_candidate'] . "
                  <br> Relation :                                             " . $row['relation'] . "
                  <br> PAN :                                                  " . $row['pan'] . "
                  <br> AADHAR :                                               " . $row['aadhar'] . "
                  <br> Education :                                            " . $row['education'] . "
                  <br> Case Date :                                            " . $row['case_date'] . "
                  <br> Pending with :                                         " . $row['pending_with'] . "
                  <br> Status :                                               " . $row['status'] . "
                  <br> Record date :                                          " . $row['record_date'] . "
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
