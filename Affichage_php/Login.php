<?php
session_start();
if (isset($_SESSION["utilisateur"])) {
    header("Location: Accueil.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <title> Jungle Trek - Login </title>
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
          <a href="Explorer.php"><button class="nav-button">Explorer</button></a>
          <a href="Reserver.php"><button class="nav-button">Réserver</button></a>
        </div>
    </div>
    
    <div class ="INPUT">
        <form action="../Code_php/connexion.php" method="POST" class="formulaire">
            <div class="i1">
                <p class="label">Identifiant</p>
                <input type="text" name="login" placeholder="Identifiant de connection" class="i1into" required>
            </div>

            <div class="i1">
                <p class="label">Mot de Passe</p>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" class="i1into">   
            </div>
            
            <div id="Boutons">
                <button type="submit" class="B1">Connection</button>
<!--            <button type="submit" class="B2">Mot de passe oublié ?</button>         Peut-être plus tard-->
            </div>
        </form>
    </div>
    </body>
    <footer id="footer">
        ©2025 Jungle Trek Corp, All rights reserved
    </footer>
</html>