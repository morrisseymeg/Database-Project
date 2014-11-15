<?php
require_once "pdo.php";
session_start();


$sql = "INSERT INTO userinfo (id, uniqname, email, pw) 
          VALUES (:id, :uniqname, :email, :pw)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':id' => $_POST['id'],
    ':uniqname' => $_POST['uniqname'],
    ':email' => $_POST['email'],
    ':pw' => $_POST['pw']));
$_SESSION['success'] = 'Registration complete';
header( 'Location: index.php' ) ;
return;
}
//Flash pattern
if (isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

?>



<html>
<head><title>Register Page</title></head>
<body><form method="post">
<h2>Register:</h2><br /><br />
<b>User Name:</b><br />
<input type="text" name="username" /><br />
<b>Password:</b><br />
<input type="password" name="password" /><br />
<b>Re-type Password:</b><br/>
<input type="password" name="repassword" /><br />
<input type="submit" value="Register!" /></form>
</body>
</html>