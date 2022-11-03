<?php

session_start();

require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }


require("../connectionDB.php");
$sql="SELECT * FROM etudiants " ;

$xValues = array();
$yValues = array();
// $barColors = ["red", "green","blue","orange","brown"];
$barColors = ["red", "green","black","yellow"];
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" 
integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
echo'<div><canvas id="myChart" style="width:100%;max-width:600px"></canvas></div>';

foreach ($connection->query($sql) as $row){
    $name = $row['nom'];
    array_push($xValues,$name);
    $moy = $row['moyenne'];
    array_push($yValues,$moy);
    $moyenne = $row['moyenne'];

}
$xValues=json_encode($xValues);
$yValues=json_encode($yValues);
$barColors=json_encode($barColors);

echo'
<script>
new Chart("myChart", {
    type: "bar",
    data: {
      labels:'.$xValues.',
      datasets: [{
        backgroundColor:'.$barColors.',
        data: '.$yValues.'
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "World Wine Production 2018"
      }
    }
  });
</script>
';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>statistique</title>
<style>
div{
  height: 500px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" 
integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

</body>
</html>