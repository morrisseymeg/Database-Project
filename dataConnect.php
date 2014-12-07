<script type="text/javascript">

/* avail variables: 
	avail
	day_id
	time_id
	??user_id
	cell_ID
*/
	wDay = {};
	// for (var d = 0; d <= 6; d++) {
	// 	wDay[d] = [];
	// }
	// console.log(wDay.length);
	var table = $('#target');
	var td = document.getElementsByTagName('td');
	// var status = document.getElementById(cellID).value;
	// var timePeriod = table.find('tr');
	//td.length
	console.log(td.length);
	d = 0;
	for (var c=1; c<td.length; c++){
		cellID = Number(td[c].id);
		// console.log(typeof(cellID));
		dayID = cellID%8; // day id
		timeID = Math.floor(cellID/8) +1; //time period id
		
		if ( !isNaN(dayID)  && dayID !="0" ){
			status = document.getElementById(cellID).firstChild.data;
			// array of objects to parse into php
			wDay[d] = {
				avail: Number(status),
				day_id: dayID,
				time_id: timeID,
				cell_ID: cellID
			}
			d++;
			
		} 
      	
		
		// tableData = timePeriod.getElementsByTagName('td');
		
	}
	// console.log(wDay);
	// console.log(wDay[180]);
	console.log(d);
	// dayID = timePeriod.find(value)
	// i = 1;
	// var json = JSON.stringify(wDay);
	
	// while (i<timePeriod.length){

	// 	i++;
	// }
	// console.log('down here');
	// console.log(wDay);
	// console.log(timePeriod[i]);
	// 	calibrate = i-1;
	// 	console.log(wDay[calibrate]);
	// 	wDay[calibrate].push(timePeriod[i]);
	// 	console.log(wDay[calibrate]);

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
function postData()
{
    $.ajax({ type: "POST",
             url: "AddtoDatabase.php",
             data: wDay,//no need to call JSON.stringify etc... jQ does this for you
             
             success: function(response)
             {//check response: it's always good to check server output when developing...
                 console.log("sending data .."+response);
                 // alert('You will redirect in 10 seconds');
                 // setTimeout(function()
                 // {//just added timeout to give you some time to check console
                 //    window.location = 'AddtoDatabase.php';
                 // },10000);
             }
    });
}


</script>

<?php
// $dataArray = json_decode($json);
// var_dump($dataArray);
// if ( isset($_POST['day'])) {
// $_POST['a']

  // $sql = "INSERT INTO days (day, user_id) 
  //   VALUES (:day, :user_id)";

  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(array(
  //   ':day' => $_POST['day'],
  //   ':user_id' => $_SESSION['user_id']));
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
// -->
?>