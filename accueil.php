<?php
session_start();
require('authentified.php');
    if( !isConnected()){
        header('Location:login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
    <style>

        .divPricipal{
            border: 1px solid;
            height: 500px;
        }
        .divOption{
            float: left; 
            width: 400px;
            /* background-color: rgb(0, 102, 204); */
            background-color:#0066CC;
            

        }
        .divCV{
            border: 1px solid;
            height: 218px;
        }
        .divProject{
            border: 1px solid;
            height: 280px;
        }
         .divContenu{
            /* border: 1px solid; */
            margin-left: 410px;
            /* float: right;  */
            margin-top: 40px;
             width: 850px; 
             height: 480px;
        }  
         #cv{
            margin-top:80px ;
            margin-left: 180px;
        }
        #projets{
            margin-top:120px ;
            margin-left: 120px;
        }
        #ContenuCv{
            /* border: 1px solid; */
            margin-left: 20px;
            margin-top: 20px;  
             width: 800px; 
             height: 430px;
        }
        #ContenuProjet{
            /* border: 1px solid; */
            margin-left: 20px;
            margin-top: 20px;  
             width: 700px; 
             height: 330px;
             padding: 50px;
        }
        .infoCv{
            margin-left: 10px;
        }
        #vide{
            margin-top: 230px;
            margin-left: 390px;
            width: 300px;
            height: 50px;
            /* border: 1px solid; */
            padding: center;
        }
    </style>

</head>
<body>
    <h2><a href="logout.php">déconecter</a></h2>

    <div class="divPricipal">

        <div class="divOption">
        <div class="divCV">
            <h1 id="cv"   onclick="javascript:{document.getElementById('ContenuCv').style.display='flex';
                window.open('cv.pdf','_blank','fullscreen=yes');
                document.getElementById('cv').style.color='red';
                document.getElementById('projets').style.color='black';
                document.getElementById('vide').style.display='none';
                document.getElementById('ContenuProjet').style.display='none'}">CV</h1>
        </div>
        <div class="divProject">
            <h1 id="projets" onclick="javascript:{document.getElementById('ContenuProjet').style.display='block';
                document.getElementById('projets').style.color='red';
                document.getElementById('cv').style.color='black';
                document.getElementById('vide').style.display='none';
                document.getElementById('ContenuCv').style.display='none'}"> Mes projets</h1>
        </div>

        </div>

        <div class="divContenu">
            <div id="ContenuCv" style="display:none">
               <!-- <img width="300" src="photo/photo.jpg" alt=""/> -->
                <div class="infoCv">
                <h2>BARNAOUI Ayoub</h2>
                <h3>Etudiant en Master Réseaux et Systèmes Informatiques</h3>
                <h3>CONTACT</h3>
                <b>TELEPHONE:</b> 06 28 55 33 91 <br>
                <b>EMAIL:</b> ayoubbarnaoui35@gmail.com <br>
                <b>LINKEDIN:</b>linkedin.com/in/ayoub-barnaoui
                <h3>COMPÉTENCES</h3>
                <b>• Programmation:</b>C/C++,JAVA,JS,PYTHON,PHP,SWIFT,DART.<br>
                <b>• Développement WEB:</b> HTML5, CSS3 ,Bootstrap. <br>
                <b>• Frameworks:</b> Laravel, ReactJS, FLUTTER. <br>
                <b>• Développement Mobile:</b>IOS.<br>
                <b>• Langage de modélisation:</b>UML, MERISE.<br>
                <b>• SGBD:</b>MYSQL, Oracle.<br>
                </div>



            </div>
            <div id="ContenuProjet" style="display:none">
                <h2>1.  <a href="matrice/matrice.php">  Manipulation de matrices avec Javascript</a></h2>
                <h2>2.  <a href="manipulation-fichier/manipulationFichier.php">  Manipulation de formulaires avec les fichiers (en PHP)</a></h2>
                <h2>3.  <a href="manipulation-images/manipulationImage.php">  Insertion et affichage d'images dans une base de données</a></h2>
                <h2>4.  <a href="quiz/pageQuiz.php">  Quiz</a></h2>
                <h2>5.  <a href="statistique/statistiqueAvecChartJs.php">  Statistiques avec chartJS</a></h2>
                <h2>6.  <a href="geolocalisation/geolocalisation.php">  Géolocalisation</a></h2>
            </div>
            <div id="vide">

             <h3>Bienvenu</h3>   
            </div>
        </div>
    </div>
    
</body>
</html>