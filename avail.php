<?php
require_once "pdo.php";
session_start();
$user_ID = $_SESSION['user_id'];
echo "Generating your group's availability</br>";
?>
<html>
	<?php
		include("head.html");
	?>
	<body>
		<?php
			$stmt = $pdo->query('SELECT days.day, time.Time
		-- 		, CASE
		-- when sum(avail.avail) = 0 then "not available"
  -- 		 when sum(avail.avail)>0 then "available"
  --   	end 
  --  	as Availability

from avail join days on avail.day_id = days.day_id
join time on avail.time_id = time.time_id
group by avail.day_id, avail.time_id 
having sum(avail.avail)>0');
			// $sth->execute();
			$rows = $stmt->fetchall(PDO::FETCH_ASSOC);
// print_r($rows);
			foreach ($rows as $row) {
			// 	// echo sizeof($rows);
				echo $row["day"]." ".$row['Time']."</br>";
			}
			// echo $rows[7];
?>
<a class="btn btn-default" href="mainideas.php">Go Back to Update my Availability</a>
<a class="btn btn-default" href="logout.php">Logout</a>
        
	</body>
</html>
