<?php
require_once('functions.php');
secure(3);
require_once('conn.php');
?>
<?php
require_once('header.php');

?>

<?php




?>


<div id="content">

<div id="right">
<table align="center" width="80%">
    <form name="query" method="post">
<tr>
    <td>    <select id="query" name="query" style="border:solid 1px black;">

						<option value="">User Help Menu</option>
						<option value="tshirt">Show T-Shirt Sizes</option>
                                                <option value="department">Department specific</option>
                                             

    </select>
	</td>
	</tr>
	<tr>
	<td width="500px">
	<input type="text" name="spec" placeholder="Specify.." />
	</td>
	</tr>
	<tr>
	<td>
    <input type="submit" name="Submit" value="Show" />
	</td>
	</tr>
    </form>
	</table>

	<table align="center" width="100%" id="table1" cellpadding="5" cellspacing="5" border="1">
    <tr><th colspan="8"><center><b id="styyle">Entries</b></center></th></tr>
    <tr>
<th><b id="styyle">Roll No.</b></th>
<th><b id="styyle">Department</b></th>
<th><b id="styyle">Class</b></th>
<th><b id="styyle">Year</b></th>
<th><b id="styyle">Mess Name</b></th>
<th><b id="styyle">T-shirt Size</b></th>
<th><b id="styyle">Class Rep.</b></th>
<th><b id="styyle">CR Contact</b></th>
</tr>
<?php
	if(isset($_POST['Submit']))
		{
    $val=$_POST['query'];
	$v=$_POST['spec'];
    
    $sq="Select rollno,department,class,year,mess,tshirt,crname,crcontact from registrations where ".$val."='".$_POST['spec']."'";
					$resul=mysql_query($sq,$conn) OR die(mysql_error());
					$i=1;
					while(	$row=mysql_fetch_array($resul))
					{
?>
	<tr align="center"<?php if($i%2) { ?> style="background:#CCCCCC" <?php } ?>>
    <td align="center"><?php echo $row['rollno'] ?></td>
    <td align="center"><?php echo $row['department'] ?></td>
    <td align="center"><?php echo $row['class'] ?></td>
	<td align="center"><?php echo $row['year'] ?></td>
	<td align="center"><?php echo $row['mess'] ?></td>
	<td align="center"><?php echo $row['tshirt'] ?></td>
	<td align="center"><?php echo $row['crname'] ?></td>
	<td align="center"><?php echo $row['crcontact'] ?></td>
    </tr>

<?php }
}
 ?>
</table>
	
	
    <div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>

</div>

</div>
<?php require_once('footer.php')?>
</body>

</html>
