<?php
session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
    $nomFichier='master_rsi.txt';
    if (!file_exists($nomFichier) ){
        die("Fichier n'existe pas!");
    }
    else{
        $fichier = fopen($nomFichier, 'r');
            echo"
                <div class='contenir'>
                <h1>Liste des étudiants enregistés dans fichier</h1>
                ";
            echo"<table>
                    <tr class ='tpr'>
                        <td>
                        <b>CNE</b> 
                        </td>
                        <td>
                        <b>Nom</b> 
                        </td>
                        <td>
                        <b>Prénom</b> 
                        </td>
                        <td>
                        <b>Module</b><br>  <b style='padding-left: 20px;'>1</b>
                        </td>
                        <td>
                        <b>Module</b><br>  <b style='padding-left: 20px;'>2</b>
                        </td>
                        <td>
                        <b>Module</b><br>  <b style='padding-left: 20px;'>3</b>

                        </td>
                        <td>
                            <b>Modifier</b> 
                        </td>

            </tr>
                ";
                $id=-1;
        while (!feof($fichier)){
            $id++;
            $ligne=fgets($fichier);
            if (!empty($ligne)){
                $T=explode(';',$ligne);       
                if(!isset($T)) return;
                echo"           <tr class='cont' action='modifierFochier.php' method='post'>
                                    <td>
                                       $T[2]
                                    </td>
                                    <td>
                                        $T[0]
                                    </td>
                                    <td>
                                        $T[1]
                                    </td>
                                    <td>
                                        $T[3]
                                    </td>
                                    <td>
                                        $T[4]
                                    </td>
                                    <td>
                                        $T[5]

                                    </td>
                                    <td >
                                        <a href='modifierFichier.php?id=$id&nom=$T[0]&prenom=$T[1]&cne=$T[2]&module1=$T[3]&module2=$T[4]&module3=$T[5]'' type='submit'>modifier</a>
                                    </td>
                                </tr>
                 ";
                }
        }
        echo"</table>";
        echo"</div>";

        fclose($fichier);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consult Liste</title>
    <style>
         body{
            background-color: rgb(15, 7, 34);
        }
        h1{
            color: white;
            margin-left: 180px;
        }
        .contenir{
            background-color: rgb(68, 184, 234);
            height: 580px;
            margin-left: 5%;
            margin-right: 5%;
            border-radius: 30px;
            padding-left: 70px;
            padding-top: 1px;
        }
        table{
            /* border: 2px solid white; */
            width: 80%;
            margin-left: 80px;
            border-collapse: collapse;


        }
         tr, td{
            border: 2px solid white;
            padding: 10px;
            width: 120px;
            vertical-align: center;
            align-items: center;
            
        } 
        tr td{
            padding-left: 30px;
        }
        table .tpr{
            height: 70px;
        }
        .cont td{
            padding-left: 40px;

        }
    </style>
</head>
<body>
</body>
</html>