<?php
session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
    if(isset($_POST['nom'])&&!empty([$_POST['nom']])&&
    isset($_POST['prenom'])&&!empty([$_POST['prenom']])&&
    isset($_POST['cne'])&&!empty([$_POST['cne']])&&
    isset($_POST['module1'])&&!empty([$_POST['module1']])&&
    isset($_POST['module2'])&&!empty([$_POST['module2']])&&
    isset($_POST['module3'])&&!empty([$_POST['module3']])
    ){

        // echo"tout est bien";
        extract($_POST);
        $nomFichier='master_rsi.txt';
        if (!file_exists($nomFichier) ){
            die("Fichier n'existe pas!");
           }
        else{
            $fichier = fopen($nomFichier, 'a');
            $data = $nom . ";" . $prenom .";" . $cne . ";" .$module1 . ";".$module2 . ";" .$module3 ."\n";
            if($data!=""){
                fwrite($fichier,$data);
            }
            fclose($fichier);
            echo" <script> alert('l\'additioin est fait en succes') </script>";

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manipulation Fiechier</title>
    <style>
        body{
            background-color: rgb(15, 7, 34);
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
    <h1>Gestion de formulaire avec les fichiers</h1>
    <div class="contenir">
        <form action="manipulationFichier.php" method="post">

            <h2 >1. Informations</h2>
                <div class="case">
                    <b>Nom:</b>
                    <input type="text" name="nom"  />
                </div>  <br>
                <div class="case">
                    <b>Prénom:</b>
                    <input type="text" name="prenom"  />
                </div>  <br>
                <div class="case">
                    <b>CNE:</b>
                    <input type="text"  name="cne"  />
                </div> 

            <h2 >2. Notes des modules</h2>
            <div class="case">
                <b>Module 1:</b>
                <input type="number"  name="module1"  />
            </div> <br>
            <div class="case">
                <b>Module 2:</b>
                <input type="number"  name="module2"  />
            </div> <br>
            <div class="case">
                <b>Module 3:</b>
                <input type="number" name="module3"  />
            </div> <br>
            <input class="btn" type="submit" value="Valider"/> <br>

        </form>
        <a href="consulteListe.php">Consuter liste</a>
        
    </div>
    
</body>
</html>