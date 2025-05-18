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
        <?php include '../Code_php/theme-loader.php'; ?>

    </head>

    <script src="../Code_JS/profil_modifier.js" defer></script>
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

        <div class="profil-container">
            <h1 class="profil-title">Profil utilisateur :</h1>
            <div class="profil-info">


              <form method="POST" action="../Code_php/modifier_utilisateur.php">
                <div class="profil-champ" data-champ="login" data-original="<?php echo htmlspecialchars($_SESSION["utilisateur"]["login"]); ?>">
                  <label>Identifiant :</label>
                  <input type="text" name="login" class="profil-input" value="<?php echo htmlspecialchars($_SESSION["utilisateur"]["login"]); ?>" disabled>
                  <button type="button" class="edit-btn">✏️</button>
                  <button type="button" class="save-btn" style="display:none;">✔️</button>
                  <button type="button" class="cancel-btn" style="display:none;">❌</button>
                </div>

                <div class="profil-champ" data-champ="nom" data-original="<?php echo htmlspecialchars($_SESSION["utilisateur"]["nom"]); ?>">
                  <label>Nom :</label>
                  <input type="text" name="nom" class="profil-input" value="<?php echo htmlspecialchars($_SESSION["utilisateur"]["nom"]); ?>" disabled>
                  <button type="button" class="edit-btn">✏️</button>
                  <button type="button" class="save-btn" style="display:none;">✔️</button>
                  <button type="button" class="cancel-btn" style="display:none;">❌</button>
                </div>

                <div class="profil-champ" data-champ="prenom" data-original="<?php echo htmlspecialchars($_SESSION["utilisateur"]["prenom"]); ?>">
                  <label>Prénom :</label>
                  <input type="text" name="prenom" class="profil-input" value="<?php echo htmlspecialchars($_SESSION["utilisateur"]["prenom"]); ?>" disabled>
                  <button type="button" class="edit-btn">✏️</button>
                  <button type="button" class="save-btn" style="display:none;">✔️</button>
                  <button type="button" class="cancel-btn" style="display:none;">❌</button>
                </div>

                <div class="profil-champ" data-champ="email" data-original="<?php echo htmlspecialchars($_SESSION["utilisateur"]["email"]); ?>">
                  <label>E-mail :</label>
                  <input type="email" name="email" class="profil-input" value="<?php echo htmlspecialchars($_SESSION["utilisateur"]["email"]); ?>" disabled>
                  <button type="button" class="edit-btn">✏️</button>
                  <button type="button" class="save-btn" style="display:none;">✔️</button>
                  <button type="button" class="cancel-btn" style="display:none;">❌</button>
                </div>

                <div class="profil-champ" data-champ="date_naissance" data-original="<?php echo htmlspecialchars($_SESSION["utilisateur"]["date_naissance"]); ?>">
                  <label>Date de naissance :</label>
                  <input type="date" name="date_naissance" class="profil-input" value="<?php echo htmlspecialchars($_SESSION["utilisateur"]["date_naissance"]); ?>" disabled>
                  <button type="button" class="edit-btn">✏️</button>
                  <button type="button" class="save-btn" style="display:none;">✔️</button>
                  <button type="button" class="cancel-btn" style="display:none;">❌</button>
                </div>

                <div class="profil-champ" data-champ="adresse" data-original="<?php echo htmlspecialchars($_SESSION["utilisateur"]["adresse"]); ?>">
                  <label>Adresse :</label>
                  <input type="text" name="adresse" class="profil-input" value="<?php echo htmlspecialchars($_SESSION["utilisateur"]["adresse"]); ?>" disabled>
                  <button type="button" class="edit-btn">✏️</button>
                  <button type="button" class="save-btn" style="display:none;">✔️</button>
                  <button type="button" class="cancel-btn" style="display:none;">❌</button>
                </div>

                <button type="submit" id="submit-btn" style="display:none;margin-left:auto;margin-right:auto;">Soumettre les modifications</button>
                <br>
              </form>



                Date d'inscription : <?php echo $_SESSION["utilisateur"]["date_inscription"] ?><br>
                Rôle : <?php echo strtoupper($_SESSION["utilisateur"]["statut"])?> <br><br>

                <form action="recap.php" method="POST">
                  <button type="submit">Afficher le panier</button>
                </form>
                <br><br>

                <?php if ($_SESSION["utilisateur"]["statut"]=="client") {
                    echo "Voyage réservées :<br>";
                    
                    $fichier=file("transactions.csv", FILE_IGNORE_NEW_LINES); 

                    foreach($fichier as $ligne) {
                        list($utilisateur, $id, $prix, $vendeur, $statut, $date, $parcours, $duree1, $duree2, $duree3, $acc1, $acc2, $acc3, $equip1, $equip2, $equip3) = explode(",", $ligne);

                        if ($utilisateur==$_SESSION["utilisateur"]["login"]) {

                          echo "<br>"."Parcours : ".$parcours."<br>";
                          echo "Date : ".$date."<br>";

                          echo '<form action="recap_reservations_finis.php" method="POST">';
                          echo    '<input type="hidden" name="consultation" value="1">';
                          echo    '<input type="hidden" name="date" value="'.$date.'">';
                          echo    '<input type="hidden" name="parcours" value="'.$parcours.'">';

                          echo    '<input type="hidden" name="duree[0]" value="'.$duree1.'">';
                          echo    '<input type="hidden" name="duree[1]" value="'.$duree2.'">';
                          echo    '<input type="hidden" name="duree[2]" value="'.$duree3.'">';

                          echo    '<input type="hidden" name="accompagnement[0]" value="'.$acc1.'">';
                          echo    '<input type="hidden" name="accompagnement[1]" value="'.$acc2.'">'; 
                          echo    '<input type="hidden" name="accompagnement[2]" value="'.$acc3.'">';

                          echo    '<input type="hidden" name="equipement[0]" value="'.$equip1.'">';
                          echo    '<input type="hidden" name="equipement[1]" value="'.$equip2.'">';
                          echo    '<input type="hidden" name="equipement[2]" value="'.$equip3.'">';
                          echo    '<input type="hidden" name="montant" value="'. $prix. '">';

                          echo    '<button type="submit">Voir les détails</button>
                                </form>';
                        }
                    }
                }
                ?>
                
            </div>
        </div>
    </body>
    <footer id="footer">©2025 Jungle Trek Corp, All rights reserved</footer>
</html>