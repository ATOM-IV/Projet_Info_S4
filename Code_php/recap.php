<?php
// Tableau associatif pour lier les valeurs des équipements aux noms
$equipement_nom = [
    1 => "Coupe-coupe + sarbacane",
    2 => "Chapeau + Chaussures de randonnée",
    3 => "Kit de premier secours"
];

// Tableau associatif pour lier les valeurs des accompagnements aux noms
$accompagnement_nom = [
    1 => "Guide local",
    2 => "Guerrier local",
    3 => "Animal de compagnie"
];

// Tableau associatif pour lier les codes de parcours aux noms complets des parcours
$parcours_nom = [
    'a-b-c' => 'Temple-Village-Zoo',
    'd-c-a' => 'Cascade-Zoo-Temple',
    'b-d-c' => 'Village-Cascade-Zoo',
    'a-d-b' => 'Temple-Cascade-Village'
];

// Vérification que la requête est bien en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des valeurs envoyées
    $date = isset($_POST['date']) ? $_POST['date'] : 'Non spécifiée';
    $parcours = isset($_POST['parcours']) ? $_POST['parcours'] : 'Non spécifié';

    // Remplacer le code du parcours par le nom complet
    $parcours_nom_complet = isset($parcours_nom[$parcours]) ? $parcours_nom[$parcours] : $parcours;

    // Début du code HTML
    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Récapitulatif de votre voyage</title>
        <link rel='stylesheet' type='text/css' href='style.css'>
    </head>
    <body id='bodyrechercher'>";

    // Conteneur principal du récapitulatif
    echo "<div class='recap'>
            <h2 id='titre-voyage'>Récapitulatif de votre voyage :</h2>
            <p>Date : $date</p>
            <p>Parcours : $parcours_nom_complet</p>";

    // Vérification des étapes (durée, accompagnement, équipement)
    if (isset($_POST['duree']) && is_array($_POST['duree'])) {
        for ($i = 0; $i < count($_POST['duree']); $i++) {
            $duree = $_POST['duree'][$i];

            // Vérification des accompagnements
            $accompagnements = isset($_POST['accompagnement'][$i]) ? $_POST['accompagnement'][$i] : [];
            $equipements = isset($_POST['equipement'][$i]) ? $_POST['equipement'][$i] : [];

            echo "<h3>Étape " . ($i + 1) . "</h3>";
            echo "<p>Durée : $duree heure(s)</p>"; // Affichage de la durée avec "h"

            // Affichage des accompagnements avec les noms
            if (!empty($accompagnements)) {
                // Remplacer les valeurs par les noms
                $accompagnement_noms = array_map(function($accomp) use ($accompagnement_nom) {
                    return isset($accompagnement_nom[$accomp]) ? $accompagnement_nom[$accomp] : $accomp;
                }, $accompagnements);
                echo "<p>Accompagnements : " . implode(', ', $accompagnement_noms) . "</p>";
            } else {
                echo "<p>Accompagnements : Aucun</p>";
            }

            // Affichage des équipements avec les noms
            if (!empty($equipements)) {
                // Remplacer les valeurs par les noms
                $equipement_noms = array_map(function($equip) use ($equipement_nom) {
                    return isset($equipement_nom[$equip]) ? $equipement_nom[$equip] : $equip;
                }, $equipements);
                echo "<p>Équipements : " . implode(', ', $equipement_noms) . "</p>";
            } else {
                echo "<p>Équipements : Aucun</p>";
            }
        }
    } else {
        echo "<p>Aucune étape sélectionnée.</p>";
    }

    // Fermeture du div recap
    echo "</div>";

    // Ajouter le footer
    echo "<footer id='footerrechercher'>
            <p>©2025 Jungle Trek Corp, All right reserved</p>
        </footer>";

    // Fermeture du body et HTML
    echo "</body></html>";

} else {
    echo "<p>Aucune donnée reçue !</p>";
}
?>
