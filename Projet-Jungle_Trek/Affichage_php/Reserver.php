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

if (isset($_POST["accompagnement"])) {
    $Choix = $_POST;
}
else {
    $Choix["parcours"] = "Temple-Village-Zoo";
    $Choix["duree"] = ["1","1","1"];
    $Choix["accompagnement"] = ["Aucun", "Aucun", "Aucun"];
    $Choix["equipement"] = ["Aucun", "Aucun", "Aucun"];
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
            <a href="Voyages_du_moment.php"><button type="button" class="nav-button">Voyages du moment</button></a>
            <a href="Recherche.php"><button type="button" class="nav-button">Rechercher</button></a>
            <a href="Reserver.php"><button type="button" class="nav-button">Réserver</button></a>
        </div>
    </div>

    <div class="selection-containerrechercher">
        <label for="date" id="labelrechercher">Date :</label>
        <input type="date" id="date" name="date" required>

        <label for="parcours" id="labelrechercher">Parcours :</label>
        <select id="parcours" name="parcours" required>
            <option value="Temple-Village-Zoo" <?php if ($Choix["parcours"]=="Temple-Village-Zoo") {echo "selected";} ?>>Temple-Village-Zoo</option>
            <option value="Cascade-Zoo-Temple" <?php if ($Choix["parcours"]=="Cascade-Zoo-Temple") {echo "selected";} ?>>Cascade-Zoo-Temple </option>
            <option value="Village-Cascade-Zoo" <?php if ($Choix["parcours"]=="Village-Cascade-Zoo") {echo "selected";} ?>>Village-Cascade-Zoo</option>
            <option value="Temple-Cascade-Village" <?php if ($Choix["parcours"]=="Temple-Cascade-Village") {echo "selected";} ?>>Temple-Cascade-Village</option>
        </select>
    </div>

    <div class="steps-containerrechercher">
        <div class="steprechercher">
            <h3 id="h3rechercher">Étape 1</h3>
            <label id="labelrechercher">Durée de l'étape :</label>
            <select name="duree[0]" required>
                <option value="1" <?php if ($Choix["duree"][0]=="1") {echo "selected";} ?>>1 heure </option>
                <option value="2" <?php if ($Choix["duree"][0]=="2") {echo "selected";} ?>>2 heures</option>
                <option value="3" <?php if ($Choix["duree"][0]=="3") {echo "selected";} ?>>3 heures</option>
            </select>

            <label id="labelrechercher">Accompagnement :</label>
            <div id="labelrechercher">
                <label><input type="radio" name="accompagnement[0]" value="Aucun" <?php if ($Choix["accompagnement"][0] == "Aucun") {echo "checked";} ?>> Aucun</label><br>
                <label><input type="radio" name="accompagnement[0]" value="Guide local" <?php if ($Choix["accompagnement"][0] == "Guide local") {echo "checked";} ?>> Guide local</label><br>
                <label><input type="radio" name="accompagnement[0]" value="Guerrier local" <?php if ($Choix["accompagnement"][0] == "Guerrier local") {echo "checked";} ?>> Guerrier local</label><br>
                <label><input type="radio" name="accompagnement[0]" value="Animal de compagnie" <?php if ($Choix["accompagnement"][0] == "Animal de compagnie") {echo "checked";} ?>> Animal de compagnie</label>
            </div>

            <label id="labelrechercher">Équipement :</label>
            <div id="labelrechercher">
                <label><input type="radio" name="equipement[0]" value="Aucun" <?php if ($Choix["equipement"][0] == "Aucun") {echo "checked";} ?>> Aucun </label><br>
                <label><input type="radio" name="equipement[0]" value="Coupe-coupe + sarbacane" <?php if ($Choix["equipement"][0] == "Coupe-coupe + sarbacane") {echo "checked";} ?>> Coupe-coupe + sarbacane </label><br>
                <label><input type="radio" name="equipement[0]" value="Chapeau + Chaussures de randonnée" <?php if ($Choix["equipement"][0] == "Chapeau + Chaussures de randonnée") {echo "checked";} ?>> Chapeau + Chaussures de randonnée</label><br>
                <label><input type="radio" name="equipement[0]" value="Kit de premier secours" <?php if ($Choix["equipement"][0] == "Kit de premier secours") {echo "checked";} ?>> Kit de premier secours</label>
            </div>
        </div>

        <div class="steprechercher">
            <h3 id="h3rechercher">Étape 2</h3>
            <label id="labelrechercher">Durée de l'étape :</label>
            <select name="duree[1]" required>
                <option value="1" <?php if ($Choix["duree"][1]=="1") {echo "selected";} ?>>1 heure </option>
                <option value="2" <?php if ($Choix["duree"][1]=="2") {echo "selected";} ?>>2 heures</option>
                <option value="3" <?php if ($Choix["duree"][1]=="3") {echo "selected";} ?>>3 heures</option>
            </select>

            <label id="labelrechercher">Accompagnement :</label>
            <div id="labelrechercher">
                <label><input type="radio" name="accompagnement[1]" value="Aucun" <?php if ($Choix["accompagnement"][1] == "Aucun") {echo "checked";} ?>> Aucun</label><br>
                <label><input type="radio" name="accompagnement[1]" value="Guide local" <?php if ($Choix["accompagnement"][1] == "Guide local") {echo "checked";} ?>> Guide local</label><br>
                <label><input type="radio" name="accompagnement[1]" value="Guerrier local" <?php if ($Choix["accompagnement"][1] == "Guerrier local") {echo "checked";} ?>> Guerrier local</label><br>
                <label><input type="radio" name="accompagnement[1]" value="Animal de compagnie" <?php if ($Choix["accompagnement"][1] == "Animal de compagnie") {echo "checked";} ?>> Animal de compagnie</label>
            </div>

            <label id="labelrechercher">Équipement :</label>
            <div id="labelrechercher">
                <label><input type="radio" name="equipement[1]" value="Aucun" <?php if ($Choix["equipement"][1] == "Aucun") {echo "checked";} ?>> Aucun </label><br>
                <label><input type="radio" name="equipement[1]" value="Coupe-coupe + sarbacane" <?php if ($Choix["equipement"][1] == "Coupe-coupe + sarbacane") {echo "checked";} ?>> Coupe-coupe + sarbacane </label><br>
                <label><input type="radio" name="equipement[1]" value="Chapeau + Chaussures de randonnée" <?php if ($Choix["equipement"][1] == "Chapeau + Chaussures de randonnée") {echo "checked";} ?>> Chapeau + Chaussures de randonnée</label><br>
                <label><input type="radio" name="equipement[1]" value="Kit de premier secours" <?php if ($Choix["equipement"][1] == "Kit de premier secours") {echo "checked";} ?>> Kit de premier secours</label>
            </div>
        </div>

        <div class="steprechercher">
            <h3 id="h3rechercher">Étape 3</h3>
            <label id="labelrechercher">Durée de l'étape :</label>
            <select name="duree[2]" required>
                <option value="1" <?php if ($Choix["duree"][2]=="1") {echo "selected";} ?>>1 heure </option>
                <option value="2" <?php if ($Choix["duree"][2]=="2") {echo "selected";} ?>>2 heures</option>
                <option value="3" <?php if ($Choix["duree"][2]=="3") {echo "selected";} ?>>3 heures</option>
            </select>

            <label id="labelrechercher">Accompagnement :</label>
            <div id="labelrechercher">
                <label><input type="radio" name="accompagnement[2]" value="Aucun" <?php if ($Choix["accompagnement"][2] == "Aucun") {echo "checked";} ?>> Aucun</label><br>
                <label><input type="radio" name="accompagnement[2]" value="Guide local" <?php if ($Choix["accompagnement"][2] == "Guide local") {echo "checked";} ?>> Guide local</label><br>
                <label><input type="radio" name="accompagnement[2]" value="Guerrier local" <?php if ($Choix["accompagnement"][2] == "Guerrier local") {echo "checked";} ?>> Guerrier local</label><br>
                <label><input type="radio" name="accompagnement[2]" value="Animal de compagnie" <?php if ($Choix["accompagnement"][2] == "Animal de compagnie") {echo "checked";} ?>> Animal de compagnie</label>
            </div>

            <label id="labelrechercher">Équipement :</label>
            <div id="labelrechercher">
                <label><input type="radio" name="equipement[2]" value="Aucun" <?php if ($Choix["equipement"][2] == "Aucun") {echo "checked";} ?>> Aucun </label><br>
                <label><input type="radio" name="equipement[2]" value="Coupe-coupe + sarbacane" <?php if ($Choix["equipement"][2] == "Coupe-coupe + sarbacane") {echo "checked";} ?>> Coupe-coupe + sarbacane </label><br>
                <label><input type="radio" name="equipement[2]" value="Chapeau + Chaussures de randonnée" <?php if ($Choix["equipement"][2] == "Chapeau + Chaussures de randonnée") {echo "checked";} ?>> Chapeau + Chaussures de randonnée</label><br>
                <label><input type="radio" name="equipement[2]" value="Kit de premier secours" <?php if ($Choix["equipement"][2] == "Kit de premier secours") {echo "checked";} ?>> Kit de premier secours</label>
            </div>
        </div>
    </div>

    <button type="submit" id="pay-buttonrechercher">Payer</button>
</form>
</body>
<footer id="footerrechercher"> 
    <p>©2025 Jungle Trek Corp, All right reserved</p>
</footer>
</html>
