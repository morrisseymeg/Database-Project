<?php
$user_ID = $_SESSION['user_id'];
// if (isset($_POST['avail'])) {
//     $sql = "INSERT into avail (day_ID, avail, time_ID, user_ID, cell_ID)
//         VALUES (:day_ID, :avail, :time_ID, user_ID, :cell_ID)";
//     $stmt = $pdo->prepare($sql);
//         $stmt->execute(array(
//         ':day_ID, :avail, :time_ID, :user_ID, :cell_ID' => $_POST['day_ID, avail, time_ID, user_ID, cell_ID']));
// 	echo $_POST['avail'];
// $user_ID = $_SESSION['user_ID'];
// 	return;
// }
// echo "availability status: " ;
if (isset($_POST[29])) {
	$data = $_POST[29];
	echo "availability status: " . $data['avail'];
	echo "";
}
?>


