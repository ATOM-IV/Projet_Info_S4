<?php
session_start();
if (!isset($_SESSION["utilisateur"])) {
    header("Location: Login.php");
    exit();
} elseif ($_SESSION["utilisateur"]["statut"] === "administrateur") {
    header("Location: Explorer.php");
    exit();
}

$tarifs = [
    'Temple-Village-Zoo'     => 120,
    'Cascade-Zoo-Temple'     => 130,
    'Village-Cascade-Zoo'    => 110,
    'Temple-Cascade-Village' => 125,
    'duree' => [ '1' => 50, '2' => 90, '3' => 120 ],
    'accompagnement' => [
        'Aucun'               => 0,
        'Guide local'         => 30,
        'Guerrier local'      => 40,
        'Animal de compagnie' => 20,
    ],
    'equipement' => [
        'Aucun'                          => 0,
        'Coupe-coupe + sarbacane'        => 15,
        'Chapeau + Chaussures de randonnée' => 25,
        'Kit de premier secours'         => 10,
    ],
];

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $m = $tarifs[$_POST['parcours']];
    for ($i = 0; $i < 3; $i++) {
        $m += $tarifs['duree'][$_POST['duree'][$i]];
        $m += $tarifs['accompagnement'][$_POST['accompagnement'][$i]];
        $m += $tarifs['equipement'][$_POST['equipement'][$i]];
    }
    $_SESSION['panier'][] = [
        'date'           => $_POST['date'],
        'parcours'       => $_POST['parcours'],
        'duree'          => $_POST['duree'],
        'accompagnement' => $_POST['accompagnement'],
        'equipement'     => $_POST['equipement'],
        'montant'        => $m,
    ];
    $message = "Voyage ajouté au panier !";
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payer'])) {
    header("Location: recap.php");
    exit();
}


if (isset($_POST['parcours'], $_POST['duree'], $_POST['accompagnement'], $_POST['equipement'])) {
    $Choix = $_POST;
} else {
    $Choix = [
        'parcours'       => 'Temple-Village-Zoo',
        'duree'          => ['1','1','1'],
        'accompagnement' => ['Aucun','Aucun','Aucun'],
        'equipement'     => ['Aucun','Aucun','Aucun'],
    ];
}


$montant = $tarifs[$Choix['parcours']];
for ($i = 0; $i < 3; $i++) {
    $montant += $tarifs['duree'][$Choix['duree'][$i]];
    $montant += $tarifs['accompagnement'][$Choix['accompagnement'][$i]];
    $montant += $tarifs['equipement'][$Choix['equipement'][$i]];
}

function fmt_euro($n) {
    return number_format($n, 2, ',', ' ') . ' €';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jungle Trek - Réserver</title>
    <?php include '../Code_php/theme-loader.php'; ?>
</head>
<body id="bodyrechercher">

<form action="" method="POST">
    <div class="header">
        <!-- ton header inchangé -->
        <div class="Logo">
            <img src="Images/Logo.png" width="50px" height="50px" alt="Logo">
            <p id="JT">Jungle Trek</p>
        </div>
        <div>
            <a href="Profil.php" class="lien"><?= htmlspecialchars($_SESSION["utilisateur"]["login"]) ?></a>
            <a href="Login.php" class="lien">Se déconnecter</a>
        </div>
        <div class="nav-bar">
            <a href="Accueil.php"><button type="button" class="nav-button">Accueil</button></a>
            <a href="Explorer.php"><button type="button" class="nav-button">Explorer</button></a>
            <a href="Voyages_du_moment.php"><button type="button" class="nav-button">Voyages du moment</button></a>
            <a href="Recherche.php"><button type="button" class="nav-button">Rechercher</button></a>
            <a href="Reserver.php"><button type="button" class="nav-button">Réserver</button></a>
            <button class="nav-button" id="theme-toggle">🌓 Thème</button>
        </div>
    </div>

    <?php if ($message): ?>
        <p style="color: green; padding: 10px;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <div class="selection-containerrechercher">
        <label for="date" id="labelrechercher">Date :</label>
        <input type="date" id="date" name="date" required value="<?= htmlspecialchars($_POST['date'] ?? '') ?>">

        <label for="parcours" id="labelrechercher">Parcours :</label>
        <select id="parcours" name="parcours" class="opt" data-cat="parcours" required>
            <?php foreach (["Temple-Village-Zoo","Cascade-Zoo-Temple","Village-Cascade-Zoo","Temple-Cascade-Village"] as $p): ?>
                <option value="<?= $p ?>" <?= ($Choix['parcours'] === $p) ? 'selected' : '' ?>><?= htmlspecialchars($p) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="steps-containerrechercher">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="steprechercher">
                <h3 id="h3rechercher">Étape <?= $i+1 ?></h3>
                <label id="labelrechercher">Durée de l'étape :</label>
                <select name="duree[<?= $i ?>]" class="opt" data-cat="duree" data-step="<?= $i ?>" required>
                    <?php foreach (['1','2','3'] as $d): ?>
                        <option value="<?= $d ?>" <?= ($Choix['duree'][$i] === $d) ? 'selected' : '' ?>><?= $d ?> heure(s)</option>
                    <?php endforeach; ?>
                </select>

                <label id="labelrechercher">Accompagnement :</label>
                <div id="labelrechercher">
                    <?php foreach (array_keys($tarifs['accompagnement']) as $acc): ?>
                        <label>
                            <input type="radio" name="accompagnement[<?= $i ?>]" class="opt" data-cat="accompagnement" data-step="<?= $i ?>"
                                   value="<?= htmlspecialchars($acc) ?>" <?= ($Choix['accompagnement'][$i] === $acc) ? 'checked' : '' ?>>
                            <?= $acc ?>
                        </label><br>
                    <?php endforeach; ?>
                </div>

                <label id="labelrechercher">Équipement :</label>
                <div id="labelrechercher">
                    <?php foreach (array_keys($tarifs['equipement']) as $eq): ?>
                        <label>
                            <input type="radio" name="equipement[<?= $i ?>]" class="opt" data-cat="equipement" data-step="<?= $i ?>"
                                   value="<?= htmlspecialchars($eq) ?>" <?= ($Choix['equipement'][$i] === $eq) ? 'checked' : '' ?>>
                            <?= $eq ?>
                        </label><br>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <input type="hidden" id="montant" name="montant" value="<?= $montant ?>">

    <!-- Ajouter au panier, bottom-left via CSS inline -->
    <button type="submit" name="add_to_cart" id="add-to-cart"
            style="position: fixed; bottom: 20px; left: 20px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Ajouter au panier
    </button>

    <!-- Payer -->
    <button type="submit" name="payer" id="pay-buttonrechercher">
        Payer (Total: <?= fmt_euro($montant) ?>)
    </button>
</form>

<script id="tarifs-data" type="application/json"><?= json_encode($tarifs) ?></script>
<script src="../Code_JS/reservation.js"></script>
</body>
<footer id="footerrechercher">
    <p>©2025 Jungle Trek Corp, All right reserved</p>
</footer>
</html>