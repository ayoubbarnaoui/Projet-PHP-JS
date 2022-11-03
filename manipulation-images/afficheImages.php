<?php
session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
require("../connectionDB.php");
$sql="SELECT * FROM images" ;
//  $requet = $connection->query($sql);


 echo "<div class='cont'>";

foreach ($connection->query($sql) as $row){
    echo "<div class='divImg'>";
    echo '<img id="image" src="data:image/jpeg;base64,'.base64_encode($row['bin_img']).'"/>';

    echo "</div>";
}

echo'</div>';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tout les images</title>
    <style>
        .divImg{
            border: 1px solid black;
        }
        .cont{
            display: block;
            border: 1px solid black;
            width: 700px;
            margin-left: 25%;
        }
        #image{
            width: 700px;
            height: 300px;
        }
        body{
            background-color: rgb(0, 170, 255);
        }
    </style>
</head>
<body>
    
</body>
</html>