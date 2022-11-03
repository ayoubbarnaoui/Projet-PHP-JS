<?php

   function isConnected(){
        if( isset( $_SESSION['authetifiaction'] ) &&
        isset( $_SESSION['authetifiaction']['login'])&&
        isset( $_SESSION['authetifiaction']['pass'])) {
            extract($_SESSION['authetifiaction']);
               require('connectionDB.php');
               $sql="SELECT id FROM etudiants WHERE login='$login' AND pass='$pass'" ;
              $request=$connection->query($sql);
              if ($request->rowCount()>0){
                return true;
              }
              else{
                return false;
              }

        }
        else{
            return false;
        }

    }
?>