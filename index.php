<?php
    require_once "pdo.php";
    session_start();
    if ( isset($_POST["uniqname"]) && isset($_POST["pw"]) ) {
        
        $uniqname = $_POST['uniqname'];
        $stmt = $pdo->prepare("SELECT user_id, uniqname, pw FROM userinfo WHERE uniqname = :uniqname");
        
        $stmt->execute(array(":uniqname" => $uniqname));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($_POST['uniqname'] == $row['uniqname'] && $_POST['pw'] == $row['pw']){
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['success'] = "you are logged in";
                    unset($_SESSION["error"]);
                    header('Location: main.php');
                    
                }
                else{
                    $_SESSION['error'] = "Your uniqname or password is incorrect.";
                    
                }

            
            }  
            clearstatcache()
        ?>
<html>
<head>
</head>
<body style="font-family: sans-serif;">
<h1>Please Log In</h1>
<?php
    if ( isset($_SESSION["error"]) ) {
        echo('<p style="color:red">Error: '.$_SESSION["error"]."</p>\n");
        unset($_SESSION["error"]);
    }
    
    
?>
<form method="post">
<p>Uniqname: <input type="text" name="uniqname" value=""></p>
<p>Password: <input type="password" name="pw" value=""></p> 
<p><input type="submit" value="Log In"></p>
</form>
</br>
<a href="signup.php">First time? Sign up here!</a>
</body>
</html>
