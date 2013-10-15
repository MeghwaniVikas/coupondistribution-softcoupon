<?php
require_once('functions.php');
secure(1);
require_once('conn.php');
if($_SESSION['type']==2)
header("Location: stall.php");
?>
<?php require_once('header.php') ?>
<div id="content">

<div id="right" style="font-size:15px; color: green; text-align: left;">
    <center><h1 style="color:  maroon">FESTEMBER Coupon Registration & Softcoupon </h1></center><br/>
    <p>
In all the giant events of NITT like Festember, Nittfest and Pragyan, students are provided with the particular Fest T-shirt and food coupons.<br/>
The process of distribution of these t-shirts and coupons is very hectic.<br/>
People have to register manually at their corresponding messes and then they have to  wait in queue for a long time to get the particulars.<br/>
This process of registration is also available for very less time (for the general mess timings).<br/>
Also the coupons are generated on paper. It takes around 7-8 pages per student. In that way, lot of paper wastage is done.
</p>

<p>
    FESTEMBER'13 brings towards you the great relief in case of registration for the coupons and t-shirts.<br/>
    You just have to follow a very simple automated process to register here for t-shirts and coupons and moreover to enjoy soft-coupons, so as ther won't<br/>
    be any need for carrying and caring for paper based coupons which are very prone to tear and missplace.
</p>

<br/>

<h3>Process :</h3>
<ol  style=" list-style-type: square">
    <li>As, you have logged-in with your webmail id, webmail password, go to the register tab and fill the registration form.</li>
     <li>Once you click the submit button you will be registered for the T-shirt and soft-coupon.</li>
     <li>When you register, a user id and password will be genrared for you, which says that your account is created with the initial amount.</li>
     <li>This id, password will be required when you will be doing any transaction at any of the stalls.</li>
     <li>The T-shirts for the complete class will be given to the corressponding CR of the class.</li>
</ol>
<br/>
<center>Click <a href="register.php" style="color:  maroon">Here</a> to Register. <br/>HAPPY FESTEMBER </center>
</div>

   <div id="left">
	<div>
			<marquee><img src="images/1.gif" /><br/></marquee>
                        <img src="images/nitt.jpg" />
                        <img src="images/poster.jpg" width="250px" height="200px" />
	</div>

</div>
<?php
require_once('footer.php');
?>
