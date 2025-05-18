<?php
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['login'])) {
    echo "0";
    exit;
}

$login = trim($_GET['login']);
$fichier = fopen("utilisateurs.csv", "r");

while (($ligne = fgetcsv($fichier, 1000, ",")) !== FALSE) {
    if ($ligne[0] === $login) {
        echo "1"; 
        fclose($fichier);
        exit;
    }
}

fclose($fichier);
echo "0"; 
?>
