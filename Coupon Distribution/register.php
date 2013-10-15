<?php
require_once('functions.php');
secure(1);
require_once('conn.php');
?>
<?php 
		if(isset($_POST['Submit']))
		{
			$sql="Insert into registrations(rollno,name,department,class,year,email,mess,tshirt,crname,crcontact) values('" . $_SESSION['user'] . "', '".mysql_real_escape_string($_POST['username'])."','".$_POST['department']."','".mysql_real_escape_string($_POST['classes'])."','". $_POST['year']."','".mysql_real_escape_string($_POST['email'])."','".$_POST['mess']."','".$_POST['tshirt']."','".mysql_real_escape_string($_POST['cr'])."','".mysql_real_escape_string($_POST['crcontact'])."')";
			
			mysql_query($sql,$conn) or die(mysql_error()) ;
			$id=mysql_insert_id($conn);
                        $idi=rand()%500000;
			$ref="NITT".str_pad($idi,5,"0",STR_PAD_LEFT);
                        $pa=rand()%50000000;
			$pass="PASS".str_pad($pa,5,"0",STR_PAD_LEFT);

			$text="Registration Completed Successfully!";
			$text.="<br>Your student account is created and initiated with Rs.550/-.<br/> Your account id is : ".$ref.'<br />';
                        $text.=" Your account Password is : ".$pass.'<br />Please keep this private safe and secure';
			/*Sending mail to Complainant*/
                        $query="Insert into account(rollno,id,pass,amount) values('".$_SESSION['user']."','".$ref."','".$pass."','550')";
                        mysql_query($query,$conn) or die(mysql_error());

			$to = $_SESSION['user'].'@nitt.edu';
			$subject = "Mail from Festember Core team";
			$message = 'Hello '.$_SESSION['user'].',<br>Your softcoupon account has been generated with Festember core with the account id: '.$ref.'.and Password : '.$pass.'<br>Use these ID and Password for all transactions in the upcoming college fest.<br>This is a system generated mail. Please do not reply to this mail.<br>Regards.';
			$from = "Festember";
			$headers = "From:" . $from;
		//	mail($to,$subject,$message,$headers);
			/*Sending mail to Complainant*/
		}	
?>
<?php require_once('header.php') ?>
<script>

var x;

function blinkBorder(colorA, colorB, element, time){
  x++;
  if(x == 10)
	  return;
  element.style.borderColor = colorB ;
  setTimeout( function(){
    blinkBorder(colorB, colorA, element, time);
    colorB = null;
    colorA = null;
    element = null;
    time = null;
  } , time) ;
}

function validate()
{
	var f=document.form1
	//alert("hi calculation "+calc()+"timing::"+calct()+"problem::"+calcp())
	var name = f.username.value;
	var nameReg = /^[a-zA-Z ]*$/;
	var numReg = /^\d+$/;

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	//alert(f.contact.value.length);
	if(name=="" || !nameReg.test(name))
	{	alert("Please Enter Your Name.\nName can only have Alphabets and Spaces.")
		f.username.focus()
		x = 0;
		blinkBorder("white","red", f.username, 500);
		return false;
	}

        if(f.department.value=="")
{
alert("Select your department from the list please...");
f.department.focus();
x = 0;
blinkBorder("white","red", f.department, 500);
return false;
}

if(f.classes.value=="")
	{	alert("Please Enter Your Class Name");
		f.classes.focus()
		x = 0;
		blinkBorder("white","red", f.classes, 500);
		return false;
	}

if(f.year.value=="")
{
alert("Select year of study from the list please...");
f.year.focus();
x = 0;
blinkBorder("white","red", f.year, 500);
return false;
}


if(f.email.value=="")
{
alert("Can't leave email field empty.");
f.email.focus();
x = 0;
blinkBorder("white","red", f.email, 500);
return false;
}

  if(!(f.email.value.match(mailformat)))
	{
    alert("Invalid email address!");
    f.email.focus();
    x = 0;
blinkBorder("white","red", f.email, 500);
    return false;
    }



if(f.mess.value=="")
{
alert("Select your mess from the list please...");
f.mess.focus();
x = 0;
blinkBorder("white","red", f.mess, 500);
return false;
}

if(f.tshirt.value=="")
{
alert("Select your department from the list please...");
f.tshirt.focus();
x = 0;
blinkBorder("white","red", f.tshirt, 500);
return false;
}


        if(f.cr.value=="" || !nameReg.test(f.cr.value))
	{	alert("Please Enter Your Class representative's Name.\nName can only have Alphabets and Spaces.")
		f.cr.focus()
		x = 0;
		blinkBorder("white","red", f.cr, 500);
		return false;
	}



if(f.crcontact.value=="" || !numReg.test(f.crcontact.value) || f.crcontact.value.length > 10)
	{	alert("Please Enter Proper Contact Number.\nContact can have only numbers (Max 10 digits)");
		f.crcontact.focus()
		x = 0;
		blinkBorder("white","red", f.crcontact, 500);
		return false;
	}


}
function error(str)
{
	document.getElementById("errorbox").innerHTML=str
}


</script>
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">

<div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>
<div id="errorbox" class="box" align="center" style="color:#FF0000"></div>

<table width="90%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right">Full name : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="username" size="26" /></td>
<td width="39%" align="right">Roll NO. : </td>
<td id="" width="25%" align="left"><?php if (isset($_SESSION['user']))echo $_SESSION['user'] ?></td>
</tr>
<tr align="center">
<td align="right">Department <sup>*</sup>:</td>
						<td><select id="department" name="department" style="border:solid 1px black;">

						<option value="">Department</option>
						<option value="Architecture">Architecture</option>
						<option value="Chemical Engineering">Chemical Engineering</option>
						<option value="Chemistry">Chemistry</option>
						<option value="Civil Engineering">Civil Engineering</option>
						<option value="Computer Applications">Computer Applications</option>
						<option value="computer Science and Engineering">computer Science and Engineering</option>
						<option value="Electricals and Electronics Engineering">Electricals and Electronics Engineering</option>
						<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
						<option value="Humanities">Humanities</option>
						<option value="Instrumentation and Control Engineering">Instrumentation and Control Engineering</option>
							<option value="Management Studies">Management Studies</option>
						<option value="Mathematics">Mathematics</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Production Engineering">Production Engineering</option>
						<option value="Metallurgical and Materials Engineering">Metallurgical and Materials Engineering</option>
						<option value="Physics">Physics</option>
						</select>
<td width="39%" align="right">Class : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="classes" size="26" /></td>
</tr>
<tr id="otherdesig"  style="display:none">
<td>&nbsp;</td>
<td align="left" ><input type="text" name="otherdesignation" size="26" /></td>
</tr>

<tr align="center">
    <td align="right">Year of Study <sup>*</sup>:</td>
<td align="left"><select id="year" name="year" style="border:solid 1px black;">

						<option value="">Year of Study</option>
						<option value="first">I</option>
                                                <option value="second">II</option>
                                                <option value="third">III</option>
                                                <option value="fourth">IV</option>
    </select></td>
<td width="39%" align="right">E-Mail ID : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="email" size="26" /></td>
</tr>


<tr align="center">
<td width="39%" align="right">Mess Name : </td>
<td align="left"><select id="mess" name="mess" style="border:solid 1px black;">

						<option value="">Mess Name</option>
						<option value="Mega Mess-1(GF)">Mega Mess-1(Ground Floor)</option>
                                                <option value="Mega Mess-1(FF)">Mega Mess-1(First Floor)</option>
                                                <option value="Mega Mess-2(GF)">Mega Mess-2(Ground Floor)</option>
                                                <option value="Mega Mess-2(FF)">Mega Mess-2(First Floor)</option>
                                                <option value="A">A-Mess</option>
                                                <option value="B">B-Mess</option>
                                                <option value="O">Opal-Mess</option>
                                                <option value="F">F-Mess</option>
    </select></td>
<td width="39%" align="right">T-Shirt Size. : </td>
<td><select id="tsize" name="tshirt" style="border:solid 1px black;">

						<option value="">T-shirt Sizes</option>
						<option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="l">XL</option>
    </select>
</tr>


<tr align="center">
<td width="39%" align="right">Class Rep. Name : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="cr" size="26" /></td>
<td width="39%" align="right">Class Rep. Contact No. : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="crcontact" size="26" /></td>
</tr>


<tr>
<td colspan="4" align="center"><input type="submit" name="Submit" value="Submit" /><!--<input type="button" value="Check" onclick="validate()"/>--></td>
</tr>
</table>
</div>
	
<div id="left">
	<div>
            <marquee><img src="images/1.gif" /><br/></marquee>
                        <img src="images/nitt.jpg" /><br/>
                        <img src="images/poster.jpg" width="250px" height="200px" />
	</div>
	   
</div>

</div>

</form>
<?php require_once('footer.php') ?>
</body>
</html>