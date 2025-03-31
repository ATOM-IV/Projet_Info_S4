<?php
session_start();
?>

<!DOCTYPE html>

<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <title> Jungle Trek - Inscrption </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body id="Body_Login">
  
    <div class="header">
        <div class="Logo">
          <img src="Images/Logo.png" width="50px" height="50px"></img>
          <p id="JT"> Jungle Trek</p>
        </div>
        <div >
          <?php if (isset($_SESSION["utilisateur"])): ?>
              <a href="Profil.php" class ="lien"> <?php echo $_SESSION["utilisateur"]["login"] ?> </a>
              <a href="../Code_php/Logout.php" class ="lien">Se déconnecter</a>
          <?php else: ?>
              <a href="Login.php" class ="lien">Se connecter</a>
              <a href="Inscription.php" class ="lien">S'inscrire</a>
          <?php endif; ?>
        </div>
        <div class="nav-bar">
            <a href="Accueil.php"><button class="nav-button">Accueil</button></a>
            <a href="Presentation.php"><button class="nav-button">Explorer</button></a>
            <a href="Voyages_du_moment.php"><button class="nav-button">Voyages du moment</button></a>
            <a href="Recherche.php"><button class="nav-button">Rechercher</button></a>
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
    
    <div class ="INPUT">
        <form action="../Code_php/ajouter_utilisateur.php" method="POST" class="formulaire">
            <div class="i1">
                <p class="label">Identifiant</p>
                <input type="text" name="login" placeholder="Identifiant de connexion" class="i1into" required>
            </div>

            <div class="i1">
                <p class="label">Mot de Passe</p>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" class="i1into" required>   
            </div>

            <div class="i1">
                <select name="statut" id="i1select" class="i1into">
                    <option value="client">Client</option>
                    <option value="administrateur">Administrateur</option>
                </select>
            </div>

            <div class="i1">
                <p class="label">Nom</p>
                <input type="text" name="nom" placeholder="Nom" class="i1into" required>   
            </div>

            <div class="i1">
                <p class="label">Prénom</p>
                <input type="text" name="prenom" placeholder="Prénom" class="i1into" required>   
            </div>

            <div class="i1">
                <p class="label">Email</p>
                <input type="text" name="email" placeholder="jean.dupont@jungle-trek.com" class="i1into" required>   
            </div>

            <div class="i1">
                <p class="label">Date de naissance</p>
                <input type="date" name="date_naissance" class="i1into" required>   
            </div>

            <div class="i1">
                <p class="label">Adresse</p>
                <input type="text" name="adresse" placeholder="5 rue des Rivolis" class="i1into" required>   
            </div>

            <div id="Boutons">
                <button type="submit" class="B1">S'inscrire</button>
            </div>
            </form>
    </div>
    </body>
    <footer id="footer">
        ©2025 Jungle Trek Corp, All rights reserved
    </footer>
</html>
