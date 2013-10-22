<?php
require_once('functions.php');
secure(2);
require_once('conn.php');
if($_SESSION['type']==1)
header("Location: index.php");
if($_SESSION['type']==3)
header("Location: admin.php");
?>
<?php

if(isset($_POST['Submit']))
    {
    $sql="Select amount from account where id='".$_POST['userid']."' and pass='".$_POST['password']."'";
					$result=mysql_query($sql,$conn) OR die(mysql_error());
                                   if($result and mysql_num_rows($result)>0)
					{
						$row=mysql_fetch_array($result);
						$current=$row['amount'];
					}
                                       // echo $current;
                                       // $text=$current;

                                        if($current >= $_POST['amount'])
                                            {
                                            $sql="update account set amount = amount - '".$_POST['amount']."' where id='".$_POST['userid']."' and pass='".$_POST['password']."'";
                                            mysql_query($sql,$conn) or die(mysql_error());
                                            $s="update stall set stallamount = stallamount + '".$_POST['amount']."' where name='".$_SESSION['user']."'";
                                            mysql_query($s,$conn) or die(mysql_error());
                                            $text="Transaction Completed Successfully!";
                                        }
                                        else
                                            {

                                            $text="Insufficient amount in Student Account";
                                        }


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
	
	var numReg = /^\d+$/;


if(f.amount.value=="" || !numReg.test(f.amount.value))
	{	alert("Please Enter Amount properly.");
		f.amount.focus()
		x = 0;
		blinkBorder("white","red", f.amount, 500);
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

<table width="40%" align="center" border="0" cellpadding="5" cellspacing="5">
    <tr>
        <td colspan="2" align="center">
            <img src="images/festember.jpg" width="200px" height="100px" />
           <!-- <h1>FESTEMBER THE 13th</h1> -->
        </td>
        
    </tr>
    <tr>
        <td colspan="2" align="center"><h2>STALL COURT</h2></td>

    </tr>
    <tr>
        <td colspan="2" align="center"><h3>SANGEETAS</h3></td>

    </tr>
    <tr align="center">
<td width="39%" align="center">USER ID : </td>
<td id="userTbox" width="25%" align="left"><input type="text" name="userid" size="26" /></td>
</tr>
<tr>
<td width="39%" align="center">Password : </td>
<td id="" width="25%" align="left"><input type="password" name="password" size="26" /></td>
</tr>
<tr>
<td width="39%" align="center">Amount : </td>
<td id="" width="25%" align="left"><input type="text" name="amount" size="26" /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="Submit" value="Process Transaction" /><!--<input type="button" value="Check" onclick="validate()"/>--></td>
</tr>
</table>
</div>
	
<div id="left">
	<div>
			<marquee><img src="images/1.gif" /><br/></marquee>
                        <img src="images/nitt.jpg" />
                        <img src="images/poster.jpg" width="250px" height="200px" />
	</div>
	   
</div>

</div>

</form>
<?php require_once('footer.php') ?>
</body>
</html>