<html>
    <head>
	<link rel="stylesheet" href="user_dashboard.css">
<body>

	<img align= left height= 120px src="http://localhost/central_railways/images/logo.png"></img>
	<br><p><font align =right size=200 font face ="calibri">INDIAN RAILWAYS</font></p>
	<hr id=lower color=red>
	<hr id=upper color=red>

<div id=style>
<ul>
                    <li><a class="active" href="details.php" id=link>Details</a></li>
                    <li><a href="funeral_advance.php">Funeral Advance</a>
                    <li><a href="kkkosh.php">KKKOSH</a></li>
                    <li><a href="distress_fund.php">Distress Fund</a></li>
		</ul>
            </div>
	</div>

<br>
<form>
 <fieldset>
    <legend><h2>Employee Death Entry:</h2></legend>

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
                <tr>
                    <td width="165">Date of Birth :</td>
                    <td width="165"><input type="text" name="DOB" disabled></td>
                </tr>
                <tr>
                    <td width="165">Date of Appointment :</td>
                    <td width="165"><input type="text" name="DOA" disabled></td>
                </tr>
                <tr>
                    <td width="165">Last Pay :</td>
                    <td width="165"><input type="text" name="lastpay" disabled></td>
                </tr>
                <tr>
                    <td width="165">7thPC Level :</td>
                    <td width="165"><input type="text" name="7thpc" disabled></td>
                </tr>
                <tr>
                    <td width="165">PRAN :</td>
                    <td width="165"><input type="text" name="PRAN" disabled></td>
                </tr>
                <tr>
                    <td width="165">PAN :</td>
                    <td width="165"><input type="text" name="PAN" disabled></td>
                </tr>
                <tr>
                    <td width="165">AADHAR :</td>
                    <td width="165"><input type="text" name="AADHAR" disabled></td>
                </tr>
            </table>
            <table align="center" border="0">
                <tr>
                    <td width="165">Case of</td>
                    <td width="165">
                         <select>
                            <option value="death">Death</option>
                            <option value="medical">Medically Unfit</option>
                            <option value="missing">Missing</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Date of Death/Medically Unfit/Missing</td>
                    <td width="165"><input type="text" name="deathdate" id="deathdate"></td>
                </tr>
                <tr>
                    <td width="165">Welfare Inspector Name</td>
                    <td width="165">
                        <select>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Priority </td>
                    <td width="165">
                        <select>
                            <option value="one">I</option>
                            <option value="two">II</option>
                            <option value="three">III</option>
                            <option value="four">IV</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Funeral Advance</td>
                    <td width="165">
                        <select>
                            <option value="required">Required</option>
                            <option value="notrequired">Not Required</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Mobile No</td>
                    <td width="165"><input type="text" name="mobile"></td>
                </tr>
                <tr>
                    <td width="165">Contact Person Name</td>
                    <td width="165"><input type="text" name="cpn"></td>
                </tr>
                <tr>
                    <td width="165">SR top page available</td>
                    <td width="165">
                        <select>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Leave Account available</td>
                    <td width="165">
                        <select>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Family Declaration available</td>
                    <td width="165">
                        <select>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Combined Nomination available</td>
                    <td width="165">
                        <select>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="165">Settlement Section Dealer Name</td>
                    <td width="165"><input type="text" name="ssdn"></td>
                </tr>
                <tr>
                    <td width="165">Bill Section Dealer Name</td>
                    <td width="165"><input type="text" name="bsdn"></td>
                </tr>
            </table>
 </fieldset>
        </form>
</html>