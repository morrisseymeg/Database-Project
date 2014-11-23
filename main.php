<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['day'])) {
     
     $sql = "INSERT INTO days (day) 
              VALUES (:day)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':day' => $_POST['day'],
   $_SESSION['success'] = 'Record Added';
   header( 'Location: index.php' ) ;
   return;
}
//Flash pattern
if (isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>