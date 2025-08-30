<?php

include "db.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Health Insurance System</title>

	<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"/>
<script src="../js/jquery-3.1.1.min.js"  > </script>
<script type="text/javascript" src="../js/bootstrapp.min.js"></script>


<style type="text/css">
	
	#labelS{

		float: left;
	}

	#input{

		float: right;
	}
</style>
</head>
<body>
<div class="container" style="border: 2px solid #73EE13;"> 

<?php

include "header.php";

?>


<div class="row">
	
	<div class="col-sm-12" style="background-color: #66F9C6; color: black; width: 350px ; margin-top: 40px; border-radius: 10px; margin-left: 350px; box-shadow:inset -5px -5px rgb(249, 102, 111); margin-bottom: 30px; font-family: comic; " align="center">
		<form action="" method="POST">
			
			<br> <label class="form-control" style="font-size: 14pt; "> Registration Form </label><br>

			<label id="labelS">User Name</label> 
			<input type="text" name="name" placeholder="--User Name--" id="input"><br><br>

			<label id="labelS">Email</label> 
			<input type="text" name="email" placeholder="--Email--" id="input"><br><br>

			<label id="labelS">Number</label> 
			<input type="text" name="Number" placeholder="--Number--" id="input"><br><br>

			<label id="labelS">Address</label> 
			<input type="text" name="Address" placeholder="--Address--" id="input"><br><br>

			<label id="labelS"> Password</label>
			<input type="password" name="password" placeholder="--Password--" id="input"><br><br>		

			<input type="submit" name="submit" value="Register">
			<input type="reset" name=" reset" value="Reset"><br><br>

		</form>
	</div>
</div>
</div>



</body>
</html>

<?php
	if(isset($_POST['submit'])){
		

		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass  = $_POST['password'];	
		$Number  = $_POST['Number'];	
		$Address  = $_POST['Address'];	
        
 
		$query="insert into registration set name='$name', email='$email', password='$pass', num='$Number', userType='user', address='$Address' ";
			
			$result = mysqli_query($con, $query);

			header('Location: ../index.php');


}


?>