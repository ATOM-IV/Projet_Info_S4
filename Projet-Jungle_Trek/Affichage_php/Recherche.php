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

<script src="../Code_JS/recherche-filtre.js"></script>
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
          <input type="text" id= "barre-recherche" name="recherche" placeholder="Entrez des étapes de voyages..." class="search-input">
          Prix maximal : 
          <input type="number" id="filtre-montant" name="filtre-montant" min="270" max="10000" placeholder=" MAX ">
        </div>


    <div class="explorer-container">

        <h1 class="explorer-title">Découvrez nos destinations !</h1>

        <div class="explorer-grid">
            <div class="destination-card" data-etapes="temple village zoo" data-montant="475">
                <img src="Images/Jungle_temple.png" alt="Aventure en Amazonie">
                <p><H2><u>Temple-Village-Zoo</u></H2></p>
                <p>Le parcours du moment avec les options les plus utilisées par nos chers clients ! Venez voir ça de plus près 
                  et tentez de résister à la tentation de réserver votre place (vous n'y arriverez pas). 
                  <br><br>2h au temple - 1h au village - 3h aux zoo
                  <br>Montant : 475€
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

                      <button type="submit">Réserver ce voyage</button> 
                  </form>
                </p>
            </div>

            <div class="destination-card" data-etapes="village cascade zoo" data-montant="370">
                <img src="Images/Tribu.png" alt="Tribu">
                <p><H2><u>Village-Cascade-Zoo</u></H2></p>
                <p>Ce parcours est un classique pour les ethnologues en herbe, qui veulent s'immerser dans un environnement inconnu. Venez découvrir de nouvelles manières de penser, et poursuivez par une baignade et une visite du royaume animal!
                <br><br>3h au village - 1h à la cascade - 1h au zoo
                <br>Montant : 370€               
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

                      <button type="submit">Réserver ce voyage</button> 
                  </form>
                </p>
            </div>

            <div class="destination-card" data-etapes="temple cascade village" data-montant="385">
                <img src="Images/Cascade.png" alt="Cascade">
                <p><H2><u>Temple-Cascade-Village</u></H2></p>
                <p>Venez profiter d'une baignade de 3 heures au pied de nos casacades, après une courte visite du temple. Passez ensuite vous restaurer au village!
                  <br><br>1h au temple - 3h à la cascade - 1h au village
                  <br>Montant : 385€   
                  <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Temple-Cascade-Village">

                      <input type="hidden" name="duree[0]" value="1">
                      <input type="hidden" name="duree[1]" value="3">
                      <input type="hidden" name="duree[2]" value="1">

                      <input type="hidden" name="accompagnement[0]" value="Guide local">
                      <input type="hidden" name="accompagnement[1]" value="Aucun">
                      <input type="hidden" name="accompagnement[2]" value="Aucun">

                      <input type="hidden" name="equipement[0]" value="Kit de premier secours">
                      <input type="hidden" name="equipement[1]" value="Aucun">
                      <input type="hidden" name="equipement[2]" value="Aucun">

                      <button type="submit">Réserver ce voyage</button> 
                  </form>
                </p>
            </div>

            <div class="destination-card" data-etapes="cascade zoo temple" data-montant="640">
                <img src="Images/Tigre.jpg" alt="Tigre">
                <p><H2><u>Cascade-Zoo-Temple</u></H2></p>
                <p>Profitez de tout nos services en prenant la totale : 3h à chaque étape pour pleinement profiter de l'expérience, avec les meilleurs options choisi par nos soins!
                  <br><br>3h à la cascade - 3h au zoo - 3h au temple
                  <br>Montant : 640€ (le plaisir a un prix)  
                  <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Cascade-Zoo-Temple">

                      <input type="hidden" name="duree[0]" value="3">
                      <input type="hidden" name="duree[1]" value="3">
                      <input type="hidden" name="duree[2]" value="3">

                      <input type="hidden" name="accompagnement[0]" value="Guerrier local">
                      <input type="hidden" name="accompagnement[1]" value="Guerrier local">
                      <input type="hidden" name="accompagnement[2]" value="Guerrier local">

                      <input type="hidden" name="equipement[0]" value="Kit de premier secours">
                      <input type="hidden" name="equipement[1]" value="Kit de premier secours">
                      <input type="hidden" name="equipement[2]" value="Kit de premier secours">

                      <button type="submit">Réserver ce voyage</button> 
                  </form>
                </p>
            </div>

            <div class="destination-card" data-etapes="temple village zoo" data-montant="270">
                <img src="Images/Jungle_temple.png" alt="Aventure en Amazonie">
                <p><H2><u>Temple-Village-Zoo</u></H2></p>
                <p>Une version light (la moins chère possible) de notre parcours phare pour nos clients qui ne peuvent pas se permettre de grands luxes! Tout le monde peut passer un bon moment avec Jungle-Trek! 
                  <br><br>1h au temple - 1h au village - 1h aux zoo
                  <br>Montant : 270€ (Le moins cher sur le marché!)
                  <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Temple-Village-Zoo">

                      <input type="hidden" name="duree[0]" value="1">
                      <input type="hidden" name="duree[1]" value="1">
                      <input type="hidden" name="duree[2]" value="1">

                      <input type="hidden" name="accompagnement[0]" value="Aucun">
                      <input type="hidden" name="accompagnement[1]" value="Aucun">
                      <input type="hidden" name="accompagnement[2]" value="Aucun">

                      <input type="hidden" name="equipement[0]" value="Aucun">
                      <input type="hidden" name="equipement[1]" value="Aucun">
                      <input type="hidden" name="equipement[2]" value="Aucun">

                      <button type="submit">Réserver ce voyage</button> 
                  </form>
                </p>
            </div>

            <div class="destination-card" data-etapes="village cascade zoo" data-montant="370">
                <img src="Images/Tribu.png" alt="Tribu">
                <p><H2><u>Village-Cascade-Zoo</u></H2></p>
                <p>Ce parcours est un classique pour les ethnologues en herbe, qui veulent s'immerser dans un environnement inconnu. Venez découvrir de nouvelles manières de penser, et poursuivez par une baignade et une visite du royaume animal!
                <br><br>3h au village - 1h à la cascade - 1h au zoo
                <br>Montant : 370€               
                <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Village-Cascade-Zoo">

                      <input type="hidden" name="duree[0]" value="1">
                      <input type="hidden" name="duree[1]" value="2">
                      <input type="hidden" name="duree[2]" value="1">

                      <input type="hidden" name="accompagnement[0]" value="Guide local">
                      <input type="hidden" name="accompagnement[1]" value="Aucun">
                      <input type="hidden" name="accompagnement[2]" value="Aucun">

                      <input type="hidden" name="equipement[0]" value="Kit de premier secours">
                      <input type="hidden" name="equipement[1]" value="Aucun">
                      <input type="hidden" name="equipement[2]" value="Aucun">

                      <button type="submit">Réserver ce voyage</button> 
                  </form>
                </p>
            </div>

            <div class="destination-card" data-etapes="village cascade zoo" data-montant="400">
                <img src="Images/Tribu.png" alt="Tribu">
                <p><H2><u>Village-Cascade-Zoo</u></H2></p>
                <p>Un parcours centré sur le village avec un guide local toujours à vos côtés, afin que vous sachiez toujours quoi faire!
                <br><br>3h au village - 1h à la cascade - 1h au zoo
                <br>Montant : 400€               
                <form action="Reserver.php" method="POST">
                      <input type="hidden" name="parcours" value="Village-Cascade-Zoo">

                      <input type="hidden" name="duree[0]" value="3">
                      <input type="hidden" name="duree[1]" value="1">
                      <input type="hidden" name="duree[2]" value="1">

                      <input type="hidden" name="accompagnement[0]" value="Guide local">
                      <input type="hidden" name="accompagnement[1]" value="Guide local">
                      <input type="hidden" name="accompagnement[2]" value="Guide local">

                      <input type="hidden" name="equipement[0]" value="Coupe-coupe + sarbacane">
                      <input type="hidden" name="equipement[1]" value="Chapeau + Chaussures de randonnée">
                      <input type="hidden" name="equipement[2]" value="Kit de premier secours">

                      <button type="submit">Réserver ce voyage</button>
                  </form>
                </p>
            </div>
        </div>
    </div>

    <footer id="footer_admin">©2025 Jungle Trek Corp, All rights reserved</footer>

</body>
</html>
