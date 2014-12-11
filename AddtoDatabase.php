<?php
	require_once "pdo.php";
	// session_start();
	// echo $user_ID = $_SESSION['user_id'];
	// $user_ID = $_SESSION['user_id'];
	
	// echo "add data user_ID: " . $_SESSION['user_id'];
	for ($d=0; $d<189; $d++){
		if (isset($_POST[$d])) {
			$data = $_POST[$d];
			echo "\n"."cell_ID: " . $data['cell_ID']."\n";
			echo "type of avail before:" . gettype($data['avail'])."\n";
		    $data['avail'] = intval($data['avail']);
		    echo "type of avail after:" . gettype($data['avail'])."\n";
		    echo "\n"."availability: " . $data['avail']."\n";
			$sql = "INSERT into avail (day_id, avail, time_id, user_id, cell_ID)
		        VALUES (:day_id, :avail, :time_id, :user_id, :cell_ID)";
		    $stmt = $pdo->prepare($sql);
		    
		        $stmt->execute(array(
		        // ':day_id, :avail, :time_id,:user_id, :cell_ID' => $data['day_id, avail, time_id, user_id, cell_ID'],
		        	':day_id' => $data['day_id'],
		        	':time_id' => $data['time_id'],
		        	':avail'=> $data['avail'],
		        	':user_id'=> $data['user_id'],
		        	':cell_ID'=> $data['cell_ID'],
		        ));
			echo $data['avail'];
		// threw error on foreign key so got rid of foreign key

		}
	}
?>


