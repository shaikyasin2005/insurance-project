<?php

include "db.php";
session_start();


	 
if (isset($_POST['submit']))
{
      
		   $name=$_POST['name'];
		   $pass=$_POST['password'];
		   $userType=$_POST['userType'];


	$query="SELECT * from registration where name='$name' AND password='$pass' AND userType='$userType'";
	$run=mysqli_query($con, $query) ;
	if ($row = mysqli_num_rows( $run)>0){
	
	
	while ($roww = mysqli_fetch_array($run, MYSQLI_BOTH)) {
                         
		$name=$_SESSION['name'] = $roww['name'];
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
								header('Location: ' . $redirect);		
							}
							}					
								
	else{
		$err ="<p style='color:red'><span class='glyphicon glyphicon-remove-sign'></span>&nbsp;<b>Wrong Username/Password or User Type</b></p><br />";
	
		}
        }
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
	
	<div class="col-sm-12" style="background-color: #EC7A81; color: black; width: 350px ; margin-top: 40px; border-radius: 10px; margin-left: 350px; box-shadow:inset -5px -5px rgb(249, 102, 111); margin-bottom: 30px; font-family: comic; " align="center">

	<span style="color: white; font-weight: bold; font-size: 13pt; margin-top: 10px"><?php echo @$_GET['error']; ?></span>
		<form action="login.php" method="POST">
			
			<br> <label class="form-control" style="font-size: 14pt; "> Login Form </label><br>

			<label id="labelS"> Name</label> 
			<input type="text" name="name" placeholder="--Name--" id="input"><br><br>

			<label id="labelS"> Password</label>
			<input type="password" name="password" placeholder="--Password--" id="input"><br><br>

			<label id="labelS"> User Type</label>
			<select name="userType" id="input" style="width: 172px; height: 27px">
				<option value="" selected="true" disabled="disabled" > --Select User Type--</option>
				<option value="admin"> Admin</option>
				<option value="manager"> Manager</option>
				<option value="agent"> Agent</option>
				<option value="user"> User</option>

			</select><br><br><br>

			<input type="submit" name="submit" value="Login">
			<input type="reset" name=" reset" value="Reset"><br><br>
<?php   
echo @$err; ?>
		</form>
	</div>
</div>
</div>



</body>
</html>

<?php

?>