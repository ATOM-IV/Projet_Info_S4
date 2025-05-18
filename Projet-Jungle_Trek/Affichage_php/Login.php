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
    <?php include '../Code_php/theme-loader.php'; ?>

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
          <a href="Voyages_du_moment.php"><button class="nav-button">Voyages du moment</button></a>
          <a href="Recherche.php"><button class="nav-button">Rechercher</button></a>
          <a href="Reserver.php"><button class="nav-button">Réserver</button></a>
          <button class="nav-button" id="theme-toggle">🌓 Thème</button>
        </div>
    </div>
    
    <div class ="INPUT">
        <form action="../Code_php/connexion.php" method="POST" class="formulaire">
            <div class="i1">
                <p class="label">Identifiant</p>
                <input type="text" name="login" placeholder="Identifiant de connection" class="i1into" required>
            </div>

            <div class="i1">
                <div class="labeltoggle">
                    <span class="label">Mot de Passe</span>
                    <button type="button" id="toggle-password-login" class="boutonvisu">👁️</button>
                </div>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" class="i1into">   
            </div>
            
            <div id="Boutons">
                <button type="submit" class="B1">Connection</button>
            </div>

            <script src="../Code_JS/toggle-mdp-login.js" defer></script>
        </form>
    </div>
    </body>
    <footer id="footer">
        ©2025 Jungle Trek Corp, All rights reserved
    </footer>
</html>