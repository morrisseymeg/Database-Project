<?php
require_once "pdo.php";
session_start();
	if ( !isset($_SESSION['user_id'] )) {
		echo "You must be logged in to perform this action.";
		die;
		}
    if ( isset($_POST["uniqname"]) && isset($_POST["pw"]) ) {
        
        $uniqname = $_POST['uniqname'];
		$pw = sha1($_POST['pw']);
        $stmt = $pdo->prepare("SELECT user_id, uniqname, pw FROM userinfo WHERE uniqname = :uniqname");
        
        $stmt->execute(array(":uniqname" => $uniqname));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($_POST['uniqname'] == $row['uniqname'] && sha1($_POST['pw']) == $row['pw']){
            $sql = "DELETE FROM userinfo WHERE uniqname = $uniqname and pw = $pw";
			$stmt = $pdo->prepare("DELETE FROM userinfo WHERE uniqname = :uniqname and pw = :pw");
			//var_dump($row);
			$stmt->execute(array(":uniqname" => $uniqname, ":pw" => $pw));
			echo 'User successfully deleted.';
                }
                elseif($row['user_id']===NULL){
                    $_SESSION['error'] = "It seems like you don't have an account yet, would you like to register?";
                }
                else {
                    $_SESSION['error'] = "Your uniqname or password is incorrect.";                    
                }            
            } 
	?>
<html>
<?php
		include("head.html");
	?>
<body>	
	<p>Delete User</p>
	<?php
		if ( isset($_SESSION["error"]) ) {
			echo('<p style="color:red">Error: '.$_SESSION["error"]."</p>\n");
			unset($_SESSION["error"]);
		}
	?>	
	<form id="formstyle" method="post">
		<p>Uniqname: <input type="text" name="uniqname" value=""></p>
		<p>Password: <input type="password" name="pw" value=""></p> 
		<p id="buttons">
			<input class="btn btn-default" type="submit" value="Delete User">
			<a class="btn btn-default" href="signup.php">Register</a>
		</p>
	</form>
</body>
</br>
<footer>
	<?php
		include("footer.html");
	?>
</footer>
</html>