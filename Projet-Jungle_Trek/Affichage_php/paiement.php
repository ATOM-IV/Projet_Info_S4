<?php
session_start();
require_once "getapikey.php";


$transaction_id = $_SESSION["transaction_id"];
$montant = number_format($_SESSION["montant"], 2, ".", ""); 
$vendeur = "SUPMECA_C"; 
$api_key = getAPIKey($vendeur);

if ($api_key === "zzzz") {
    die(" C'est pas le bon code vendeur.");
}

$url_retour = "http://localhost/Projet-Jungle_Trek/Affichage_php/confirmation.php?transaction_id=$transaction_id";
$control = md5($api_key . "#" . $transaction_id . "#" . $montant . "#" . $vendeur . "#" . $url_retour . "#");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
</head>
<body>
    <h1>Paiement</h1>
    <p>Montant à payer : <strong><?php echo $montant; ?> €</strong></p>

    <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
        <input type="hidden" name="transaction" value="<?php echo $transaction_id; ?>">
        <input type="hidden" name="montant" value="<?php echo $montant; ?>">
        <input type="hidden" name="vendeur" value="<?php echo $vendeur; ?>">
        <input type="hidden" name="retour" value="<?php echo $url_retour; ?>">
        <input type="hidden" name="control" value="<?php echo $control; ?>">
        <button type="submit">Accéder au paiement</button>
    </form>
</body>
</html>