<?php
require_once('functions.php');
secure(2);
require_once('conn.php');
?>
<?php
require_once('header.php');

?>

<?php

if(isset($_POST['Submit']))
		{
    $val=$_POST['query'];
    
    $sq="Select * from stall where name='".$_SESSION['user']."'";
					$resul=mysql_query($sq,$conn) OR die(mysql_error());
                                        if($resul and mysql_num_rows($resul)>0)
					{
						$row=mysql_fetch_array($resul);
						//$current=$row['amount'];
					}
    if($val==1)
        {
        $text= $_SESSION['user'].' Your account balance is '.$row['stallamount'];
    }
    /*
   else if($val==2)
        {
        $text= $_SESSION['user'].' Your Soft coupon password is '.$row['pass'];
    }
   else if($val==3)
        {
        $text= $_SESSION['user'].' Your soft coupon is '.$row['id'];
    }*/
}


?>


<div id="content">

<div id="right">
    <form name="query" method="post">

        <select id="query" name="query" style="border:solid 1px black;">

						<option value="">User Help Menu</option>
						<option value="1">MY TOTAL INCOME</option>
                                             <!--   <option value="2">MY SOFTCOUPON PASSWORD</option>
                                                <option value="3">MY SOFTCOUPON ID</option> -->

    </select>
    <input type="submit" name="Submit" value="Show" />
    </form>

    <div align="center" class="box" style="color:#006600"><?php if (!isset($text)) $text=""; echo $text ?></div>

</div>

</div>
<?php require_once('footer.php')?>
</body>

</html>
