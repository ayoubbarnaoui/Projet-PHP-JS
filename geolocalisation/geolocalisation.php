<?php
session_start();
require('../authentified.php');
    if( !isConnected()){
        header('Location:../login.php');
    }
require("../connectionDB.php");

// recuperer les etudiants dans la base de donnees
// $query = $connection->query("SELECT nom, longitude, latitude FROM etudiants");
// $result = $query->fetch_all(MYSQLI_ASSOC);
$query="SELECT nom, longitude, latitude FROM etudiants" ;
$result= $connection->query($query);

$etudiants = [];
foreach ($result as $etudiant) {
    $etudiants[] = [
        "nom" => $etudiant["nom"],
        "longitude" => $etudiant["longitude"],
        "latitude" => $etudiant["latitude"]
    ];
}
$json = json_encode($etudiants);

setcookie("etudiants", $json);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet" />
    <title>Géolocalisation</title>
</head>

<body class="container bg-dark text-light p-4">
    <h3>Affichage de la carte google maps contenant les positions de géolocalisation des étudiants.</h3>
    <hr>

    <div id="map"></div>

    <script>
        const json = '<?= $json ?>';
        const etudiants = JSON.parse(json);
        // Map
        const element = document.getElementById('map');
        element.style = 'height:600px;';
        const map = L.map(element);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);

        // Markers
        for (const etudiant of etudiants) {
            const location = L.latLng(etudiant.latitude, etudiant.longitude);
            const marker = L.marker(location);

            map.setView(location, 5);
            marker.bindPopup(etudiant.nom);
            marker.addTo(map);
        }
    </script>
</body>

</html>