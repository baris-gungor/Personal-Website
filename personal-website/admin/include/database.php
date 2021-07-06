<?php

ob_start();
/*
$servername = 'sql108.epizy.com';
$dbname     = 'epiz_28704709_pro1';
$username   = 'epiz_28704709';
$password   = 'oNMQq1g8Ksw';
$port       = '3306';
*/
$servername = 'localhost';
$dbname     = 'pro1';
$username   = 'root';
$password   = '';
$port       = '3306';




try {
  $db = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
  // set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$ayarlar = $db->prepare("SELECT * FROM ayarlar WHERE id=:id");
$ayarlar->execute(["id" => 1]);
$ayar = $ayarlar->fetch(PDO::FETCH_OBJ);

?>
