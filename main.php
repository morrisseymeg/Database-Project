<?php
require_once "pdo.php";
session_start();

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
?>

<html>
  <head> Scheduler </head>
  <body>
    <p>Your calendar</p>
    <table>
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
      <tr> </tr>
      <td> </td>
      <td> Mo </td>
      <td> Tu </td>
      <td> Wed</td>
      <td> Th </td>
      <td> Fr </td>
      <td> Sa </td>
      <td> Su </td>
      <?php
      	$i = 0;
		$j = 8;
		$t = 0;
    $p = 0;
      	while ($i<224) {
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
      		  echo "<td id='$i'>".$i."</td>".PHP_EOL;
        }
      		$i++;
      	}
      ?>
    </table>
  </body>
</html>













