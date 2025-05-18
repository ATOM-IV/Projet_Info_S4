<?php
session_start();


function fmt_euro($n) {
    return number_format($n, 2, ',', ' ') . ' €';
}


$panier = $_SESSION['panier'] ?? [];


$totalGeneral = 0;
foreach ($panier as $voyage) {
    $totalGeneral += $voyage['montant'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payer_tout'])) {

    $_SESSION['montant'] = $totalGeneral;

    $_SESSION['transaction_id'] = substr(uniqid(), 0, 24);

    header("Location: paiement.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de vos voyages</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bodyrechercher">
    <div class="recap">
        <h2 id="titre-voyage">Récapitulatif de vos voyages</h2>

        <?php if (!empty($panier)): ?>

            <form action="" method="POST" class="paiement-top">
                <button type="submit" name="payer_tout">
                    Payer tout (<?= fmt_euro($totalGeneral) ?>)
                </button>
            </form>
            <hr>
        <?php endif; ?>

        <?php if (empty($panier)): ?>
            <p>Votre panier est vide.</p>
        <?php else: ?>
            <?php foreach ($panier as $index => $voyage): ?>
                <div class="voyage-item">
                    <h3>Voyage #<?= $index + 1 ?></h3>
                    <p>Date : <?= htmlspecialchars($voyage['date']) ?></p>
                    <p>Parcours : <?= htmlspecialchars($voyage['parcours']) ?></p>
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <h4>Étape <?= $i + 1 ?></h4>
                        <p>Durée : <?= htmlspecialchars($voyage['duree'][$i]) ?> heure(s)</p>
                        <p>Accompagnement : <?= htmlspecialchars($voyage['accompagnement'][$i]) ?></p>
                        <p>Équipement : <?= htmlspecialchars($voyage['equipement'][$i]) ?></p>
                    <?php endfor; ?>
                    <p><strong>Prix de ce voyage : <?= fmt_euro($voyage['montant']) ?></strong></p>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
<footer id="footerrechercher">
    <p>©2025 Jungle Trek Corp, All rights reserved</p>
</footer>
</html>