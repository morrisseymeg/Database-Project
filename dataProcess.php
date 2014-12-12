<?php
	
	$user_ID = intval($_SESSION['user_id']);
	echo "dataprocess user id: ".$user_ID.'   '."</br>";
	echo "type of user_ID: ".gettype($user_ID).'   '."</br>";
	// $sql = "SELECT * from avail where user_id = :user_id";
	$stmt = $pdo->prepare("SELECT * from avail where user_id = :user_id");
			// $stmt->bindParam(":user_id", "bob");
	$stmt->execute(array(
		':user_id' => $user_ID,
		));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	echo "row count: ". $stmt->rowCount().'   '."</br>";
	// if ( $row !== false ) {
	echo("<script type='text/javascript'>
	var userID = ". $user_ID .
	"; </script>");
	// echo "$avail = <script type='text/javascript'>document.getElementById(hiddenID).value </script>;";

	if($stmt->rowCount() > 0){
		echo "there is something".'   '."</br>";

		$count = 0;
		while ($count<216){
			$callID = "hidden".$count;
				echo $callID;
			$dayID = $count%8; // day id
			if ($dayID != 0){
			$timeID = floor($count/8) +1; //time period id
						$sql = "UPDATE avail SET  
				            avail = :avail 
				            WHERE user_id = :user_id
				            AND day_id = :day_id
				            AND time_id = :time_id";
				    	$stmt = $pdo->prepare($sql);
				    	$stmt->execute(array(
					        	':day_id' => $dayID,
					        	':time_id' => $timeID,
					        	':avail'=> $_POST[$callID],
					        	':user_id'=> $user_ID,
					        	// ':cell_ID'=> $count,
					        ));
				    }
	    	$count++;

	    }
	} else{
	echo "need to create row.".'   ';

	$count = 0;
	while ($count<216){
		$callID = "hidden".$count;
		if (isset($_POST[$callID])){
			// echo $callID;
			$dayID = $count%8; // day id
			$timeID = floor($count/8) +1; //time period id
			
  			$sql = "INSERT into avail (day_id, avail, time_id, user_id, cell_ID)
		        VALUES (:day_id, :avail, :time_id, :user_id, :cell_ID)
		        ";
		    $stmt = $pdo->prepare($sql);
		    
		        $stmt->execute(array(
		        	':day_id' => $dayID,
		        	':time_id' => $timeID,
		        	':avail'=> $_POST[$callID],
		        	':user_id'=> $user_ID,
		        	':cell_ID'=> $count,
		        ));
		}
		$count++;
					}
					
	}

?>


