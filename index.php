<?php
    require_once "pdo.php";
    session_start();
    if ( isset($_POST["uniqname"]) && isset($_POST["pw"]) ) {
        
        $uniqname = $_POST['uniqname'];
        $_SESSION['uniqname'] = $uniqname;
        $stmt = $pdo->prepare("SELECT user_id, uniqname, pw FROM userinfo WHERE uniqname = :uniqname");
        
        $stmt->execute(array(":uniqname" => $uniqname));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // $_SESSION['uniqname'] = $row['uniqname'];
        if ($_POST['uniqname'] == $row['uniqname'] && sha1($_POST['pw']) == $row['pw']){

                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['success'] = "you are logged in";
                    unset($_SESSION["error"]);
                    header('Location: mainideas.php');
                    
                }
                elseif($row['user_id']===NULL){
                    $_SESSION['error'] = "It seems like you don't have an account yet, would you like to register?";
                }
                else
                { 
                    $_SESSION['error'] = "Your uniqname or password is incorrect.";
                    
                }

            
            }  
            clearstatcache()
        ?>
<html>
	<?php
		include("head.html");
	?>
<body id="bodystyle">
	<h1>Please Log In</h1>
	<?php
		if ( isset($_SESSION["error"]) ) {
			echo('<p style="color:red">Error: '.$_SESSION["error"]."</p>\n");
			unset($_SESSION["error"]);
		}
	?>
	<form id="formstyle" method="post">
		<p>Uniqname: <input type="text" name="uniqname" value=""></p>
		<p>Password: <input type="password" name="pw" value=""></p> 
		<p><input class="btn btn-default" type="submit" value="Log In">
		<a class="btn btn-default" id="mutton" href="signup.php">First time? Sign up here!</a></p>
	</form>

</body>
</br>
<footer>
	<?php
		include("footer.html");
	?>
</footer>
</html>
