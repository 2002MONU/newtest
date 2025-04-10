<?php

$host = "localhost";
$db = 'newTest';
$user = 'root'; 
$pass = '';


  try {

    $pdo  = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>