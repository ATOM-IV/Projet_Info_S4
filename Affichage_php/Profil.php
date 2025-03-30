<?php
session_start();
if (!isset($_SESSION["utilisateur"])) {
    header("Location: ../Affichage_php/Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title> Jungle Trek - Profil </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body id="Body_Admin">

        <div class="header">
            <div class="Logo">
              <img src="Images/Logo.png" width="50px" height="50px"></img>
              <p id="JT"> Jungle Trek</p>
            </div>
            <div >
                <a href="Profil.php" class ="lien"> <?php echo $_SESSION["utilisateur"]["login"] ?> </a>
                <a href="../Code_php/logout.php" class ="lien">Se déconnecter</a>
            </div>
            <div class="nav-bar">
              <a href="Accueil.php"><button class="nav-button">Accueil</button></a>
              <a href="Explorer.php"><button class="nav-button">Explorer</button></a>
              <?php if (isset($_SESSION["utilisateur"])) {
              if ($_SESSION["utilisateur"]["statut"] == "administrateur") {
                echo '<a href="Admin.php"><button class="nav-button">Liste des utilisateurs</button></a>';
              }
              else {
                echo '<a href="Reserver.php"><button class="nav-button">Réserver</button></a>';
              }
            }
            else {
              echo '<a href="Reserver.php"><button class="nav-button">Réserver</button></a>';
            }
            ?>
            </div>
        </div>

        <div class="profil-container">
            <h1 class="profil-title">Profil utilisateur :</h1>
            <div class="profil-info">
                Identifiant : <?php echo $_SESSION["utilisateur"]["login"] ?><br>
                Nom : <?php echo $_SESSION["utilisateur"]["nom"] ?><br>
                Prénom : <?php echo $_SESSION["utilisateur"]["prenom"] ?><br>
                Rôle : <?php echo strtoupper($_SESSION["utilisateur"]["statut"])?> <br><br>
                
                E-mail : <?php echo $_SESSION["utilisateur"]["email"] ?><br>
                Date de naissance : <?php echo $_SESSION["utilisateur"]["date_naissance"] ?><br>
                Adresse : <?php echo $_SESSION["utilisateur"]["adresse"] ?><br>
                Date d'inscription : <?php echo $_SESSION["utilisateur"]["date_inscription"] ?><br><br>

                <?php if ($_SESSION["utilisateur"]["statut"]=="client") {
                    echo "Voyage réservées :<br><br>";
                    // Affichage liste de voyage
                }
                ?>
                
            </div>
        </div>
    </body>
    <footer id="footer">©2025 Jungle Trek Corp, All rights reserved</footer>
</html>