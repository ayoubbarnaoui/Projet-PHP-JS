<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("connectionDB.php");

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $lat = $_POST["lat"] ?? 0;
    $lng = $_POST["long"] ?? 0;
    $query = $connection->prepare("INSERT INTO etudiants(nom, login, pass, latitude, longitude) VALUES (?, ?, ?, ?, ?)");
    $resultat = $query->execute(array($name, $username, $password, $lat, $lng));
}

// Gestion d'erreur
$register_success = false;
$register_message = "";
if (isset($_GET["success"])) {
    $register_success = $_GET["success"] == "true" ? true : false;
    $register_message = $_GET["success"] == "true" ? "Vous étes bien inscris!" : "Erreur d'inscription!";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <style>
         fieldset{
           padding: auto; 
           width: 50%;
           margin-left: 280px;
           margin-top:100px;
           padding-left: 80px;
        }
    </style>

</head>


<body >


    <?php if (!empty($register_message)) : ?>
        <div>
            <?php echo '<script>alert("Vous êtes bien enregistré: Prière de se connecter.");
                 window.location="login.php";
                </script>'; ?>
        </div>
    <?php endif; ?>

        <fieldset>
            <legend>
               <strong>S'inscrire</strong> 
            </legend>
            <form id="form">

            <label  for="name">Nom complet</label>
            <input type="text"  name="name" placeholder="Entrer le nom complet" id="name" required>
            <br> <br>

            <label >Login</label>
            <input type="text"  name="username" placeholder="Entrer le Login" id="username" required>
        <br> <br>
            <label  for="password">Mot de passe</label>
            <input type="password"  name="password" placeholder="Enter le mot de passe" id="password" required>

        <br> <br>
            <input  type="checkbox" value="geoloc" name="geoloc" id="geoloc">
            <label  for="geoloc">J'accepte d'obtenir mon localisation (activer la connection s'il vous plait)</label>

        <br><br>
        <button  id="submit">S'inscrire</button>
        </form>
        
        <p >Vous n'avez déjà un compte? <a href="login.php">S'authentifier</a></p>

        </fieldset>



    <script>
        const form = document.getElementById("form");

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);

            if (!formData.get('geoloc')) {
                const result = await fetch('register.php', {
                    method: 'POST',
                    body: formData
                });

                if (result.status != 200) {
                    window.location.href = "register.php?success=false";
                    return;
                }

                window.location.href = "register.php?success=true";
                return;
            }

            // Obtenir la localisation
            navigator.geolocation.getCurrentPosition(async ({
                coords
            }) => {
                formData.append('lat', coords.latitude);
                formData.append('long', coords.longitude);

                const result = await fetch('register.php', {
                    method: 'POST',
                    body: formData
                });

                if (result.status != 200) {
                    window.location.href = "register.php?success=false";
                    return;
                }

                window.location.href = "register.php?success=true";
                return;
            });
        });
    </script>
</body>

</html>

