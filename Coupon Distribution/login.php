<?php
	if(!isset($text))
	$text="";
	if(!isset($username))
	$username="";
		require_once('functions.php');
		if(isset($_POST['Submit']))
		{
			$username=htmlentities($_POST['username'],ENT_QUOTES);
			$password=htmlentities($_POST['password'],ENT_QUOTES);
			if($username=="" or $password=="")
			{
			$text="<font color=red>Please Enter Username/Password</font>";
			$_SESSION['type']=0;
			}
			else
			{

                     //$username = escapeshellcmd($username);
	             // $password = escapeshellarg($password);
       	       $command1 = "python imap.py $username $password";
		       $auth_status1 = trim(shell_exec($command1));
       	        if ($auth_status1)
	                    {
			        $_SESSION['login']=true;
			        $_SESSION['user']=$username;
				 $_SESSION['type']=1;
				 die("<script>top.location='index.php'</script>");
				}
				else 
				{
					require_once('conn.php');
                                   $password = SHA1($password); 
					$sql="Select username,role from users where username='$username' and password='".(($password))."'";
					$result=mysql_query($sql,$conn);
					//echo mysql_num_rows($result);
                                   if($result and mysql_num_rows($result)>0)
					{
						$row=mysql_fetch_array($result);
						$_SESSION['login']=true;
						$_SESSION['user']=$row['username'];
						$_SESSION['type']=$row['role'];
						//echo 'here';
						die("<script>top.location='index.php'</script>");
					
					}
				}
				$text="<font color=red>Invalid Username/Password</font>";
			}
		}

?>
<?php require_once('header.php') ?>
<script>
function validate()
{
	var f=document.form1
	if(f.username.value=="")
	{	error(document.getElementById("usernametext"))
		f.username.focus()
		return false;
	}
	if(f.password.value=="")
	{	error(document.getElementById("passwordtext"))
		f.password.focus()
		return false;
	}
	return true
}
function error(id)
{
	id.style.color='red'
}

</script>
<form name="form1" method="post" onsubmit="return validate()">
<div id="content">
<div id="right">
<div align="center" class="box"><?php echo $text ?></div>
<table width="60%" align="center" border="0" cellpadding="5" cellspacing="5">
<tr align="center">
<td width="39%" align="right"><span id="usernametext">Username(Webmail)</span> : </td>
<td width="25%" align="left"><input type="text" name="username" size="18"  value="<?php echo $username; ?>"/></td>
</tr>
<tr align="center">
<td width="39%" align="right"><span id="passwordtext">Password(Webmail)</span> : </td>
<td width="25%" align="left"><input type="password" name="password" size="18" /></td>
</tr>
<tr align="center">
<td>&nbsp;</td>
<td  align="left"><input type="submit" name="Submit" value="Login" /></td>
</tr><tr><td>&nbsp;</td></tr>
</table>
<div id="conDiv">
<table align="center" border="0" cellpadding="5" cellspacing="5" width="100%">
<tr>
<th width="33%" align="center">Name/Title</th>
<th width="33%" align="center">Contact Number</th>
<th width="33%" align="center">Mail ID</th>
</tr>
<tr>
<td>
<center>Vikas Meghwani </center><br />
<center>Site Maintainer<br /></center>
</td>
<td><center>09543593125</center></td>
<td><center>205112011@nitt.edu</center>
</td>
</tr>

<tr>
<td>
<center>Devansh Kanwalkar </center><br />
<center>Chairman<br />
Festember 2013</center>
</td>
<td><center>-</center></td>
<td><center>205112009@nitt.edu</center>
</td>
</tr>
<tr>
<td>
<center>Arun Kumar</center>
<center>Marketing Head<br />
Festember 2013</center>
</td><td><center>07667560345
</center></td>
<td><center>205112013@nitt.edu</center></td></tr>
</table>
</div>
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
