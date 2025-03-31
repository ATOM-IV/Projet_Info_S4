<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <title>Jungle Trek - Explorer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
        </div>
    </div>

    <div class="explorer-container">
        <h1 class="explorer-title">Découvrez nos destinations</h1>

        <div class="explorer-grid">
            <div class="destination-card">
                <img src="Images/Jungle_temple.png" alt="Aventure en Amazonie">
                <p><H2><u>Temple de la jungle</u></H2></p>
                <p>Venez tentez de reconstituer l'intrigante histoire qui se cache derrière ce temple, en examinant par vous-mêmes les différents artéfacts dont il regorge.
                  Ne vous en faites pas, tout les pièges (ou presque) ont été désactivées par notre équipe locale de démineurs.
                </p>
            </div>
            <div class="destination-card">
                <img src="Images/Tribu.png" alt="Rencontre des guardiens de la jungle">
                <p><H2><u>Village des guardiens de la jungle</u></H2></p>
                <p>Rencontrez les habitants de cette forteresse secrète au sein de la jungle qui se lègue de génération en génération la responsabilité de protéger la jungle. 
                  Découvrez leurs savoirs-faire tribaux et leur philosophie sacrée visant à harmoniser la nature et les Hommes.</p>
            </div>
            <div class="destination-card">
                <img src="Images/Tigre.jpg" alt="Zoo en pleine jungle">
                <p><H2><u>Zoo en pleine jungle!</u></H2></p>
                <p>Si vous aimez les animaux, ne ratez pas cette occasion de visiter ce zoo en pleine jungle! En plein dans leur habitat naturel, les animaux ne remarquent 
                  même pas qu'ils sont en captivité tant ils se sentent chez eux. Passez voir nos tigres, anacondas, gorilles, araignées géantes, et plein d'autres créatures exotiques !</p>
            </div>
            <div class="destination-card">
                <img src="Images/Cascade.png" alt="Cascades et sources">
                <p><H2><u>Cascades et sources d'eaux</u></H2></p>
                <p>Vous ne supportez pas la chaleur et êtes bon nageur? Vous n'en pouvez plus des paysages urbains anxiogènes? C'est normal! C'est pour cette raison que nous 
                  luttons pour permettre à tous de profiter d'une bonne baignade en pleine jungle. Venez vous détendre au pied de cette magnifique cascade.
                </p>
            </div>
        </div>
    </div>

    <footer id="footer_admin">©2025 Jungle Trek Corp, All rights reserved</footer>

</body>
</html>
