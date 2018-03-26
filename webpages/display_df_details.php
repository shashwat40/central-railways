<?php
session_start();
if(isset($_SESSION['username'])) {
      $connection = mysqli_connect("localhost:3306", $_SESSION['username'], $_SESSION['passwd'], "central_railways");
      if(isset($_POST['subemp'])) {
            $emp_no = $_POST['empno'];
            $death_list = mysqli_query($connection, "SELECT * FROM distress_fund WHERE emp_no = '$emp_no'");
      } else if(isset($_POST['subdate'])) {
            $date = $_POST['searchdate'];
            $death_list = mysqli_query($connection, "SELECT * FROM distress_fund WHERE DATE_FORMAT(record_date, '%Y-%m-%d') = DATE_FORMAT('$date', '%Y-%m-%d')");
      } else {
            $death_list = mysqli_query($connection, "SELECT * FROM distress_fund");
      }
      while($row = mysqli_fetch_array($death_list)) {
            echo "<br><br/><br></br>";
            echo "<button class='accordion'>" . $row['emp_no'] . "</button>";
            echo "<div class='panel'>
                  <p>
                  <br> Distress Fund Cheque No. :           " . $row['dist_fund_cheq_no'] . "
                  <br> Distress Fund Cheque Date :          " . $row['dist_fund_cheq_date'] . "
                  <br> Distress Fund Amount :               " . $row['dist_fund_amt'] . "
                  <br> Distress Fund Paid By :              " . $row['dist_fund_paid_by'] . "
                  <br> Distress Fund Paid To :              " . $row['dist_fund_paid_to'] . "
                  <br> Relation :                           " . $row['relation'] . "
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
