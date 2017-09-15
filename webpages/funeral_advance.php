<!DOCTYPE html>
<html>
<head>
<title>Indian Railways</title>
<link rel="stylesheet" href="user_dashboard.css">

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
<form>
<fieldset>
    <legend><h2>Funeral Advance:</h2></legend>
            <table align="left" border="0">
                <tr>
                    <td width="165">Employee No. :</td>
                    <td width="165"><input type="text" name="employee"></td>
                </tr>
                <tr>
                    <td width="165">Name:</td>
                    <td width="165"><input type="text" name="name" disabled></td>
                </tr>
                <tr>
                    <td width="165">Designation :</td>
                    <td width="165"><input type="text" name="designation" disabled></td>
                </tr>
                <tr>
                    <td width="165">Department :</td>
                    <td width="165"><input type="text"name="department" disabled></td>
                </tr>
                <tr>
                    <td width="165">Station :</td>
                    <td width="165"><input type="text" name="station" disabled></td>
                </tr>

            </table>
            <table align="center" border="0">
                <tr>
                    <td width="165">FA Paid at Station</td>
                    <td width="165">
                         <select>
                            <option value="blank">blank</option>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td width="165">FA SPO No(6 digit)</td>
                    <td width="165"><input type="text" name="FASPONO"></td>
                </tr>
                <tr>
                    <td width="165">FA SPO Date:</td>
                    <td width="165"><input type="text" name="FASPODate"></td>
                </tr>

                <tr>
                    <td width="165">FA Amt</td>
                    <td width="165"><input type="text" name="FAamt"></td>
                </tr>
                <tr>
                    <td width="165">FA Paid at station</td>
                    <td width="165"><input type="text" name="FAPaidatstation"></td>
                </tr>
		<tr>
                    <td width="165">FA Paid By</td>
                    <td width="165"><input type="text" name="FAPaidBy"></td>
                </tr>
		<tr>
                    <td width="165">FA Paid to</td>
                    <td width="165"><input type="text" name="FAPaidto"></td>
                </tr>
		<tr>
                    <td width="165">Relation</td>
                    <td width="165"><input type="text" name="Relation"></td>
                </tr>
            </table>
            </fieldset>
        </form>
     </body>
</html>
