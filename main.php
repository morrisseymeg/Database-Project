<?php
require_once "pdo.php";
session_start();
// echo $user_ID = $_SESSION['user_id'];
?>
<html>
  <head> Scheduler 
  	<script type="text/javascript" src="jquery.min.js">
		</script>
	</head>
  <body>
	<p class='funf'>Your calendar</p>
	<form>
    <table id="target">
    <?php
    	$c = 0;
    	while ($c<9){
    		if ($c%2 == 0){
    			echo "
    		      <col style='background-color: #cfc096 ; color: #ffffff' class='time_id'/>";
    		  }
    		else {
    			echo "
    		      <col style='background-color: #989c97 ; color: #ffffff' class='time_id'/>";
    		}
    		$c++;
    	}
      ?>
      <tr> 
      <td> </td>
      <td> Mo </td>
      <td> Tu </td>
      <td> Wed</td>
      <td> Th </td>
      <td> Fr </td>
      <td> Sa </td>
      <td> Su </td>
      </tr>
      <?php
      	$i = 0; // cell counter
		$j = 8; // hour counter for time starting at 8am
		$t = 0; // half hour increment for time
    	$p = 0; // time period counter for first column

      	while ($i<216) {
      		if ($i%8==0){
      			echo "<tr>".PHP_EOL;
				$j1 = $j + 1;
				$p++;
        		
				if ($t%2==0) {
					echo "<td id='time_$p'>"."$j:30 - $j1:00 \n"."</td>".PHP_EOL;
					$j++;
				} else {
				  echo "<td id='time_$p'>"."$j:00- $j:30 \n"."</td>".PHP_EOL;
				}
				$t++;
      			

      		} else {
      			$timeID = $p; // time period id #1
      			$dayID = $i%8; // day id
      			$testing = floor($i/8) +1; //time period id #2
      			$avail = 0;


      			echo "<td id='$i' class='clickable' value=$avail onclick='changeAvail(this)'>".$avail."</td>".PHP_EOL;
// 

      			if ($i%8==7){
      				echo "</tr>".PHP_EOL;
      			}
      			
        }
      		$i++;
      	}

      ?>
      </form>
		<script type="text/javascript">
		console.log('Hello');
		function changeAvail(el){
			// alert(el);
			// console.log(el.value);
			cellID = $(el).attr("id");
			avail = ($(el).attr("value") + 1)%2;
			console.log('avail before click: ', $(el).attr("value"),'\n');
			console.log('avail after click: ', avail,'\n');
			console.log(document.getElementById(cellID).innerHTML);
			document.getElementById(cellID).innerHTML = avail;
			// $(el).attr("value") = avail;
			// alert(avail);
			// alert($(el).attr("id"));
		}
		/* the .toggle function is not working properly but at least it's doing something!  */
	// $(".clickable").click( function () {
	// $( this ).toggle();
	// })	;



</script>
      <?php include "dataConnect.php"; ?>
    </table>
	<form>
		
		<p><input type="submit" value="Update My Schedule!!!!" onclick="postData(); return false;" /></p>
	</form>
<a href="logout.php">Logout</a>

  </body>
</html>















