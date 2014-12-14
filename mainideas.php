<?php
require_once "pdo.php";
session_start();
$user_ID = $_SESSION['user_id'];
$uniqname = $_SESSION['uniqname'];
echo "<div>You are logged in as: ".$uniqname."</div></br>";
?>
<html>
  	<?php
		include("head.html");
	?>
  <body>
	</br>
	<p class='funf'>Your calendar</p>
	<form method="post" name="calendar" id="form" action="">
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

				// $user_ID = $_SESSION['user_id'];
				$stmt = $pdo->prepare("SELECT * from avail where user_id = :user_id");
						// $stmt->bindParam(":user_id", "bob");
				$stmt->execute(array(
					':user_id' => $user_ID
					));
				// ----------------------------------------------------
      			if($stmt->rowCount() == 0){
      				$avail = 0;
      			}else{
      				// getting avail out from the database..
      				$stmt = $pdo->prepare("SELECT avail from avail where user_id = :user_id AND day_id = :day_id
				        AND time_id = :time_id");
						
					$stmt->execute(array(
					
						':day_id' => $dayID,
			        	':time_id' => $timeID,
			        	
			        	':user_id'=> $user_ID,
					));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$avail = $row['avail'];
					
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
      echo("<script type='text/javascript'>
	var userID = ". $user_ID .
	"; </script>");
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
		
//############################## trying ajex again...
					// $availDATA = {};

		function testing(){
			wDay={};
			alert("Your availability is being sent..");
			// $('#dummy').load("dataProcess.php");
			// d = 0;
			for (var c=1; c<216; c++){
				// console.log("in testing for loop");

				// cellID = Number(td[c].id);
				// console.log("um???");
				dayID = c%8; // day id
				// timeID = Math.floor(cellID/8) +1; //time period id
				// console.log("in testing for loop");
				if ( dayID != 0 ){
					status = document.getElementById(c).innerHTML;

					console.log("status: ",status);
					// array of objects to parse into php
					wDay[c] = {
						avail: Number(status),
						user_id: userID
					}
					// d++;
					
					
				} // end of if
				} // end of for loop
				// postData();
				console.log("wDay:",wDay[1]);
				console.log("trying to send!!!");
    		$.ajax({ type: "POST",
             url: "dataProcess.php",
             data: wDay,
             success: function(response)
             {//check response: it's always good to check server output when developing...
                 console.log("sending data .."+response);
                 
             }
         }); // end of ajax
			} // end of function testing()
// 		function postData(){
// 			console.log("trying to send!!!");
//     		$.ajax({ type: "POST",
//              url: "dataProcess.php",
//              data: wDay,
//              dataType: 'json',
//              success: function(response)
//              {//check response: it's always good to check server output when developing...
//                  console.log("sending data .."+response);
//                  // alert('You will redirect in 10 seconds');
//                  // setTimeout(function()
//                  // {//just added timeout to give you some time to check console
//                  //    window.location = 'AddtoDatabase.php';
//                  // },10000);
//              }
//     });
// } // end of function postData()



//##############################
</script>
        
        </table>
		</br>
		<p id="buttons">
			<input class="btn btn-default" type="submit" value="Update My Schedule!!!!" onclick="testing()"/>
			<a class="btn btn-default" href="logout.php">Logout</a>
			<a class="btn btn-default" href="avail.php">Check Group Availability</a>
			<a class="btn btn-default" href="deleteuser.php">Delete User</a>
		</p>
	</form>
  </body>
</html>















