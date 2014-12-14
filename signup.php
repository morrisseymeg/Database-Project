<?php
require_once "pdo.php";
session_start();
if ( isset($_POST['uniqname']) && isset($_POST['email']) && isset($_POST['pw']) && isset($_POST['rpw'])) {

if ( strlen($_POST['uniqname']) < 1 || strlen($_POST['email']) < 1 || strlen($_POST['pw']) < 1 || $_POST['pw'] != $_POST['rpw']) {
		
        $_SESSION['error'] = 'Please verify your info!';
        header("Location: signup.php");
        return;
    }
$stmt = $pdo->query("SELECT uniqname FROM userinfo");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){ 
    if ( $_POST['uniqname'] == $row['uniqname']) {
        $_SESSION['error'] = 'That uniqname has been used. Would you like to <a href="index.php">log in</a>?';
        header("Location: signup.php");
        die;
        }
    }
    $sql = "INSERT INTO userinfo ( uniqname, email, pw) 
          VALUES ( :uniqname, :email, :pw)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    // ':id' => $_POST['id'],
    ':uniqname' => $_POST['uniqname'],
    ':email' => $_POST['email'],
    ':pw' => sha1($_POST['pw'])));
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
		<?php
			include("head.html");
		?>
	<body>
		<form id="formstyle" method="post">
			<h2>Register:</h2>
			</br>
			<b>User Name:</b>
			</br>
			<input type="text" name="uniqname" placeholder="Enter your UMSI uniqname"  > 
			</br>
			<b>E-mail Address:</b>
			</br>
			<input type="email" name="email" placeholder="Enter your preferred email address">
			</br>

			<b>Password:</b>
			</br>
			<input type="password" name="pw" placeholder="Enter a password" ></br>
			<b>Re-type Password:</b>
			</br>
			<input type="password" name="rpw" placeholder="Verify your password" >
			</br>
			</br>
			<input class="btn btn-default" type="submit" value="Register!" >
		</form>
	</body>
</html>