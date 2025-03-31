<?php
session_start();
if (!isset($_SESSION["utilisateur"])) {
    header("Location: Login.php");
    exit();
}
elseif ($_SESSION["utilisateur"]["statut"]=="administrateur") {
    header("Location: Explorer.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jungle Trek - Réserver</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="bodyrechercher">
<form action="recap.php" method="POST">
    <div class="header">
        <div class="Logo">
            <img src="Images/Logo.png" width="50px" height="50px"></img>
            <p id="JT"> Jungle Trek</p>
        </div>
        <div>
            <a href="Profil.php" class ="lien"> <?php echo $_SESSION["utilisateur"]["login"] ?></a>
            <a href="Login.php" class ="lien">Se déconnecter</a>
        </div>
        <div class="nav-bar">
            <a href="Accueil.php"><button type="button" class="nav-button">Accueil</button></a>
            <a href="Explorer.php"><button type="button" class="nav-button">Explorer</button></a>
            <a href="Reserver.php"><button type="button" class="nav-button">Réserver</button></a>
        </div>
    </div>

    <div class="selection-containerrechercher">
        <label for="date" id="labelrechercher">Date :</label>
        <input type="date" id="date" name="date" required>

        <label for="parcours" id="labelrechercher">Parcours :</label>
        <select id="parcours" name="parcours" required>
            <option value="a-b-c">Temple-Village-Zoo</option>
            <option value="d-c-a">Cascade-Zoo-Temple</option>
            <option value="b-d-c">Village-Cascade-Zoo</option>
            <option value="a-d-b">Temple-Cascade-Village</option>
        </select>
    </div>

    <div class="steps-containerrechercher">
        <div class="steprechercher">
            <h3 id="h3rechercher">Étape 1</h3>
            <label id="labelrechercher">Durée de l'étape :</label>
            <select name="duree[0]" required>
                <option value="1">1 heure</option>
                <option value="2">2 heures</option>
                <option value="3">3 heures</option>
            </select>

            <label id="labelrechercher">Accompagnement :</label>
            <div id="labelrechercher">
                <label><input type="checkbox" name="accompagnement[0]" value="1"> Guide local</label><br>
                <label><input type="checkbox" name="accompagnement[0]" value="2"> Guerrier local</label><br>
                <label><input type="checkbox" name="accompagnement[0]" value="3"> Animal de compagnie</label>
            </div>

            <label id="labelrechercher">Équipement :</label>
            <div id="labelrechercher">
                <label><input type="checkbox" name="equipement[0]" value="1"> Coupe-coupe + sarbacane </label><br>
                <label><input type="checkbox" name="equipement[0]" value="2"> Chapeau + Chaussures de randonnée</label><br>
                <label><input type="checkbox" name="equipement[0]" value="3"> Kit de premier secours</label>
            </div>
        </div>

        <div class="steprechercher">
            <h3 id="h3rechercher">Étape 2</h3>
            <label id="labelrechercher">Durée de l'étape :</label>
            <select name="duree[1]" required>
                <option value="1">1 heure</option>
                <option value="2">2 heures</option>
                <option value="3">3 heures</option>
            </select>

            <label id="labelrechercher">Accompagnement :</label>
            <div id="labelrechercher">
                <label><input type="checkbox" name="accompagnement[1]" value="1"> Guide local</label><br>
                <label><input type="checkbox" name="accompagnement[1]" value="2"> Guerrier local</label><br>
                <label><input type="checkbox" name="accompagnement[1]" value="3"> Animal de compagnie</label>
            </div>

            <label id="labelrechercher">Équipement :</label>
            <div id="labelrechercher">
                <label><input type="checkbox" name="equipement[1]" value="1"> Coupe-coupe + sarbacane</label><br>
                <label><input type="checkbox" name="equipement[1]" value="2"> Chapeau + Chaussures de randonnée</label><br>
                <label><input type="checkbox" name="equipement[1]" value="3"> Kit de premier secours</label>
            </div>
        </div>

        <div class="steprechercher">
            <h3 id="h3rechercher">Étape 3</h3>
            <label id="labelrechercher">Durée de l'étape :</label>
            <select name="duree[2]" required>
                <option value="1">1 heure</option>
                <option value="2">2 heures</option>
                <option value="3">3 heures</option>
            </select>

            <label id="labelrechercher">Accompagnement :</label>
            <div id="labelrechercher">
                <label><input type="checkbox" name="accompagnement[2]" value="1"> Guide local</label><br>
                <label><input type="checkbox" name="accompagnement[2]" value="2"> Guerrier local</label><br>
                <label><input type="checkbox" name="accompagnement[2]" value="3"> Animal de compagnie</label>
            </div>

            <label id="labelrechercher">Équipement :</label>
            <div id="labelrechercher">
                <label><input type="checkbox" name="equipement[2]" value="1"> Coupe-coupe + sarbacane </label><br>
                <label><input type="checkbox" name="equipement[2]" value="2"> Chapeau + Chaussures de randonnée</label><br>
                <label><input type="checkbox" name="equipement[2]" value="3"> Kit de premier secours</label>
            </div>
        </div>
    </div>

    <button type="submit" id="pay-buttonrechercher">Payer</button>
</form>

<footer id="footerrechercher"> 
    <p>©2025 Jungle Trek Corp, All right reserved</p>
</footer>

</body>
</html>
