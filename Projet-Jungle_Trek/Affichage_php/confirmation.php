<?php
session_start();
require_once "getapikey.php";



$transaction = $_GET["transaction_id"];
$montant = $_GET["montant"];
$vendeur = $_GET["vendeur"];
$statut = $_GET["status"];
$control_recu = $_GET["control"];


$api_key = getAPIKey($vendeur);
if ($api_key === "zzzz") {
    die(" problème de code vendeur.");
}


$chaine = $api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $statut . "#";

$control_attendu = md5($chaine);

if ($control_recu === $control_attendu) {
    echo "Contrôle est bon";
} else {
    echo "Contrôle est pas bon";
}

if ($statut !== "accepted") {
    die("Paiement refusé");
}

$utilisateur = $_SESSION["utilisateur"]["login"];
$parcours = $_SESSION["parcours"] ;
$date = $_SESSION["date"] ;
$duree = $_SESSION["duree"] ;
$accompagnements = $_SESSION["accompagnements"];
$equipements = $_SESSION["equipements"];

$transaction_data = [
    "utilisateur" => $utilisateur,
    "transaction_id" => $transaction,
    "montant" => number_format($montant, 2, ".", ""),
    "vendeur" => $vendeur,
    "statut" => $statut,
    "date" => $date,
    "parcours" => $parcours,
    "duree1" => $duree[0],
    "duree2" => $duree[1],
    "duree3" => $duree[2],
    "accompagnements1" => $accompagnements[0],
    "accompagnements2" => $accompagnements[1],
    "accompagnements3" => $accompagnements[2],
    "equipements1" => $equipements[0],
    "equipements2" => $equipements[1],
    "equipements3" => $equipements[2]
];


$fichier = fopen("transactions.csv", "a+");
fputcsv($fichier, $transaction_data);
echo "Paiement bon, voyage réservé.";
fclose($fichier);



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retour à la page HTML</title>
</head>
<body>

    <a href="Reserver.php">
        <button>Retour à la page des voyages</button>
    </a>

</body>
</html>