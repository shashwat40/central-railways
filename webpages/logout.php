<?php
session_start();
session_destroy();
header();
 header('Location: http://localhost/central_railways/webpages/personnel_login.html');
?>