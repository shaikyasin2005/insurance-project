 <!--Session Start -->
<?php  
session_start();        

if(!$_SESSION['name']){
	header('Window-target: _top');
	header('location:../login/login.php?error=You are not an administrator ');	
}
?><!--On Line #7Redirects -->


<html>
<head>
<title>Health Insurance System</title>
<link type="text/css" rel="stylesheet" href="abc1.css"/>
<style>
 
#new a{
	text-decoration:none;
}
#new a :hover{
	color:red;
}
</style>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);

    if(today.getHours() >= 0 && today.getHours() < 13) 
{      
document.getElementById('greating').innerHTML='Good Morning'; 
} 
else 
{      
document.getElementById('greating').innerHTML='Good Evening'; 
}

}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>
<body oncontextmenu="return false" onload="startTime()">
<div style="width:100%;  height:100%;  margin:0 auto">

<div class="container "style="width:100%;  height:30px; " >
<div class ="wrapper">

<div style="float: left"> 
<img src="../images/logo.png" height="70px" width="180px"></div>
	
	  <div align="center">
		  
		
		  <h2><font color="blue"> <br>" Admin Control Panel "  </font></h2>
		   
		  	  
	             	</div>  
  	     	      </div>
	     	     </div>
<div id="clear">
	  </div>
<div class="container " style= "width:100%;  height:40px; line-height:40px; margin-top:40px" >
<div class ="wrapper">

          <div style=" background-color:#FFA07A;">
<div id="menu">
 	  
		
<?php echo "<h3 align='left'>  <font color='blue'><b>".str_repeat('&nbsp', 50)." Health Insurance System ".str_repeat('&nbsp', 50)."<span id='txt'> </span>". str_repeat('&nbsp', 70). "<span id='greating'> </span>&nbsp&nbsp&nbsp&nbsp". strtoupper( $_SESSION['name']) . "</b></font> </h3> " ?>  
		 
		   
</div>
</div>
                     </div>
	     	     </div>
<div style="width:15%;  height:540px; background-color:#FFA07A; float:left;  overflow: scroll;">	 
		
<div id="new"><br><h3><center>
<hr><br>
<a title="Managers List"href="manager.php"  target="content">Managers </a><br><br>
<a title="Registered Customers"href="registered_customers.php"  target="content">Customers </a><br><br>
<a title="Policies"href="policy.php"  target="content">Policy</a><br><br>
<a title="Customer's Policy"href="customer_policy.php"  target="content">Customer's Policy</a><br><br>
<a title="Feedback"href="feedback.php"  target="content">Feedback</a><br><br>
<a title="refresh"href="admin.php" >Refresh</a><br><br>
<a title="Logout"href="../login/logout.php" >Logout</a><br><br></center>
<hr>
</h3>

</div>		
				 
				 
				 
				 
				 
</div>				 
				 
				 
<div id="content"style="width:85%;  height:540px; background-color:#87CEFA; float:right;">	 
				 
				 
				 
				 
				 
	<iframe name="content" height="540px" width="100%" ></iframe>			 
</div>				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
</div>
</body>
</html>






