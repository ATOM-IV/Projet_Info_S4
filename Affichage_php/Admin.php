<?php
session_start();
if (!isset($_SESSION["utilisateur"])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <title>Jungle Trek - Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body text="white" id="Body_Admin">

    <div class="header">
        <div class="Logo">
          <img src="Images/Logo.png" width="50px" height="50px"></img>
          <p id="JT"> Jungle Trek</p>
        </div>
        <div >
          <a href="Profil.php" class ="lien"> <?php echo $_SESSION["utilisateur"]["login"] ?> </a>
          <a href="../Code_php/Logout.php" class ="lien">Se déconnecter</a>
        </div>
        <div class="nav-bar">
          <a href="Accueil.php"><button class="nav-button">Accueil</button></a>
          <a href="Explorer.php"><button class="nav-button">Explorer</button></a>
          <a href="Admin.php"><button class="nav-button">Liste des utilisateurs</button></a>
        </div>
    </div>
    
    <div class="admin-boite">
        <h1 class="admin-titre">Gestion des utilisateurs</h1>
        <table class="admin-tableau">
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>    
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                
                $fichier = file("../Code_php/utilisateurs.csv", FILE_IGNORE_NEW_LINES);
                foreach($fichier as $ligne) {
                    list($login, $password, $statut, $nom, $prenom, $email, $date_naissance, $adresse, $date_inscription) = explode(",",$ligne);

                    echo '<tr>
                            <td>'.$login.'</td>
                            <td>'.strtoupper($nom).'</td>
                            <td>'.strtoupper($prenom).'</td>
                            <td> <a href="mailto:'.$email.'">'.$email.'</a></td>
                            <td>'.strtoupper($statut).'</td>
                            <td>
                                <button class="admin-btn annuler">Annuler les réservations (WIP) </button>
                                <button class="admin-btn ban">Bannir (WIP)</button>
                            </td>
                        </tr>';                                      
                } 
                ?>   
            </tbody>
        </table>
    </div>  
</body>
<footer id="footer_admin">©2025 Jungle Trek Corp, All rights reserved</footer>
</html>
