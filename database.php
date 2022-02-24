<?php
$server= 'localhost';
$username='root';
$password ='casa123';
$database = 'comodoroTurismo';
try{
    $conn = new PDO("mysql:host=$server; dbname=$database;",$username,$password);

}catch(PDOException $e){
    die('connected failed: '.$e->getMessage());
}
?>