<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=huangxi_scheduler', 
  'huangxi_ugh', 'ugh1234');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



