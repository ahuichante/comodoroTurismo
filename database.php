<?php
$server= 'localhost';
$username='root';
$password ='';
$database = 'comodoroTurismo';
try{
    $conn = new PDO("mysql:host=$server; dbname=$database;",$username,$password);
    return $conn;
}catch(PDOException $e){
    die('connected failed: '.$e->getMessage());
}
?>