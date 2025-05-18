<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $ancien_login = $_SESSION["utilisateur"]["login"];

        $lignes = file("utilisateurs.csv", FILE_IGNORE_NEW_LINES);

        $fichier_temp = fopen("temp.csv", "w");
    
        foreach ($lignes as $ligne) {
            $colonnes = str_getcsv($ligne);

            if ($colonnes[0] === $ancien_login) {

                if (isset($_POST["login"])){
                    $_SESSION["utilisateur"]["login"] = $_POST["login"];
                    $colonnes[0] = $_POST["login"];
                }

                if (isset($_POST["nom"])){
                    $_SESSION["utilisateur"]["nom"] = $_POST["nom"];
                    $colonnes[3] = $_POST["nom"];
                }

                if (isset($_POST["prenom"])){
                    $_SESSION["utilisateur"]["prenom"] = $_POST["prenom"];
                    $colonnes[4] = $_POST["prenom"];
                }

                if (isset($_POST["date_naissance"])){
                    $_SESSION["utilisateur"]["date_naissance"] = $_POST["date_naissance"];
                    $colonnes[6] = $_POST["date_naissance"];
                }

                if (isset($_POST["email"])){
                    $_SESSION["utilisateur"]["email"] = $_POST["email"];
                    $colonnes[5] = $_POST["email"];
                }

                if (isset($_POST["adresse"])){
                    $_SESSION["utilisateur"]["adresse"] = $_POST["adresse"];
                    $colonnes[7] = $_POST["adresse"];
                }

            }

            fwrite($fichier_temp, implode(',', $colonnes) . "\n");

        }

        fclose($fichier_temp);
        rename("temp.csv", "utilisateurs.csv");

        header("Location: ../Affichage_php/Profil.php");
        exit();
    }


    else {
        header("Location: ../Affichage_php/Profil.php");
        exit();
    }

?>