<?php
session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil quiz</title>
    <style>
     div{
        border: 3px solid blue;
        /* width: 800px; */
        height: 200px;
        margin-left: 25%;
        margin-right: 25%;
        margin-top: 80px;
        padding-top: 35px;
        padding-left: 60px;

    }
    </style>
</head>

<body>

    <div>
        <h2>Quiz1: <a href="Quiz1.php"> Tester vos Connaissances en <b>javascript</b> </a></h2>
        <h2>Quiz2: <a href="Quiz2.php"> Tester vos Connaissances en <b>PHP</b> </a></h2>
    </div>
    
</body>
</html>