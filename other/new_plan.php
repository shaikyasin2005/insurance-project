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
  
                  #plan{
                        border: 1px solid #ccc;
                        text-align: center;
                        margin-left: 65px;
                        float: center;
                  }

                  #plan p.price{
                            color: #ce153f;
                            font-size: 24px;
                            font-size: 2rem;
                            margin-bottom: 0;
                            font-weight: 600;
                    }

                    #plan a{

                          color: #ce153f;
                            margin: 0 0 0;
                            text-align: center;
                            display: inline-block;
                            width: 59%;
                    }


                    #plan  a.btn{
                            margin: 9px 0 10px;
                            background: #282d31;
                            color: #fff;
                    }

                    #plan  a.btn:hover{
                            margin: 9px 0 10px;
                            background: #ce153f;
                            color: black;
                    }

                             
                    h4{
                            color: #555;
                            font-weight: 100;
                             
                    }

                   


</style>

</head>
<body>
<div class="container" style="border: 2px solid #73EE13;"> 

<?php

include "header.php";

?>

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
  
  <div class="col-sm-12" >

  <h3 align="center" style="color: #ce153f;">Insurance Plans</h3>


  </div>

</div>


<div class="row" style="margin-bottom: 20px">
  <?php 
  $qwery ="SELECT * from policy";
  $run = mysqli_query($con, $qwery);
  while ($row= mysqli_fetch_array($run, MYSQLI_BOTH)) {
    echo "
    <div class='col-sm-3' id='plan' float='left'>
         
         <h4><b> $row[plan_name] </b></h4>
         <p class='price'>PKR ". number_format($row['SumAssured']) ."</p>
          <h5>Sum Assured</h5>
          <p class='price'>PKR ". number_format($row['PremiumPerYear']) ."</p>
          <h5>Premium/Year</h5>
          <a href='#' class='btn' >Enroll In Plan</a>
              <details>
        <summary style='color: #ce153f; cursor: pointer;''>Get Details</summary>
         <br><br> <span style='float: left;'> Policy Category </span> <span style='float: right;'> $row[PolicyCategory]</span><br> 
         <span style='float: left;'> Policy Term </span> <span style='float: right;'> $row[PolicyTerm] Years</span><br> 
         <span style='float: left;'> Profit Rate </span> <span style='float: right;'> $row[ProfitRate] %</span><br> 
         <span style='float: left;'> Installment Type </span> <span style='float: right;'> $row[InstallmentType]</span><br>
          <span style='float: left;'> Installment Amount </span> <span style='float: right;'> Rs ". number_format($row['InstallmentAmount']) ."</span><br>
                          </details>




    </div>";

  } ?>
                                
                      
                              
  


  <!-- <div class="col-sm-3" id="plan">

                              <h4>Accidental Hospitalization</h4>
                                <p class="price">PKR 100,000</p>
                                <h5>Sum Assured</h5>
                                <p class="price">PKR 240</p>
                                <h5>Premium/Year</h5>
                                <a href="#_" class="addOns-gold btn" data-value="240" data-name="accidental_hospitalization">Enroll In Plan</a>
                                <a href="#-" class="getDetails">Get Details</a>
                                

  </div>

  <div class="col-sm-3" id="plan">

                                  <h4>Accidental Disability</h4>
                                    <p class="price">PKR 100,000</p>
                                    <h5>Sum Assured</h5>
                                    <p class="price">PKR 160</p>
                                    <h5>Premium/Year</h5>
                                    <a href="#_" class="addOns-gold btn" data-value="160" data-name="accidental_disability">Enroll In Plan</a>
                                    <a href="#-" class="getDetails">Get Details</a>
                                    

  </div>
 -->
</div>


</div>

</body>
</html>