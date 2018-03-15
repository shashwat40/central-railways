<html>
    <head>
        <title>Indian Railways</title>
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
        <hr id=lower color=red>
        <hr id=upper color=red>
        <div id=style>
            <ul>
                <li><a  href="add_user.php" id=link>Add User</a></li>
                    <li><a href="delete_user.php">Delete User</a>
                    <li><a class="active" href="modify_user">Modify User</a></li>
            </ul>
        </div>
        <br>
        <br>
        <form method="post" action="modify_user.php">
            <fieldset>
                <legend><h2>Add New User</h2></legend>
                    <table align="left" border="0">
                        <tr class="spaceUnder">
                            <td width="165">Username :</td>
                            <td width="165"><input type="text" name="username" id="username"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Password :</td>
                            <td width="165"><input type="password" name="passwd" id="passwd" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">Privileges :</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">VIEW</td>
                            <td width="165"><input type="checkbox" name="view" id="view" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">INSERT</td>
                            <td width="165"><input type="checkbox" name="insert" id="insert" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">DELETE</td>
                            <td width="165"><input type="checkbox" name="delete" id="delete" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165">MODIFY</td>
                            <td width="165"><input type="checkbox" name="modify" id="modify" disabled></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td width="165"><br><input type="submit" value="Get Details" name="getdetails"></td>
                            <td width="165"><br><input type="submit" value="Modify" name="modifyuser"></td>
                        </tr>
            </fieldset>
        </form>
    </body>
</html>