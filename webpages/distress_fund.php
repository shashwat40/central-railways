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
 <ul>
                    <li><a href="details.php">Details</a></li>
                    <li><a href="funeral_advance.php">Funeral Advance</a></li>
                    <li><a href="kkkosh.php">KKKOSH</a></li>
                    <li><a class="active" href="distress_fund.php" id=link>Distress Fund</a></li>
		</ul>
            </div>
	</div>
	<br>
<form>
            <fieldset>
			    <legend><h2>Distress Fund:</h2></legend>

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
                    <td width="165">Distress Fund Cheque No:</td>
                    <td width="165"><input type="text" name="kkkoshchequeno"></td>
                </tr>
                <tr>
                    <td width="165">Distress Fund Cheque Date :</td>
                    <td width="165"><input type="text" name="chequedate" id="chequedate"></td>
                </tr>
                <tr>
                    <td width="165">Distress Fund Amount</td>
                    <td width="165"><input type="text" name="kkkoshamount" id="kkkoshamount"></td>
                </tr>
                <tr>
                    <td width="165">Distress Fund Paid By :</td>
                    <td width="165"><input type="text" name="kkkoshpaidby" id="kkkoshpaidby"></td>
                </tr>
                <tr>
                    <td width="165">Distress Fund Paid to:</td>
                    <td width="165"><input type="text" name="kkkoshpaidto" id="kkkoshpaidto"></td>
                </tr>
                <tr>
                    <td width="165">Relation</td>
                    <td width="165"><input type="text" name="relation" id="relation"></td>
                </tr>
            </table>
            </fieldset>
        </form>
</body>
</html>