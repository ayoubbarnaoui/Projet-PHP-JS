<?php
session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
// print_r($_GET);
extract($_GET);
$index = 0;
$table = [] ;
$nomFichier='master_rsi.txt';
if (!file_exists($nomFichier) ){
    die("Fichier n'existe pas!");
}
else{
    $fichier = fopen($nomFichier, 'r+');
    while (!feof($fichier)){
        $ligne=fgets($fichier);
        $table[$index] = $ligne;
        $index++;
}
}

// echo "</br>";
// echo "==========================================";
// echo "</br>";

// print_r($table);

// file_put_contents("filelist.txt", "");
$newTxt = "";
if (isset($_GET['submit'])) {
    extract($_GET);
    $table[$id] = $nom.';'.$prenom.';'.$cne.';'.$module1.';'.$module2.';'.$module3.PHP_EOL;
    for ($j=0; $j <count($table) ;$j++) { 
        $newTxt .=$table[$j]; 
        
    }
    fclose($fichier);
    $nomFichier='master_rsi.txt';
    $fich = fopen($nomFichier, 'w+');
    fwrite($fich,$newTxt);
    fclose($fich);
        echo'<script> alert("les donnes sont modifier correctement.")
                window.location="consulteListe.php";
                </script>';
}
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <style>
        body{
             /* background-color: rgb(15, 7, 34);  */
             background-color: wheat; 
        }
        h1{
            color: white;
            margin-left: 350px;
        }
        h2{
            color: white;
        }
        .contenir{
            background-color: rgb(68, 184, 234);
            /* width: 900px; */
            height: 510px;
            margin-left: 15%;
            margin-right: 15%;
            border-radius: 30px;
            /* padding-left: 20px; */
            padding-left: 70px;
            padding-top: 1px;
        }
        .case{
            border: 2px solid white;
            /* width: 700px; */
            margin-right: 70px;
            border-radius: 10px;
            height: 30px;
            padding-left: 250px;   
            display: flex;
            align-items: center;
        }
        b{
            color: black;
            margin-right: 15px;
            
        }
        
        .btn{
            margin-left: 340px;
            border-radius: 10px;
            height: 40px;
            width: 100px;
            border: 2px solid white;
            color: white;
            background-color: rgb(69, 201, 224);
        }
        

    </style>
</head>
<body>
<h1>modifier une fichier</h1>
<div class='contenir'>
<form action="modifierFichier.php"  method="get">
<h2 >1. Informations</h2>
                <div class="case">
                <input type="hidden" name="id"  value = "<?= $id ?>"/> 

                    <b>Nom:</b>
                    <input type="text" name="nom"  value = "<?= $nom ?>"/>
                </div>  <br>
                <div class="case">
                    <b>Prénom:</b>
                    <input type="text" name="prenom"  value = "<?= $prenom ?>"/>
                </div>  <br>
                <div class="case">
                    <b>CNE:</b>
                    <input type="text"  name="cne"  value = "<?= $cne ?>"/>
                </div> 

            <h2 >2. Notes des modules</h2>
            <div class="case">
                <b>Module 1:</b>
                <input type="number"  name="module1" value = "<?= $module1 ?>"/>
            </div> <br>
            <div class="case">
                <b>Module 2:</b>
                <input type="number"  name="module2" value = "<?= $module2 ?>"/>
            </div> <br>
            <div class="case">
                <b>Module 3:</b>
                <input type="number" name="module3" value = "<?= $module3 ?>"/>
            </div> <br>
            
    <input type="submit" name="submit" value="submit">
</form>

    
</body>
</html>