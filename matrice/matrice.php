<?php
session_start();

require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>matrice</title>

<style>
    .premierMatrice{
        border: 1px solid blue;
        width: 650px;
        height: 550px;
        display: block;
        /* padding-left: 10px; */
    }
    .deuxiemeMatrice{
        border: 1px solid blue;
        margin-left: 10px;
        width: 650px;
        height: 550px;
        /* padding-left: 10px; */
    }
    .Global{
        /* border: 1px solid; */
        padding: 5px; 
        display: flex;
    }
    .mtr{
        background-color: rgb(0, 170, 255);
        border: 1px solid;
         height: 30px; 
        
    }
   h3{
        align-items: center;
        margin-left: 240px ;
        margin-top: 5px;
    }
    b{
            width: 200;
    }
    #gnr1{
        width: 350px;
        color: blue;
        font-size: 16px large;
    }
    .Div1{
        /* border: 1px solid blue; */
    }
    .Div2{
        margin-top: 5px;
        /* border: 1px solid red; */
        height: 220px;
        width: 310px;
        margin-left: 25%;
        margin-right: 25%;
    }
    #CSomme{
        color: blue;
        width: 310px;
        
    }
    #CProduit{
        color: blue;
        width: 310px;
        
    }
    .pad1 , .pad2{
        padding-left: 10px;
    }
</style>
<script>

    var matrice1=new Array();
    var matrice2=new Array();

    function generer1(){
        var  NL=document.getElementById('lignesMtr1').value;
        var  NC=document.getElementById('colonnesMtr1').value;
        // if((NL != NC)|| (NC<2) ){
            if((NL < 2)|| (NC<2) ){
            alert('le matric ne pas une matrice carre repete s\'il vous plait ')
            document.getElementById('lignesMtr1').value='';
            document.getElementById('colonnesMtr1').value='';
            return;
        }
        else{
            // var matrice = new Array();
                for (var i=0;i<NL;i++){
                    for(var j=0;j<NC;j++){
                        if (!matrice1[i]) matrice1[i] = new Array(); 
                        matrice1[i][j] = Math.floor((Math.random() * 10) + 1);
                    }
                }
                area = document.getElementById('textgenere1');
                var s = '\n'
                
                for (var i=0;i<NL;i++){
                    s+='  ';
                    for(var j=0;j<NC;j++){
                        s = s+ matrice1[i][j];
                        if(matrice1[i][j]>9) s=s+' ';
                        else s=s+'  ';
                    }
                    s = s+'\n';
                }     
                area.value = s;         
                // return matrice;
        }
    }
    function generer2(){
        var  NL=document.getElementById('lignesMtr2').value;
        var  NC=document.getElementById('colonnesMtr2').value;
        // if((NL != NC)|| (NC<2)  ){
            if((NL < 2)|| (NC<2) ){
            alert('le matric ne pas une matrice carre repete s\'il vous plait ')
            document.getElementById('lignesMtr2').value='';
            document.getElementById('colonnesMtr2').value='';
            return;
        }
        else{

                for (var i=0;i<NL;i++){
                    for(var j=0;j<NC;j++){
                        if (!matrice2[i]) matrice2[i] = new Array(); 
                        matrice2[i][j] = Math.floor((Math.random() * 10) + 1);
                    }
                }
                var area = document.getElementById('textgenere2');
                var s = '\n'
                
                for (var i=0;i<NL;i++){
                    s+='  ';
                    for(var j=0;j<NC;j++){
                        s = s+ matrice2[i][j];
                        if(matrice2[i][j]>9) s=s+' ';
                        else s=s+'  ';
                    }
                    s = s+'\n';
                }     
                area.value = s;         
        }


    }
   function calculeSomme(){

        // var  NL1=document.getElementById('lignesMtr1').value;
        // var  NC1=document.getElementById('colonnesMtr1').value;
        // var  NL2=document.getElementById('lignesMtr2').value;
        // var  NC2=document.getElementById('colonnesMtr2').value;
        var matriceSomme = new Array();
        var NL=matrice1.length;
        var NC=matrice1[0].length;
        if((matrice1.length==0)||(matrice2.length==0)){
            alert("atttention la matrice N°1 ou la matrice N°2 est vide");
            return;

        }
        else if((matrice1.length!=matrice2.length) ||
                (matrice1[0].length!=matrice2[0].length)){
            // else if (NL1!=NL2||NC1!=NC2||NL1!=NC1||NL2!=NC2){
                // else if (matrice1.length!=matrice2.length||matrice1[0].length!=matrice2[0].length){
                console.log(matrice1.length);
                console.log(matrice1[0].length);
            alert("atttention les deux matrice ne sont pas les memes nombres des lignes et de collonnes ");
            return;
        }else{
            console.log(matrice1.length);
            console.log(matrice1[0].length);
            var N = matrice1.length;
            for (var i=0;i<N;i++){
                    for(var j=0;j<N;j++){
                        if (!matriceSomme[i]) matriceSomme[i] = new Array(); 
                        matriceSomme[i][j] = matrice1[i][j] + matrice2[i][j];
                    }
                }
             var   areaSomme = document.getElementById('areaSomme');
             var s = '\n'
                
                for (var i=0;i<NL;i++){
                    s+='  ';
                    for(var j=0;j<NC;j++){
                        s = s+ matriceSomme[i][j];
                        if(matriceSomme[i][j]>9) s=s+' ';
                        else s=s+'  ';
                    }
                    s = s+'\n';
                }     
                areaSomme.value = s;  

        }
       


   }


   function calculeProduit(){
    // var NL1=matrice1.length;
    // var NC1=matrice1[0].length;
    // var NL2=matrice2.length;
    // var NC2=matrice2[0].length;
    var matriceProduit = new Array();
        if((matrice1.length==0)||(matrice2.length==0)){
            alert("atttention la matrice N°1 ou la matrice N°2 est vide");
            return;

        }
        else if((matrice1.length!=matrice2.length) ||
                (matrice1[0].length!=matrice2[0].length)){
            // else if (matrice1.length!=matrice2[0].length){
            alert("atttention les deux matrice ne sont pas les memes nombres des lignes et de collonnes ");
            return;
        }else{
            var N = matrice1.length;
            for (var i=0;i<N;i++){
                    for(var j=0;j<N;j++){
                        if (!matriceProduit[i]) matriceProduit[i] = new Array(); 
                       matriceProduit[i][j]=0;
                            for(var k = 0; k < N; k++)
                            {
                                matriceProduit[i][j] += matrice1[i][k] * matrice2[k][j];
       
                            }
                    }
                }
             var   areaProduit = document.getElementById('areaProduit');
             var s = '\n'
                
                for (var i=0;i<N;i++){
                    s+='  ';
                    for(var j=0;j<N;j++){
                        s = s+ matriceProduit[i][j];
                        if(matriceProduit[i][j]>9) s=s+' ';
                        else s=s+'  ';

                    }
                    s = s+'\n';
                }     
                areaProduit.value = s;  

        }



   }


</script>
</head>
<body>
    <div class="Global">
        <div class="premierMatrice">
            <div class="mtr">
                <div class="Div1">
                    <h3>Matrice N°1 </h3>
                    <div class="pad1">
                        <strong>Saisie des dimensions</strong>  <br> <br>

                    <table width="600">
                      <tr>
                          <td width="250">
                              <b>
                                  Nombres de lignes:
                              </b>
                          </td>
                          <td>
                              <input type="number" id="lignesMtr1"/>
                          </td>
                      </tr>
                      <tr>
                          <td >
                              <b>
                                  Nombres de colonnes:
                              </b>
                          </td>
                          <td>
                              <input type="number" id="colonnesMtr1"/>
                          </td>
                      </tr>
                    </table> <br>
                    <input type="button" value="Génerer des valeurs aléatoires" id="gnr1" onclick="generer1()"/>
                    <br> <br>
                    <strong>valeurs générées</strong> <br>
                    <textarea  rows="6" cols="50" id="textgenere1" >
                    </textarea>


                    </div>
                    
                </div>
                <div class="Div2">
                    <input type="button" value="Calculer Somme" id="CSomme" onclick="calculeSomme()"/>
                    Résultat de la Somme: <br><br>
                    <textarea rows="6" cols="39" id="areaSomme">
                    </textarea>

                </div>
            </div>  
        </div>
        <div class="deuxiemeMatrice">
            <div class="mtr">
                <div class="Div1">

                    <h3>Matrice N°2 </h3>                   
                    
                    <div class="pad2">
                        <strong>Saisie des dimensions</strong>  <br> <br>
 
                    <table width="600">
                      <tr>
                          <td width="250">
                              <b>
                                  Nombres de lignes:
                              </b>
                          </td>
                          <td>
                              <input type="number" id="lignesMtr2"/>
                          </td>
                      </tr>
                      <tr>
                          <td >
                              <b>
                                  Nombres de colonnes:
                              </b>
                          </td>
                          <td>
                              <input type="number" id="colonnesMtr2"/>
                          </td>
                      </tr>
                    </table> <br>
                    <input type="button" value="Génerer des valeurs aléatoires" id="gnr1" onclick="generer2()"/>
                    <br> <br>
                    <strong>valeurs générées</strong> <br>
                    <textarea rows="6" cols="50" id="textgenere2">
                       
                    </textarea>

                        
                    </div>
                    
                </div>
                <div class="Div2">
                    <input type="button" value="Calculer Produit" id="CProduit" onclick="calculeProduit()"/>
                    Résultat de la Produit: <br><br>
                    <textarea rows="6" cols="39" id="areaProduit">
                    </textarea>

                </div>
            </div>  
            
        </div>

    </div>

</body>
</html>