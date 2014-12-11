<?php
require_once "pdo.php";
session_start();
if (isset($_POST['hidden29'])){
	echo $_POST['hidden29'];
	// header('Location: mainideas.php');
	// return;
}

?>
<html>
  <head> Scheduler 
  	<script type="text/javascript" src="jquery.min.js">
		</script>
	</head>
  <body>
	<p class='funf'>Your calendar</p>
	<form method="post" name="calendar" action="">
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
		
		// ----------------------------------------------------
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
      			$callID = "hidden".$i;

				$user_ID = $_SESSION['user_id'];
				$stmt = $pdo->prepare("SELECT * from avail where user_id = ':user_id'");
						// $stmt->bindParam(":user_id", "bob");
				$stmt->execute(array(
					':user_id' => $user_ID
					));
				// ----------------------------------------------------
      			if($stmt->rowCount() == 0){
      				$avail = 0;
      			}else{
      				if (isset($_POST[$callID])){
      				$avail = $_POST[$callID];// FIX NEEDED: need to get from the database!!!!!!!!!!!!!!!!!!!!!! 
      			}
      			}
				// ----------------------------------------------------



				echo "<input id='hidden$i' type='hidden' name='hidden$i' value='$avail'/><td id='$i' name='$i' class='clickable'  onclick='changeAvail(this)'>$avail</td>".PHP_EOL;
      			if ($i%8==7){
      				echo "</tr>".PHP_EOL;
      			}	
				
			}
		
      		$i++;
			
      	}
      	// ----------------------------------------------------
      ?>

		<script type="text/javascript">
		console.log('Hello');

		function changeAvail(el){
			cellID = $(el).attr("id");
			hiddenID = "hidden".concat(cellID);
			console.log("hiddenID before click: ", hiddenID);
			console.log("value: ",document.getElementById(hiddenID).value);
			avail = document.getElementById(hiddenID).value
			if (avail==0){
				avail = 1;
			} else{
				avail = 0;
			}
			console.log('avail after click: ', avail,'\n');
			document.getElementById(cellID).innerHTML = avail;
			document.getElementById(hiddenID).value = avail;
			console.log('hiddenID value after click: ',document.getElementById(hiddenID).value);
		}
		

		function testing(){
			alert("it is sending data..");
		}
</script>
      <?php include "dataProcess.php"; ?>
    </table>
		
		<input type="submit" value="Update My Schedule!!!!" onclick="testing()"/>
	</form>

>>>>>>> origin/master
<a href="logout.php">Logout</a>
  </body>
</html>















