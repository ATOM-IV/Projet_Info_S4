<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $ancien_login = $_SESSION["utilisateur"]["login"];

        $lignes = file("utilisateur.csv", FILE_IGNORE_NEW_LINES);

        $fichier_tempo = fopen("tempo.csv", "w")
    
        foreach ($lignes as $ligne) {
            $colonnes = str_getcsv($ligne);

            if ($colonnes[0] === $ancien_login) {

                $_SESSION["utilisateur"]["login"] = $_POST["login"];
                $_SESSION["utilisateur"]["nom"] = $_POST["nom"];
                $_SESSION["utilisateur"]["prenom"] = $_POST["prenom"];
                $_SESSION["utilisateur"]["email"] = $_POST["email"];
                $_SESSION["utilisateur"]["date_naissance"] = $_POST["date_naissance"];
                $_SESSION["utilisateur"]["adresse"] = $_POST["adresse"];

                $colonnes[0] = $_POST["login"];
                $colonnes[3] = $_POST["nom"];
                $colonnes[4] = $_POST["prenom"];
                $colonnes[5] = $_POST["email"];
                $colonnes[6] = $_POST["date_naissance"];
                $colonnes[7] = $_POST["adresse"];

            }

            fputcsv($fichier_tempo, $colonnes);
        }

        fclose($fichier_temp);

        header("Location: Profil.php");
        exit();
    }

    else {
        header("Location: Profil.php");
        exit();
    }

?>