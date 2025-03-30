<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Affichage_php/Login.php");
exit();
?>
