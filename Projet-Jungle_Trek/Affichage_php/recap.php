<?php
session_start();

function fmt_euro($n) {
    return number_format($n, 2, ',', ' ') . ' €';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["date"] = $_POST["date"];
    $_SESSION["parcours"] = $_POST["parcours"];
    $_SESSION["duree"] = $_POST["duree"];

    $_SESSION["accompagnements"][0] = $_POST["accompagnement"][0];
    $_SESSION["accompagnements"][1] = $_POST["accompagnement"][1];
    $_SESSION["accompagnements"][2] = $_POST["accompagnement"][2];

    $_SESSION["equipements"][0] = $_POST["equipement"][0];
    $_SESSION["equipements"][1] = $_POST["equipement"][1];
    $_SESSION["equipements"][2] = $_POST["equipement"][2];

    $_SESSION["montant"] = $_POST["montant"]; 
    $_SESSION["transaction_id"] = substr(uniqid(), 0, 24);
    }

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
            <h2 id='titre-voyage'>Récapitulatif de votre voyage :</h2><br>
            <p>Date :". $_SESSION["date"]."</p>
            <p>Parcours :".$_SESSION["parcours"]."</p>";

    for ($i = 0; $i < 3; $i++) {
        echo "<br><br><h3>Étape " . ($i + 1) . "</h3>";
        echo "<p>Durée :" . $_SESSION["duree"][$i]. "heure(s)</p>"; // Affichage de la durée avec "h"               
        echo "<p>Accompagnements : " . $_SESSION["accompagnements"][$i] . "</p>";
        echo "<p>Équipements : " . $_SESSION["equipements"][$i] . "</p>";
    }
    echo "<br>Prix :" . fmt_euro($_SESSION['montant']);


    echo "<br><br></div>";
    
    

    if (!isset($_POST["consultation"])){
        echo "<div class='paiement'>
                <p>Prêt à procéder au paiement ?</p><br>
                <a href='paiement.php'><button>Payer maintenant (". fmt_euro($_SESSION['montant']) . ") </button></a>
            </div>";}
    else {
        echo "<div class='paiement'>
                <p>Retour au profil ?</p><br>
                <a href='Profil.php'><button>Retour</button></a>
            </div>";
    }

    echo "</body></html>
        <footer id='footerrechercher'> 
        <p>©2025 Jungle Trek Corp, All rights reserved</p>
        </footer>";
?>