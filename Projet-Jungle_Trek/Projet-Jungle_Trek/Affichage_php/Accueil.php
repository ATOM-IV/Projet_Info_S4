<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head> 
        <meta charset="UTF-8">
        <title>Jungle Trek - Accueil</title>
        <?php include '../Code_php/theme-loader.php'; ?>
    </head>

    <body text="white" id="Body_Accueil">

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
            <button class="nav-button" id="theme-toggle">🌓 Thème</button>
          </div>
        </div>

        <div id="Presentation" style="text-shadow: 2px 2px 4px black;">
          <p> Jungle Trek est une entreprise qui propose des
              parcours de randonnée sur plusieurs jours à travers
              la plus belle jungle du monde.
          </p>
          <br>
          <p> À ce jour, Jungle Trek propose 4 parcours différentes chacun constitué de 3 étapes.
              Accompagné par les locaux pour un petit pourboire, vous serez en probablement en pleine sécurité.
          </p>
          <br>
          <p>Profiter des merveilles du monde sans vous soucier des technicités du voyage, c'est ce qu'on est fier de pouvoir vous proposer.</p>
          <br>
          <p> Jungle Trek a été fondé en 2025, à l'initiative de ses 
              trois fondateurs : Riman Saad, Clovis Cazauran, et 
              Étienne Boche. Elle s'est engagé dans l'initiative 
              1% for the Planet et propose un service à émissions 
              carbones nulles. 
          </p>
        </div>
    </body>
    <footer id="footer">
      ©2025 Jungle Trek Corp, All rights reserved
    </footer>
</html>