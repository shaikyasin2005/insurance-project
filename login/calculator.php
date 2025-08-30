<!DOCTYPE html>
<html>
<head>
	<title>Health Insurance System</title>

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<script src="js/jquery-3.1.1.min.js"  > </script>
<script type="text/javascript" src="js/bootstrapp.min.js"></script>

</head>
<body>
<div class="container" style="border: 2px solid #73EE13">

	<?php include "header.php" ?>

	<div class="row">

		 
			

			<div class="col-sm-6" id="hidden_div" style="background-color: #F0F3F4; border-radius: 15px; width: 550px; margin-left: 30px; z-index: 10px; box-shadow: inset -5px -5px rgba(0,0,0,0.5); margin-top: 20px; display: block; font-family: helvatica; " align="center" >


			<form action="" method="POST" >
				
				<label style="background-color: #DB343E; color: white; width: 500px; margin-top: 10px; font-size: 17pt; font-family: halvatica; border-radius: 10px;"> Premium Calculator</label><br><br><br>

				<label class="form-control" style="float: center; "">Enter Information</label><br><br>
				
				<label style="float: left">Name</label>
				<input type="test" name="name" placeholder="--Your Name--" style="margin-left: 35px" required><br><br>

				<label style="float: left">Policy Start Date</label>
				<input type="date" name="date" style="margin-right: 60px" required><br><br>

				<label style="float: left;">Policy Category</label>
				<select name="Category" style="margin-right: 60px" required>
			    <option selected="true" disabled="disabled" value="" > --Select Category--</option>
			 	<option value="Single"> Single </option>
			 	<option value="Jointee"> Jointee </option>
			    </select><br><br>

			    <label style="float: left;"> Policy Type</label>
			    <select name="type" style="float: center;" required>
			    <option selected="true" disabled="disabled" value=""> --Select Policy-- </option>
			 	<option value=" "> Whole Life </option>
			 	<option value=" "> Non Medical WHole Life </option>
			    </select><br><br>

			    <label style="float: left;"> Policy term</label>
			    <select name="term" id="term" style="margin-right: 15px" required>
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
			    <select name="Pmode" id="Pmode" style="margin-right: 15px;" required>
			    <option selected="true" disabled="disabled" value=""> --Select Premium Mode-- </option>
			 	<option value="12"> Annually Premium </option>
			 	<option value="6"> Half Annually Premium </option>
			 	<option value="3"> Quaterly Premium </option>
			 	<option value="1"> Monthly Premium </option>
			    </select><br><br>

			    <label style="float: left;"> Installment Amount</label>
			    <select name="installment" id="Installment" style="margin-right: 20px;" required>
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
	echo "<span style='float: left;'>Net Amount At Time Of Maturity </span> <b>Rs " . $netAmount . "</b></span> <br><br><br>";

	echo "</div>";
}
?>
		</div>
		</div><br><Br><br>
	
</div>

</body>
</html>


