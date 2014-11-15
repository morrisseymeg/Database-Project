<?php
require_once "pdo.php";
session_start();
?>
<html><head><title>Welcome and Log In</title></head>
<body>
<?php
if (isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
?>
</table>
<a href="login.php">Log In</a>

