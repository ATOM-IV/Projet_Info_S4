<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("Location: Login.php"); 
    exit();
}

$utilisateur = $_SESSION["utilisateur"];
?>

<a href="logout.php">Se déconnecter</a>