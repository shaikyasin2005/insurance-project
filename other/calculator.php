<?php
include "../login/db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Insurance System</title>

<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"/>
<script src="../js/jquery-3.1.1.min.js"  > </script>
<script type="text/javascript" src="../js/bootstrapp.min.js"></script>

<style type="text/css">
	
	.width{
		width: 200px;
		float: right;
		margin-right: 30px;
		text-align: center;
	     }

	     select {
    padding-left: 35px;
    }

    .icon-bar {
    background-color: black;

}
</style>
</head>
<body>
<div class="container" style="border: 2px solid #73EE13">

	<?php include "header.php" ?>

	<div class="row" style="border-bottom: 1px solid #73EE13">
		<div class="col-sm-12" style="margin-bottom: -15px; margin-top: 5px; ">
			<nav class="navbar navbar-fluid">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="../index.php">Health Insurance</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="plan.php">Insurance Plans</a></li>
        <li><a href="calculator.php">Premium Calculator</a></li> 
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li> 
      </ul>
       
      <ul class="nav navbar-nav navbar-right">
       <?php 
	if(isset($_SESSION['name'])){

		$namee = $_SESSION['name'];


		$query="SELECT * from registration where name='$namee' ";
	$run=mysqli_query($con, $query) ;
	
	
	while ($roww = mysqli_fetch_array($run, MYSQLI_BOTH)) {


		
	
	
	                           
								$name = $roww['name'];
								$userType = $roww['userType'];
      switch ($userType) {
          
          case 'user':
              $redirect = '../user_profile/user_profile.php  ';
          break;
          case 'admin':
              $redirect = '../admin/admin.php';
          break;
          case 'manager':
              $redirect = '../manager/manager.php';
          break;
          case 'agent':
              $redirect = '../agent/agent.php';
          break;
                          
                          }
						  }

	
		?>
	 <li> <?php echo '<a href="' . $redirect . '">' ?> <?php echo strtoupper($_SESSION['name']); ?></a></li>
      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php
}
else{
	echo "<li><a href='../login/register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
	echo "      <li><a href='../login/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
}

?> </ul>
    </div>
  </div>
</nav>
		</div>
	</div> <!--  ENd of Row 2 -->

	<div class="row">

		 
			

			<div class="col-sm-6" id="hidden_div" style="background-color: #F0F3F4; border-radius: 15px; width: 550px; margin-left: 30px; z-index: 10px; box-shadow: inset -5px -5px rgba(0,0,0,0.5); margin-top: 20px; display: block; font-family: helvatica; " align="center" >


			<form action="" method="POST" >
				
				<label style="background-color: #DB343E; color: white; width: 500px; margin-top: 10px; font-size: 17pt; font-family: halvatica; border-radius: 10px;"> Premium Calculator</label><br><br><br>

				<label class="form-control" style="float: center; "">Enter Information</label><br><br>
				
				<label style="float: left">Name</label>
				<input class="width" type="test" name="name" placeholder="--Your Name--"  required><br><br>

				<label style="float: left">Policy Start Date</label>
				<input class="width" type="date" name="date"  required><br><br>

				<label style="float: left;">Policy Category</label>
				<select class="width"  name="Category"  required>
			    <option selected="true" disabled="disabled" value="" > --Select Category--</option>
			 	<option value="Single"> Single </option>
			 	<option value="Jointee"> Jointee </option>
			    </select><br><br>

			    <label style="float: left;"> Policy Type</label>
			    <select class="width" name="type"  required>
			    <option selected="true" disabled="disabled" value=""> --Select Policy-- </option>
			 	<option value=" "> Whole Life </option>
			 	<option value=" "> Non Medical WHole Life </option>
			    </select><br><br>

			    <label style="float: left;"> Policy term</label>
			    <select class="width" name="term" id="term"  required>
			    <option selected="true" disabled="disabled" value=""> --Select Policy Term--</option>
			 	<option value="15"> 15 Years </option>
			 	<option value="20"> 20 Years </option>
			 	<option value="30"> 30 Years </option>
			 	<option value="40"> 40 Years </option>
			 	<option value="50"> 50 Years </option>
			 	<option value="60"> 60 Years </option>
			 	<option value="70"> 70 Years </option>
			    </select><br><br>

			    <label style="float: left;"> Premium Mode</label>
			    <select class="width" name="Pmode" id="Pmode"  required>
			    <option selected="true" disabled="disabled" value=""> --Select Premium Mode-- </option>
			 	<option value="12"> Annually Premium </option>
			 	<option value="6"> Half Annually Premium </option>
			 	<option value="3"> Quaterly Premium </option>
			 	<option value="1"> Monthly Premium </option>
			    </select><br><br>

			    <label style="float: left;"> Installment Amount</label>
			    <select class="width" name="installment" id="Installment"  required>
			    <option selected="true" disabled="disabled" value="" > --Select Installment Amount-- </option>
			 	<option value="24000"> Rs 24000 Annually</option>
			 	<option value="12000"> Rs 12000 Half Annually</option>
			 	<option value="6000"> Rs 6000 Quaterly</option>
			 	<option value="2000"> Rs 2000 Monthly</option>
			    </select><br><br>

			  
			     <button name="Submit" onclick="showHide()" >Calculate</button><br><br>


			    




			</form>
			
			
		</div>

		<div class="col-sm-6">
			
			<?php

if(isset($_POST['Submit'])){

 
    $Category= $_POST['Category'];
    $name= $_POST['name'];
	$date= $_POST['date'];
	$term= $_POST['term'];
	$Pmode= $_POST['Pmode'];
	$installment= $_POST['installment'];
	$totalAmount = $installment * $term ;

	if($Category == 'Single'){
		$Profit = 35 ;
	}
	else {
		$Profit = 30 ;
	}
	

	if($Profit == '35'){
		$netAmount = $totalAmount * 0.35 + $totalAmount;
	}
	else {
		$netAmount = $totalAmount * 0.3 + $totalAmount;
	}

	$pprofit =  $installment * $Profit/100     ;
	$tprofit = $pprofit * $term;
	$dat= (int)($term);

	// $maturity = strtotime($date."+ 30 years");
	// $maturity = $date + (int)($term);


	 // $date = date("Y-m-d");
	 // $mod_date = strtotime($date."+ $dat years");
	 // $maturity = date("Y-m-d",$mod_date) . "\n";


	$date=date_create("$date");
    date_add($date,date_interval_create_from_date_string("$dat years"));
    $maturity = date_format($date,"m-d-Y");
 


    echo '<div class="col-sm-6" id="shown_div" style="background-color: #F0F3F4; border-radius: 15px; width: 400px; margin-left: 20px; box-shadow: inset 5px -5px rgba(0,0,0,0.5); margin-top: 20px; font-family: halvatica; font-size: 12pt;" align="center">' ;

    echo '<label style="background-color: #DB343E; color: white; width: 380px; margin-top: 10px; font-size: 17pt; font-family: halvatica; border-radius: 10px;"> Calculated Premium </label><br><br><br>';
    echo '<label class="form-control" style="float: center; "">Policy Holder ' . strtoupper($name) . '</label><br><br>';
    echo "<span style='float: left;'>Maturity Year </span> <span style='margin-left: 120px;'> <b>". $maturity . "</b></span> <br><br>";
	echo "<span style='float: left;'>Policy Duration </span> <b><span style='margin-left: 125px;'>" . $term . "</b></span> Years" . " <br><br>";
    echo "<span style='float: left;'>Profit Rate </span> <b><span style='margin-left: 125px;'>" . $Profit . " %". "</b></span> <br><br>";
    echo "<span style='float: left;'>Total Amount </span> <b><span style='margin-left: 125px;'> Rs " . $totalAmount . "</b></span> <br><br>";
	echo "<span style='float: left;'>Installment </span> <b><span style='margin-left: 125px;'>Rs " . $installment . "</b></span> <br><br>";
	echo "<span style='float: left;'>Total Profit </span> <span style='margin-left: 125px;'><b>Rs " . $tprofit . "</b></span> <br><br>";
	echo "<span style='float: left;'>Net Amount At Time Of Maturity </span> <b>Rs " . $netAmount . "</b></span> <br><br>";

	echo "</div>";
}
?>
		</div>
		</div><br><Br><br>
	
</div>

</body>
</html>


