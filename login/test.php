<!DOCTYPE html>
<html>
<head>
	<title>test</title>

	<script type="text/javascript">
    function showHide() {

      var y = document.getElementById('hidden_div');

         // if (  document.getElementById("hidden_div") ){
         //  document.getElementById("hidden_div").style.display = "none" ;
         // }

         // else {
         //  document.getElementById("hidden_div").style.display = "none" ;

         // }


         if (y.style.display === 'block') {
        y.style.display = 'none';
    } else {
        y.style.display = 'block';
    }
          
    }
</script>



<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'block') {
        x.style.display = 'none';
    } else {
        x.style.display = 'block';
    }
}
</script>


</head>
<body align="center">
  <div id="hidden_div" style="display: block;" >
<hr>
<hr>
   
  	<p>Visible Div</p>

 </div>
<input type="submit" value="Guess!" id="btn" name="btn" onclick="showHide()" >


 



<hr>
<hr>
  <p align="center"><button type="button" class="btn btn-info" onclick="myFunction()" >Return Book</button></p>
  
  <div id="myDIV" style="display:none">
Div shown
  </div>


</body>
</html>