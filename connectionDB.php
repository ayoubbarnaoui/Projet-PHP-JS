<?php

$host = "localhost";
$dbName = "master_rsi";
$userName = "root";
$password = "";

    try{
        $connection = new PDO("mysql:host=$host;dbname=$dbName",$userName,$password);

    }catch(PDOException $e){
        echo"erreur de connection : ".$e->getMessage();
        
    }


?>
 




























