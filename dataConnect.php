<script type="text/javascript">
	var table = $('#target');
	var timePeriod = table.find('tr');
		// alert(day);
	// console.log('hey');
	// console.log(timePeriod.length);
	
	// console.log(timePeriod[1]);
	i = 1;
	wDay = array(range(0:6));
	console.log(wDay);
	while (i<timePeriod.length){
		console.log(timePeriod[i]);
		i++;
	}
	

    // var table = $('#target');
    // 		var day = table.find('tr');
    // 		alert(day);
    	// $('#target').ready(function(event)){
    	// 	event.preventDefauilt();
    	// 	var table = $('#target');
    	// 	var day = table.find('tr');
    	// 	alert(day);
    	// 	window.console $$ console.log('table grabbed');

    	// }


</script>

<?php
// if ( isset($_POST['day'])) {
     

//   $sql = "INSERT INTO days (day, user_id) 
//     VALUES (:day, :user_id)";

//   $stmt = $pdo->prepare($sql);
//   $stmt->execute(array(
//     ':day' => $_POST['day'],
//     ':user_id' => $_SESSION['user_id']));
//   // $_SESSION['success'] = 'logged in';
//   // header( 'Location: index.php' ) ;
//   // return;
// }

//Flash pattern
// echo '<p>user_id: '.$_SESSION['user_id'].'</p>';
// if ( isset($_SESSION['user_id']) ) {
//   echo $_SESSION['success'];
//   echo '<p>user_id: '.$_SESSION['user_id'].'</p>';
// //   echo "hello";
//   }
  
// if (isset($_SESSION['error']) ) {
//     echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
//     unset($_SESSION['error']);
// }