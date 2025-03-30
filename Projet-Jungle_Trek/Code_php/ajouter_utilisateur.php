<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
    $statut = $_POST["statut"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $date_naissance = $_POST["date_naissance"];
    $adresse = $_POST["adresse"];
    $date_inscription = date("Y-m-d H:i:s");

    $ligne = array($login, $mot_de_passe, $statut, $nom, $prenom, $email, $date_naissance, $adresse, $date_inscription);

    $fichier = fopen("utilisateurs.csv", "a+");

        fputcsv($fichier, $ligne);
        fclose($fichier);
        header("Location: ../Affichage_php/Accueil.php"); 

        exit(); 
}
?>