<?php
session_start();
    if(isset($_POST['login']) && isset($_POST['pass'])
    // &&!empty($_POST['login'])&& !empty($_POST['pass'])
    ){

        extract($_POST);
        // $passNB=$pass;
        // $pass=sha1($pass);
        require("connectionDB.php");
        $sql="SELECT id FROM etudiants WHERE login='$login' AND pass='$pass'" ;
        $request= $connection->query($sql);
        if($request->rowCount()){


            $_SESSION['authetifiaction']=array('login'=>$login,'pass'=>$pass);

            if (!empty($_POST["remember"])){
         
                setcookie("login",$_SESSION["authetifiaction"]["login"],time()+(365*24*60*60));
                setcookie("pass",$_SESSION["authetifiaction"]["pass"],time()+(365*24*60*60));
               
            }
            else{
               
                if (isset($_COOKIE["login"]))    {setcookie("login","");}
                if (isset($_COOKIE["pass"]))    {setcookie("pass","");}
            }

             header('Location:accueil.php');

        }
        else { 
            echo '<script>alert("Vous êtes mal identifié")
                    </script>';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login projet</title>
    <style>
        fieldset{
            width:50%;
            height: 50%;
        }
        div,fieldset{
            margin: auto;
            
        }
        fieldset,.register{
            margin: auto;
            
        }
        .register{
            width: 300px; 
        }
        fieldset{
           padding: auto; 
        }
        div{
            /* border: 1px solid; */
            margin-top: 80px;
            width: 800px;
            height: 400px;
        }
        /* body{
            background-color: yellowgreen;
        } */


    </style>
</head>
<body>

    <div>
        <fieldset>
            <legend>
               <strong>authetifier vous</strong> 
            </legend>
            <form action="login.php" method="post">
                <b>Login:</b> <input type="text" name="login"
                value="<?php 
                    if (isset($_COOKIE['login'])) {
                        echo $_COOKIE['login'];} ?>" /> <br><br>
                <b>Password:</b> <input type="password" name="pass"
                value="<?php 
                    if (isset($_COOKIE['pass'])) {
                        echo $_COOKIE['pass'];} ?>" /><br><br>
                <b>Remember me:</b><input type="checkbox" name="remember"
                <?php if (isset($_COOKIE['login'])) echo "checked"; ?> >
            <br><br>
                <input type="submit" value="se connecter">
            </form>
        </fieldset>
        <div class="register"> 
            <p> Vous n'avais pas de compte? <a href="register.php">Inscription</a> </p>
        </div>

    </div>
    
</body>
</html>