<?php
session_start();

$date = $_POST["date"];
$parcours = $_POST["parcours"];
$durees = array_map('intval', $_POST["duree"]);

$accompagnements[0] = isset($_POST["accompagnement"][0]) ? (array)$_POST["accompagnement"][0] : 0;
$accompagnements[1] = isset($_POST["accompagnement"][1]) ? (array)$_POST["accompagnement"][1] : 0;
$accompagnements[2] = isset($_POST["accompagnement"][2]) ? (array)$_POST["accompagnement"][2] : 0;

$equipements[0] = isset($_POST["equipement"][0]) ? (array)$_POST["equipement"][0] : 0;
$equipements[1] = isset($_POST["equipement"][1]) ? (array)$_POST["equipement"][1] : 0;
$equipements[2] = isset($_POST["equipement"][2]) ? (array)$_POST["equipement"][2] : 0;

$utilisateur = $_SESSION["login"] ?? "inconnu";


/*
$prix_parcours = [
    "a-b-c" => 50,
    "d-c-a" => 60,
    "b-d-c" => 55,
    "a-d-b" => 65
];

$prix_duree = 10;
$prix_accompagnement = 5;
$prix_equipement = 7;



$prix_total = $prix_parcours[$parcours] + (array_sum($durees) * $prix_duree) +
                (count($accompagnements) * $prix_accompagnement) +
                (count($equipements) * $prix_equipement);
*/


$prix_total = 100;
$transaction_id = substr(uniqid(), 0, 24); 



$_SESSION["montant"] = $prix_total;
$_SESSION["transaction_id"] = $transaction_id;
$_SESSION["parcours"] = $parcours;
$_SESSION["date"] = $date;
$_SESSION["duree"] = $durees;
$_SESSION["accompagnements"] = $accompagnements;
$_SESSION["equipements"] = $equipements;

    header("Location: ../Affichage_php/recap.php");
    exit();

?>