<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST["login"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $fichier = file("utilisateurs.csv", FILE_IGNORE_NEW_LINES);

    foreach ($fichier as $ligne) {
        list($saved_login, $saved_password, $statut, $nom, $prenom, $email, $date_naissance, $adresse, $date_inscription) = explode(",",$ligne);

        if ($login === $saved_login && password_verify($mot_de_passe, $saved_password)) {
            $_SESSION["utilisateur"] = [
                "login" => $login,
                "statut" => $statut,
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "date_naissance" => $date_naissance,
                "adresse" => $adresse,
                "date_inscription" => $date_inscription
            ];
            header("Location: ../Affichage_php/Accueil.php"); 
            exit(); 
        }
    }

    header("Location: ../Affichage_php/Login.php");
    exit(); 
}
?>
