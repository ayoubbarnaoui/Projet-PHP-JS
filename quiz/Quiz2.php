<?php
session_start();

require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
extract($_SESSION['authetifiaction']);

if(isset($_POST['qst1']) && !empty($_POST['qst1']) &&
isset($_POST['qst2']) && !empty($_POST['qst2']) &&
isset($_POST['qst3']) && !empty($_POST['qst3'])  ){

     extract($_POST);
     $note = 0;
     if($qst1 == 'Hypertest_Preprocessor'){
        $note = $note +6;
     }
     if($qst2 == 'strlen'){
        $note = $note +6;
     }
     if($qst3 == '8'){
        $note = $note +6;
     }
     require("../connectionDB.php");
     $sql="SELECT * FROM etudiants " ;
    //  $insert ="INSERT into etudiants (note1) VALUES ($note)";
    $update="UPDATE etudiants SET note2 = '$note', moyenne = ( note1 + note2 ) / 2  WHERE login='$login';";  //and  moyenne = ( note1 + note2 ) / 2
    $connection->query($update); 
    // foreach ($connection->query($sql) as $tab){
    //     if($tab['login']==$login){
    //         // "INSERT into etudiants (note1) VALUES ($note)";
    //         // $connection->query($insert);
    //         $connection->query($update);
    //         echo'<script>alert("salllllllllllllam" )</script>';
    //     }
    // }

    echo'<script>alert(" voila la note : ' .$note.' " )</script>';

}
// else
// {
//     echo'<script>alert("les questions sont ne pas tous repondu repeter le jeu s\'il  vous plais" )</script>';
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz2</title>
    <style>
        body{
            background-color: yellow;
        }
        .container{
            background-color: green ;
            height: 580px;
            width: 1260px;
            /* padding-left: 25px; ; */
            padding-left: 5px;
        }
        /* .header{
            margin-left: 500px;
        } */
        h3{
            
            color: white;
            padding-left: 25px;
            padding-top: 0px;
        }
        p{
            margin-left: 480px;
        }
        #titre{
            
            margin-left: 520px;
        }

        /* #tirer{
            color: white;
            font-size: 25px;
        } */
        .submit{
            margin-top: 5px;
            background-color: yellow;
            height: 25px;
            width: 150px;
            margin-left: 40px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <h2 id="titre">Quiz 2 PHP</h2>

        <p>Tester vos Connaissance en PHP</p>
    </div>
        <h3>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h3>
        <!-- <p id="tirer">------------------------------------------------------------------------------------------------------------------------------------------------------</p> -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h2>1. Que signifie PHP ?</h2>
    
        <input type="radio" name="qst1"  value="Page_Helper_Process"/><label for="dog">a. Page Helper Process<br>
        <input type="radio" name="qst1" value="Proramming_Home_Pages"/><label for="cat">b. Proramming Home Pages<br>
       <input type="radio" name="qst1" value="Hypertest_Preprocessor"/>c. PHP: Hypertest Preprocessor<br>
    </form>
    <h2>Quelle fonction retourne la longueur d'une chaine de texte?</h2>
    
        <input type="radio" name="qst2"  value="strlen"/> a. strlen<br>
        <input type="radio" name="qst2"  value="strlength"/>b. strlength<js><br>
       <input type="radio" name="qst2"  value="length"/> c. length<br>
        <input type="radio" name="qst2"  value="substr"/>d. substr
    </form>
    <h2>Sachant que $num = 6. Quelle est la valeur de : $num += 2 ?</h2>
    
        <input type="radio" name="qst3" value="3"/> a. 3 <br>
        <input type="radio" name="qst3"  value="8"/>b. 8<br>
       <input type="radio" name="qst3" value="10"/> c. 10<br>
        <input type="radio" name="qst3" value="12"/>d. 12 <br>
    <input class="submit" type="submit" value="submit results" >
    </form>
    </div>

</body>
</html>