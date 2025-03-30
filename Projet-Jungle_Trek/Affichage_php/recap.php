<?php
session_start();



$equipement_nom = [
    0 => "Aucun",
    1 => "Coupe-coupe + sarbacane",
    2 => "Chapeau + Chaussures de randonnée",
    3 => "Kit de premier secours"
];


$accompagnement_nom = [
    0 => "Aucun",
    1 => "Guide local",
    2 => "Guerrier local",
    3 => "Animal de compagnie"
];


$parcours_nom = [
    'a-b-c' => 'Temple-Village-Zoo',
    'd-c-a' => 'Cascade-Zoo-Temple',
    'b-d-c' => 'Village-Cascade-Zoo',
    'a-d-b' => 'Temple-Cascade-Village'
];


$date = $_SESSION['date'];
$parcours = $_SESSION['parcours'];
$durees = $_SESSION['duree'];
$accompagnements = $_SESSION['accompagnements'];
$equipements = $_SESSION['equipements'];


$parcours_nom_complet = isset($parcours_nom[$parcours]) ? $parcours_nom[$parcours] : $parcours;


echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Récapitulatif de votre voyage</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body id='bodyrechercher'>";


echo "<div class='recap'>
        <h2 id='titre-voyage'>Récapitulatif de votre voyage :</h2>
        <p>Date : $date</p>
        <p>Parcours : $parcours_nom_complet</p>";
        $_SESSION["parcours"]=$parcours_nom[$parcours];



    for ($i = 0; $i < 3; $i++) {
        $duree_i = $durees[$i];

        echo "<h3>Étape " . ($i + 1) . "</h3>";
        echo "<p>Durée :" . $durees[$i]. "heure(s)</p>"; // Affichage de la durée avec "h"               
        echo "<p>Accompagnements : " . $accompagnement_nom[(int)$accompagnements[$i]] . "</p>";
        $_SESSION["accompagnements"][$i] = $accompagnement_nom[(int)$accompagnements[$i]];
        echo "<p>Équipements : " . $equipement_nom[(int)$equipements[$i]] . "</p>";
        $_SESSION["equipements"][$i] = $equipement_nom[(int)$equipements[$i]];
    }


echo "</div>";


echo "<div class='paiement'>
        <p>Prêt à procéder au paiement ?</p>
        <a href='paiement.php'><button>Payer maintenant</button></a>
    </div>";


echo "<footer id='footerrechercher'>
        <p>©2025 Jungle Trek Corp, All rights reserved</p>
    </footer>";


echo "</body></html>";


?>

