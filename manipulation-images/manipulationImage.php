<?php

session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }

if(isset($_FILES['image']) && !empty($_FILES['image'])){
    // $type = pathinfo($_FILES["image"]["name"]);
    // if(($type!='png')||($type!='jpeg') ||($type!='gif')){
    //     echo'<script>alert("le fichier que vous a choisi n\'pas une image")</script>';
    // }else{
    require("../connectionDB.php");
    $requet = $connection->prepare('INSERT into images(name,type,size,bin_img) VALUES (?,?,?,?)');
    $requet->execute(array($_FILES["image"]["name"], $_FILES["image"]["type"],$_FILES["image"]["size"],
             file_get_contents($_FILES["image"]["tmp_name"])));
    echo'<script>alert("l\'image a enregistrer correctement")</script>';

    // }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manipulation Image</title>
    <style>
        fieldset{
            width: 70%;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>
            <strong>
                Manipulation Image avec base de donnees
            </strong>
        </legend>
        <h2>Choix d'une image a insérer</h2>
        <form  action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/png, image/gif, image/jpeg, image/jpg"> <br><br>
            <input type="submit" value="insérer Image">
       </form>
       <br><br>
         <!-- <br>  <input type="button" name="afficher" value="afficher tout les images">  -->
         <a href="afficheImages.php">
        <input type="button" value="afficher les images"/>
        </a>
        
        

    </fieldset>
    
</body>
</html>

