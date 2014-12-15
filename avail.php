<?php
require_once "pdo.php";
session_start();
$user_ID = $_SESSION['user_id'];
echo "Generating your group's availability";
?>
<html>
	<?php
		include("head.html");
	?>
	<body>
		<?php
			$stmt = $pdo->query('SELECT sum(avail.avail) as "Number of available" , days.day, time.Time, CASE
		when sum(avail.avail) = 0 then "not available"
  		 when sum(avail.avail)>0 then "available"
    	end 
   	as Availability

from avail join days on avail.day_id = days.day_id
join time on avail.time_id = time.time_id
group by avail.time_id, avail.day_id 
having sum(avail.avail)>0');
?>
        
	</body>
</html>
