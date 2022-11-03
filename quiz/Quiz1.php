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
     if($qst1 == 'script'){
        $note = $note +6;
     }
     if($qst2 == 'src'){
        $note = $note +6;
     }
     if($qst3 == 'alert'){
        $note = $note +6;
     }
     require("../connectionDB.php");
     $sql="SELECT * FROM etudiants " ;
    //  $insert ="INSERT into etudiants (note1) VALUES ($note)";
    $update="UPDATE etudiants SET note1 = '$note' , moyenne = ( note1 + note2 ) / 2 WHERE login='$login';";
    $connection->query($update);
    //  foreach ($connection->query($sql) as $tab){
    //     if($tab['login']==$login){
    //         // "INSERT into etudiants (note1) VALUES ($note)";
    //         // $connection->query($insert);
    //         $connection->query($update);
    //         echo'<script>alert("salllllllllllllam" )</script>';
    //     }
    // }

    echo'<script>alert(" voila la note : ' .$note.' " )</script>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz1</title>
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
        <h2 id="titre">Quiz 1 Javascript</h2>

        <p>Tester vos Connaissance en javacript</p>
    </div>
        <h3>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h3>
        <!-- <p id="tirer">------------------------------------------------------------------------------------------------------------------------------------------------------</p> -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h2>1. Dans Quel element on met le code javascript?</h2>
    
        <input type="radio" name="qst1"  value="script"/><label for="dog">a. &lt;script> <br>
        <input type="radio" name="qst1" value="js"/><label for="cat">b. &lt;js><br>
       <input type="radio" name="qst1" value="body"/>c. &lt;body><br>
        <input type="radio" name="qst1"  value="link"/>d. &lt;link>
    </form>
    <h2>Quel est l'attribut utilise por faire referance a un fichier javascript externe?</h2>
    
        <input type="radio" name="qst2"  value="src"/> a. src<br>
        <input type="radio" name="qst2"  value="rel"/>b. rel<js><br>
       <input type="radio" name="qst2"  value="type"/> c. type<br>
        <input type="radio" name="qst2"  value="href"/>d. href
    </form>
    <h2>Comment afficher "hello" sur un message alert ?</h2>
    
        <input type="radio" name="qst3" value="msg"/> a. msg("hello") <br>
        <input type="radio" name="qst3"  value="alertbox"/>b. alertbox("hello")<br>
       <input type="radio" name="qst3" value="documentwrite"/> c. documentwrite("hello")<br>
        <input type="radio" name="qst3" value="alert"/>d. alert("hello") <br>
    <input class="submit" type="submit" value="submit results">
    </form>
    </div>

</body>
</html>