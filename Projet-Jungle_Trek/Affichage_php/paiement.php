<?php
session_start();
require_once "getapikey.php";

$api_key = getAPIKey("SUPMECA_C");

if ($api_key === "zzzz") {
    die(" C'est pas le bon code vendeur.");
}

$url_retour = "http://localhost/Projet_Info_S4-Phase3/Projet-Jungle_Trek/Affichage_php/confirmation.php?transaction_id=".$_SESSION["transaction_id"];
$control = md5($api_key . "#" . $_SESSION["transaction_id"] . "#" . number_format($_SESSION["montant"], 2, ".", "") . "#" . "SUPMECA_C" . "#" . $url_retour . "#");

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
    <p>Montant à payer : <strong><?php echo number_format($_SESSION["montant"], 2, ".", ""); ?> €</strong></p>

    <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
        <input type="hidden" name="transaction" value=  "<?php echo $_SESSION["transaction_id"]; ?>">
        <input type="hidden" name="montant"     value=  "<?php echo number_format($_SESSION["montant"], 2, ".", ""); ?>">
        <input type="hidden" name="vendeur"     value=  "SUPMECA_C">
        <input type="hidden" name="retour"      value=  "<?php echo $url_retour; ?>">
        <input type="hidden" name="control"     value=  "<?php echo $control; ?>">
        <button type="submit">Accéder au paiement</button>
    </form>
</body>
</html>