<?php
    require_once "pdo.php";
    session_start();
    if ( isset($_POST["uniqname"]) && isset($_POST["pw"]) ) {
        // unset($_SESSION["account"]);  // Logout current user
        // if ( $_POST['pw'] == '***' ) { //need password/user database
        //     $_SESSION["account"] = $_POST["account"];
        //     $_SESSION["success"] = "Logged in.";
        //     header( 'Location: index.php' ) ;
        //     return;
        // } else {
        //     $_SESSION["error"] = "Incorrect password.";
        //     header( 'Location: login.php' ) ;
        //     return;
        // }
        $uniqname = $_POST['uniqname'];
    // How to do something like where userinfo.uniqname == $uniqname?
        $stmt = $pdo->query("SELECT user_id, uniqname, pw FROM userinfo");
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){  
        if ($_POST['uniqname'] == $row['uniqname'] && sha1($_POST['pw']) == $row['pw']){
            $_SESSION['user_id'] = $row['user_id'];
            // echo $row['user_id'];
            $_SESSION['success'] = "you are logged in";
            unset($_SESSION["error"]);
            header('Location: main.php');
            // exit;
            
        }
        else{
            $_SESSION['error'] = "Your uniqname or password is incorrect.";
            
        }
    }
    }  
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
