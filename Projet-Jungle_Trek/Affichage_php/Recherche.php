<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <title>Jungle Trek - Explorer</title>
    <?php include '../Code_php/theme-loader.php'; ?>

</head>

<body id="Body_Explorer">

    <div class="header">
        <div class="Logo">
            <img src="Images/Logo.png" width="50px" height="50px" alt="Logo Jungle Trek">
            <p id="JT">Jungle Trek</p>
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

    <br><br>
    <div class="search-bar">
          <form action="recherche.php" method="GET">
            <input type="text" name="recherche" placeholder="Entrez des mots-clés..." class="search-input">
            <button type="submit" class="search-button">Rechercher</button>
          </form>
        </div>


    <div class="explorer-container">
        <h1 class="explorer-title">Découvrez nos destinations</h1>

        <div class="explorer-grid">
            <div class="destination-card">
                <img src="Images/Jungle_temple.png" alt="Aventure en Amazonie">
                <p><H2><u>Temple-Village-Zoo</u></H2></p>
                <p>Le parcours du moment avec les options les plus utilisées par nos chers clients ! Venez voir ça de plus près 
                  et tentez de résister à la tentation de réserver votre place (vous n'y arriverez pas).
                  <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Temple-Village-Zoo">

                      <input type="hidden" name="duree[0]" value="2">
                      <input type="hidden" name="duree[1]" value="1">
                      <input type="hidden" name="duree[2]" value="3">

                      <input type="hidden" name="accompagnement[0]" value="Guide local">
                      <input type="hidden" name="accompagnement[1]" value="Guerrier local">
                      <input type="hidden" name="accompagnement[2]" value="Aucun">

                      <input type="hidden" name="equipement[0]" value="Aucun">
                      <input type="hidden" name="equipement[1]" value="Chapeau + Chaussures de randonnée">
                      <input type="hidden" name="equipement[2]" value="Aucun">

                      <button type="submit">Reserver ce voyage</button> 
                  </form>
                </p>
            </div>
            <div class="destination-card">
                <img src="Images/Tribu.png" alt="Aventure en Amazonie">
                <p><H2><u>Village-Cascade-Zoo</u></H2></p>
                <p>Ce parcours est un classique pour les ethnologues en herbe, qui veulent s'immerser dans un environnement inconnu. Venez découvrir de nouvelles manières de penser, et poursuivez par une beignade et une visite du royaume animal!
                  <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Village-Cascade-Zoo">

                      <input type="hidden" name="duree[0]" value="3">
                      <input type="hidden" name="duree[1]" value="1">
                      <input type="hidden" name="duree[2]" value="1">

                      <input type="hidden" name="accompagnement[0]" value="Guide local">
                      <input type="hidden" name="accompagnement[1]" value="Aucun">
                      <input type="hidden" name="accompagnement[2]" value="Aucun">

                      <input type="hidden" name="equipement[0]" value="Kit de premier secours">
                      <input type="hidden" name="equipement[1]" value="Aucun">
                      <input type="hidden" name="equipement[2]" value="Aucun">

                      <button type="submit">Reserver ce voyage</button> 
                  </form>
                </p>
            </div>
        </div>
    </div>

    <footer id="footer_admin">©2025 Jungle Trek Corp, All rights reserved</footer>

</body>
</html>
